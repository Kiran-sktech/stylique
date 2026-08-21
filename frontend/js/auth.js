import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
import {
  getAuth,
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  signOut,
  onAuthStateChanged
} from "https://www.gstatic.com/firebasejs/10.12.0/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyBU-QKzID5YUgj6z3wVIwi3ULaVvGieMz8",
  authDomain: "stylique-d70db.firebaseapp.com",
  projectId: "stylique-d70db",
  storageBucket: "stylique-d70db.firebasestorage.app",
  messagingSenderId: "1078577031809",
  appId: "1:1078577031809:web:82ebe2588bd9d776e5bb80"
};

const app  = initializeApp(firebaseConfig);
const auth = getAuth(app);

window.getCurrentUser = () => auth.currentUser;

onAuthStateChanged(auth, (user) => {
  const loginLink   = document.getElementById('nav-login');
  const accountLink = document.getElementById('nav-account');
  const logoutBtn   = document.getElementById('nav-logout');

  if (user) {
    if (loginLink)   loginLink.style.display   = 'none';
    if (accountLink) accountLink.style.display = 'inline';
    if (logoutBtn)   logoutBtn.style.display   = 'inline';
  } else {
    if (loginLink)   loginLink.style.display   = 'inline';
    if (accountLink) accountLink.style.display = 'none';
    if (logoutBtn)   logoutBtn.style.display   = 'none';
  }
});

const registerForm = document.getElementById('registerForm');
if (registerForm) {
  registerForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const email    = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const errEl    = document.getElementById('auth-error');
    try {
      await createUserWithEmailAndPassword(auth, email, password);
      window.location.href = 'index.html';
    } catch (err) {
      errEl.textContent = friendlyError(err.code);
    }
  });
}

const loginForm = document.getElementById('loginForm');
if (loginForm) {
  loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const email    = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const errEl    = document.getElementById('auth-error');
    try {
      await signInWithEmailAndPassword(auth, email, password);
      window.location.href = 'index.html';
    } catch (err) {
      errEl.textContent = friendlyError(err.code);
    }
  });
}

const logoutBtn = document.getElementById('nav-logout');
if (logoutBtn) {
  logoutBtn.addEventListener('click', async () => {
    await signOut(auth);
    window.location.href = 'index.html';
  });
}

function friendlyError(code) {
  const map = {
    'auth/email-already-in-use': 'This email is already registered.',
    'auth/invalid-email':        'Please enter a valid email.',
    'auth/weak-password':        'Password must be at least 6 characters.',
    'auth/user-not-found':       'No account found with this email.',
    'auth/wrong-password':       'Incorrect password.',
    'auth/invalid-credential':   'Invalid email or password.',
    'auth/too-many-requests':    'Too many attempts. Try again later.',
  };
  return map[code] || 'Something went wrong. Please try again.';
}

export { auth };