# Stylique — Clothing Rental Platform

A full-stack clothing rental web application built with HTML/CSS/JS, Node.js, Express, MongoDB, and Firebase Authentication.

## Tech Stack
- **Frontend:** HTML, CSS, Vanilla JavaScript (ES Modules)
- **Backend:** Node.js + Express
- **Database:** MongoDB + Mongoose
- **Auth:** Firebase Authentication

## Project Structure
```
stylique/
├── frontend/          ← All HTML, CSS, JS files (served by Express)
│   ├── index.html
│   ├── her.html
│   ├── him.html
│   ├── cart.html
│   ├── login.html
│   ├── register.html
│   ├── myaccount.html
│   ├── css/style.css
│   └── js/
│       ├── auth.js    ← Firebase auth logic
│       └── cart.js    ← localStorage cart logic
│
├── backend/
│   ├── server.js      ← Express entry point
│   ├── models/
│   │   └── Order.js   ← Mongoose schema
│   ├── routes/
│   │   ├── orders.js  ← POST /api/orders, GET /api/orders/:userId
│   │   └── products.js← GET /api/products/her, GET /api/products/him
│   └── .env           ← MONGO_URI, PORT
│
└── package.json
```

## Setup Instructions

### 1. Install dependencies
```bash
npm install
```

### 2. Configure MongoDB
- Create a free cluster at [mongodb.com/atlas](https://mongodb.com/atlas)
- Get your connection string
- Paste it in `backend/.env`:
```
MONGO_URI=mongodb+srv://username:password@cluster.mongodb.net/stylique
PORT=5000
```

### 3. Configure Firebase
- Go to [Firebase Console](https://console.firebase.google.com)
- Create a new project → Enable **Email/Password** authentication
- Go to Project Settings → Your Apps → Web → copy the config
- Replace the `firebaseConfig` object in `frontend/js/auth.js`

### 4. Run the project
```bash
# Development (with auto-restart)
npm run dev

# Production
npm start
```

Open: **http://localhost:5000**

## API Endpoints
| Method | Route | Description |
|--------|-------|-------------|
| GET | `/api/products/her` | All women's products |
| GET | `/api/products/him` | All men's products |
| POST | `/api/orders` | Place a new order |
| GET | `/api/orders/:userId` | Get orders for a user |

## Features
- Category-wise browsing with filter tabs and sort
- Rental modal with size selection and auto return date (3 days)
- localStorage cart with badge count
- Firebase Auth (register/login/logout)
- Order placement saved to MongoDB
- Order history in My Account
- Fully responsive

## Deployment
- **Frontend + Backend:** [Render](https://render.com) (free tier, set start command to `node backend/server.js`)
- Add environment variables (`MONGO_URI`, `PORT`) in Render dashboard
