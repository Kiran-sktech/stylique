const express = require('express');
const router = express.Router();

// Products are stored as static data here (no DB needed for a catalog that doesn't change)
// If you want admin to add/edit products later, move this to MongoDB

const herProducts = [
  // Lehengas
  { id: 1, title: 'Classy Lehengas',        image: 'len3.jpg', price: 2900, category: 'lehenga' },
  { id: 2, title: 'Royal Pink Lehenga',     image: 'len2.jpg', price: 3100, category: 'lehenga' },
  { id: 3, title: 'Yellow-Blue Lehenga',    image: 'len1.jpg', price: 3500, category: 'lehenga' },
  { id: 4, title: 'Patterned Lehenga',      image: 'len4.jpg', price: 2200, category: 'lehenga' },
  // Sarees
  { id: 5, title: 'Glamorous Saree',              image: 'saree3.jpg', price: 1200, category: 'saree' },
  { id: 6, title: 'Silk Copper Enhanced Saree',   image: 'saree2.jpg', price: 999,  category: 'saree' },
  { id: 7, title: 'Silk Saree',                   image: 'saree1.jpg', price: 1700, category: 'saree' },
  { id: 8, title: 'Silk Silver Enhanced Saree',   image: 'saree4.jpg', price: 1100, category: 'saree' },
  // Party Wear
  { id: 9,  title: 'Flower Party Wear',           image: 'party3.jpg', price: 900,  category: 'partywear' },
  { id: 10, title: 'Golden Gown',                 image: 'party2.jpg', price: 1100, category: 'partywear' },
  { id: 11, title: 'Leaf Theme Beautiful Dress',  image: 'party1.jpg', price: 850,  category: 'partywear' },
  { id: 12, title: 'Navy Blue Net Dress',         image: 'party4.jpg', price: 850,  category: 'partywear' },
  // Anarkali
  { id: 13, title: 'Elegant Anarkali Set',   image: 'an3.jpg', price: 600, category: 'anarkali' },
  { id: 14, title: 'Blue Anarkali',          image: 'an2.jpg', price: 700, category: 'anarkali' },
  { id: 15, title: 'Green Anarkali',         image: 'an1.jpg', price: 850, category: 'anarkali' },
  { id: 16, title: 'Full Sleeves Anarkali',  image: 'an4.jpg', price: 850, category: 'anarkali' },
];

const himProducts = [
  // Wedding
  { id: 17, title: 'Embroidered Sherwani',       image: 'wed1.png', price: 8600, category: 'wedding' },
  { id: 18, title: 'Classic Black Achkan',        image: 'wed2.png', price: 6100, category: 'wedding' },
  { id: 19, title: 'South Indian Groom Set',      image: 'wed3.png', price: 7500, category: 'wedding' },
  { id: 20, title: 'Patterned Velvet Sherwani',   image: 'wed4.png', price: 6200, category: 'wedding' },
  // Engagement
  { id: 21, title: 'Waistcoat Kurta',                      image: 'eng1.png', price: 5200, category: 'engagement' },
  { id: 22, title: 'Dusty Rose Nehru Jacket and Kurta',    image: 'eng2.png', price: 5999, category: 'engagement' },
  { id: 23, title: 'Rust Floral Nehru Jacket',             image: 'eng3.png', price: 4700, category: 'engagement' },
  { id: 24, title: 'Jodhpuri Kurta',                       image: 'eng4.png', price: 5100, category: 'engagement' },
  // Reception
  { id: 25, title: 'Black Silk Jacket Set with Resham Embroidery', image: 're1.png', price: 5800, category: 'reception' },
  { id: 26, title: 'Linen Satin Tuxedo',          image: 're2.png', price: 7100, category: 'reception' },
  { id: 27, title: 'Ivory Sherwani',               image: 're3.png', price: 850,  category: 'reception' },
  { id: 28, title: 'Pastel Bandhgala',             image: 're4.png', price: 4650, category: 'reception' },
  // Party
  { id: 29, title: 'Philocaly Wine Bandhgala',     image: 'pt1.png', price: 4600, category: 'party' },
  { id: 30, title: 'Polinosic Jodhpuri Set',       image: 'pt2.png', price: 4700, category: 'party' },
  { id: 31, title: 'Hand-embroidered Finesse',     image: 'pt3.png', price: 7550, category: 'party' },
  { id: 32, title: 'Sage Green Blazer & Formal Pants', image: 'pt4.png', price: 6850, category: 'party' },
];

// GET /api/products/her
router.get('/her', (req, res) => res.json(herProducts));

// GET /api/products/him
router.get('/him', (req, res) => res.json(himProducts));

module.exports = router;
