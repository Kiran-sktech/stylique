const express = require('express');
const router = express.Router();
const Order = require('../models/Order');
const Razorpay = require('razorpay');
const crypto = require('crypto'); // built-in Node module, no install needed

// Initialize Razorpay with your keys from .env
const razorpay = new Razorpay({
  key_id:     process.env.RAZORPAY_KEY_ID,
  key_secret: process.env.RAZORPAY_KEY_SECRET
});

// STEP 1 — POST /api/orders/create-razorpay-order
// Frontend calls this first to create a Razorpay order
// Razorpay needs amount in paise (1 INR = 100 paise)
router.post('/create-razorpay-order', async (req, res) => {
  try {
    const { total } = req.body;

    const options = {
      amount:   total * 100, // convert to paise
      currency: 'INR',
      receipt:  `receipt_${Date.now()}`
    };

    const razorpayOrder = await razorpay.orders.create(options);
    res.json({ success: true, order: razorpayOrder });
  } catch (err) {
    console.error('Razorpay order error:', err.message);
    res.status(500).json({ error: 'Failed to create payment order' });
  }
});

// STEP 2 — POST /api/orders/verify-and-save
// Called after user completes payment in the Razorpay popup
// Verifies payment signature (security check) then saves order to MongoDB
router.post('/verify-and-save', async (req, res) => {
  try {
    const {
      razorpay_order_id,
      razorpay_payment_id,
      razorpay_signature,
      userId, userEmail, items, total
    } = req.body;

    // Signature verification — proves payment is genuine, not tampered
    // Razorpay signs order_id + payment_id with your secret key
    const body      = razorpay_order_id + '|' + razorpay_payment_id;
    const expected  = crypto
      .createHmac('sha256', process.env.RAZORPAY_KEY_SECRET)
      .update(body)
      .digest('hex');

    if (expected !== razorpay_signature) {
      return res.status(400).json({ error: 'Payment verification failed' });
    }

    // Signature valid — save order to MongoDB
    const order = new Order({
      userId, userEmail, items, total,
      paymentId: razorpay_payment_id,
      status: 'confirmed'
    });
    await order.save();

    res.status(201).json({ success: true, orderId: order._id });
  } catch (err) {
    console.error('Verify error:', err.message);
    res.status(500).json({ error: 'Failed to verify payment' });
  }
});

// GET /api/orders/:userId — Get all orders for a user
// Called from myaccount.html to show order history
router.get('/:userId', async (req, res) => {
  try {
    const orders = await Order.find({ userId: req.params.userId })
                               .sort({ createdAt: -1 }); // newest first
    res.json(orders);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch orders' });
  }
});

module.exports = router;