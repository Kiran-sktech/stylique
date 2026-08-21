const express = require('express');
const router = express.Router();
const Order = require('../models/Order');

// POST /api/orders — Place a new order
// Called from cart.html when user clicks "Place Order"
// Body: { userId, userEmail, items: [...], total }
router.post('/', async (req, res) => {
  try {
    const { userId, userEmail, items, total } = req.body;

    if (!userId || !items || items.length === 0) {
      return res.status(400).json({ error: 'Missing required fields' });
    }

    const order = new Order({ userId, userEmail, items, total });
    await order.save();

    res.status(201).json({ success: true, orderId: order._id });
  } catch (err) {
    console.error('Order error:', err.message);
    res.status(500).json({ error: 'Failed to place order' });
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
