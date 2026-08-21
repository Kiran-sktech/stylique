// Load environment variables from .env
// require('dotenv').config();
require('dotenv').config({ path: __dirname + '/.env' });

const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');
const path = require('path');

const app = express();

// --- Middleware ---
app.use(cors());                          // Allows frontend (different port) to call this API
app.use(express.json());                  // Parses incoming JSON request bodies
app.use(express.static(path.join(__dirname, '../frontend'))); // Serves all HTML/CSS/JS files

// --- Routes ---
app.use('/api/orders', require('./routes/orders'));
app.use('/api/products', require('./routes/products'));

// --- Catch-all: serve index.html for any unknown route ---
app.get('*', (req, res) => {
  res.sendFile(path.join(__dirname, '../frontend/index.html'));
});

// --- MongoDB Connection ---
mongoose.connect(process.env.MONGO_URI)
  .then(() => {
    console.log(' MongoDB connected');
    app.listen(process.env.PORT || 5000, () => {
      console.log(` Server running on http://localhost:${process.env.PORT || 5000}`);
    });
  })
  .catch(err => {
    console.error(' MongoDB connection failed:', err.message);
    process.exit(1);
  });
