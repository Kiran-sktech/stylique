const mongoose = require('mongoose');

// Each item in the cart when the user places an order
const orderItemSchema = new mongoose.Schema({
  title:      { type: String, required: true },
  image:      { type: String },
  size:       { type: String, required: true },
  price:      { type: Number, required: true },
  startDate:  { type: String, required: true },
  returnDate: { type: String, required: true },
  category:   { type: String }   // lehenga, saree, partywear, anarkali, wedding, etc.
});

const orderSchema = new mongoose.Schema({
  // Firebase UID — links order to a logged-in user without storing passwords here
  userId:    { type: String, required: true },
  userEmail: { type: String, required: true },
  items:     [orderItemSchema],
  total:     { type: Number, required: true },
  status:    { type: String, default: 'confirmed' }, // confirmed → returned
  createdAt: { type: Date, default: Date.now }
});

module.exports = mongoose.model('Order', orderSchema);
