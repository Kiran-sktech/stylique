// ================================================================
// cart.js — localStorage Cart Logic
// ================================================================
// Cart is stored in localStorage so it persists across pages
// Format: [{ title, image, price, size, startDate, returnDate, category }]
// ================================================================

const CART_KEY = 'stylique_cart';

// ---- Read / Write ----
export function getCart() {
  return JSON.parse(localStorage.getItem(CART_KEY) || '[]');
}

function saveCart(cart) {
  localStorage.setItem(CART_KEY, JSON.stringify(cart));
  updateCartBadge();
}

// ---- Add item (called from modal "Add to Cart" button) ----
export function addToCart(item) {
  const cart = getCart();
  cart.push(item);
  saveCart(cart);
}

// ---- Remove item by index ----
export function removeFromCart(index) {
  const cart = getCart();
  cart.splice(index, 1);
  saveCart(cart);
}

// ---- Clear entire cart (after order placed) ----
export function clearCart() {
  localStorage.removeItem(CART_KEY);
  updateCartBadge();
}

// ---- Total price ----
export function getCartTotal() {
  return getCart().reduce((sum, item) => sum + item.price, 0);
}

// ---- Update the red badge number on the cart icon ----
export function updateCartBadge() {
  const badge = document.querySelector('.cart-badge');
  if (!badge) return;
  const count = getCart().length;
  badge.textContent = count;
  badge.style.display = count > 0 ? 'flex' : 'none';
}

// ---- Auto-calculate return date (rental period: 3 days by default) ----
// Call this when user picks a start date in the modal
export function calcReturnDate(startDateStr, days = 3) {
  const start = new Date(startDateStr);
  start.setDate(start.getDate() + days);
  return start.toISOString().split('T')[0]; // Returns YYYY-MM-DD
}

// Run badge update on every page load
document.addEventListener('DOMContentLoaded', updateCartBadge);
