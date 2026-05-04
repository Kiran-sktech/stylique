<?php
session_start();

/* ---------- AJAX add‑to‑cart ---------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['action'])
    && $_POST['action'] === 'add_to_cart')
{
    $item = [
        'title'  => $_POST['title']  ?? '',
        'size'   => $_POST['size']   ?? '',
        'start'  => $_POST['start']  ?? '',
        'return' => $_POST['return'] ?? ''
    ];
    $_SESSION['cart']   = $_SESSION['cart'] ?? [];
    $_SESSION['cart'][] = $item;

    header('Content‑Type: application/json');
    echo json_encode(['success' => true]);
    exit;
}
if ($_SERVER['REQUEST_METHOD']==='POST' && ($_POST['action']??'')==='update_size') {
    $row=intval($_POST['row']);
    if (isset($_SESSION['cart'][$row])) {
        $_SESSION['cart'][$row]['size']=$_POST['size']??'';
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD']==='POST' && ($_POST['action']??'')==='remove_item') {
    $row=intval($_POST['row']);
    if (isset($_SESSION['cart'][$row])) {
        array_splice($_SESSION['cart'],$row,1);
    }
    exit;
}
/* make the cart array available for JS on first paint */
$cartJson = json_encode($_SESSION['cart'] ?? []);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Women's Wear on Rent</title>

<!-- Google Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
/* ========== GLOBAL RESET ========== */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif}

/* ========== HEADER ========== */
header{display:flex;justify-content:space-between;align-items:center;background: #ace1af;padding:15px 30px}
.logo{font-family:'Playfair Display',serif;font-size:32px;font-weight:700;color: #800020;letter-spacing:2px;text-transform:uppercase}
nav ul{display:flex;align-items:center;list-style:none}
nav ul li{margin:0 15px;position:relative}
nav ul li a{color:#000;text-decoration:none;font-size:18px;transition:.3s}
nav ul li a:hover{color: #800020}
nav ul li img{height:50px;cursor:pointer}
nav select{border:none;background:transparent;font-size:18px;cursor:pointer}

/* ========== BANNER ========== */
body{background:#f9f9f9}
.banner{background: linear-gradient( rgba(0,0,0,0.5)), url('bg_of_her.jpg') center/cover no-repeat;height:400px;position:relative;color:white}
.banner::before{content:'';position:absolute;inset:0;background:rgba(0,0,0,.5)}
.banner-text{position:absolute;top:50%;left:50%;transform:translate(-50%,-60%);font-size:45px;font-weight:bold}
.category-dropdown{position:absolute;top:calc(50% + 60px);left:50%;transform:translateX(-50%);background:rgba(255,255,255,.15);backdrop-filter:blur(4px);border:2px solid #fff;border-radius:8px;padding:3px;box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);}
.category-dropdown select{background:transparent;color:black;font-size:18px;font-weight:600;border:none;outline:none;cursor: pointer;appearance: none;padding: 10px 16px;border-radius: 6px; }

/* ========== PRODUCTS GRID ========== */
.products-section{padding:50px 40px;position: relative}
.products-section h2 {font-size: 28px;margin-bottom: 20px;color: #333;display: inline-block;}
.section-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}
.section-sort {font-size: 16px;}
.section-sort select{padding:6px 12px;border:2px solid #888;border-radius:6px;font-weight:600;cursor:pointer}
.products{display:grid;grid-template-columns:repeat(3,1fr);gap:40px}
.product{text-align:center;padding:10px}
.product img{width:100%;height:350px;object-fit:contain;border:2px solid #ccc;border-radius:8px;background:#fff;transition: transform: 0.4s ease, box-shadow 0.4s ease;}
 
.product img:hover{transform:scale(1.07) rotate(1deg);box-shadow:0 12px 30px rgba(0,0,0,0.3)}
.product h4{margin:10px 0 5px}
.product p{color:#444}
.rent-btn{margin-top:10px;padding:10px 20px;background:#333;color:#fff;border:none;border-radius:6px;font-size:16px;font-weight:600;cursor:pointer;transition:background .3s}
.rent-btn:hover{background:#444}

/* ========== CART DROPDOWN ========== */
#cartDropdown{display:none;position:absolute;right:0;top:40px;width:280px;background:#fff;border:1px solid #ccc;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,.2);padding:10px;z-index:1000}
.cart-item{display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid #eee;padding:5px 0;margin-bottom:5px}
.cart-item i{color:#cc0000;cursor:pointer;margin-left:10px}

/* ========== MODAL ========== */
.modal{position:fixed;inset:0;display:none;justify-content:center;align-items:center;background:rgba(0,0,0,.7);z-index:999}
.modal-content{
  background:#fff;
  width:60%;                 /* ↓was 80 % */
  max-width:650px;           /* ↓was 800 px */
  border-radius:8px;
  overflow:hidden;
  display:flex;
  position:relative;
}
.modal-body{display:flex;width:100%}
.modal-image{ flex:0 0 40%; padding:20px;}   /* ↓was width:50% */
.modal-image img{ width:100%; height:260px; object-fit:cover;}
.modal-details{ flex:0 0 60%; padding:20px;} /* ↓was width:50% */
.close-btn{position:absolute;top:10px;right:20px;font-size:28px;cursor:pointer}
.cart-btn{padding:10px 20px;background:#333;color:#fff;border:none;font-size:16px;font-weight:bold;border-radius:6px;cursor:pointer;transition:background .3s}
.cart-btn:hover{background:#444}

/* ========== FOOTER ========== */
footer{background:#a9ba9d;color:#000;padding:20px;text-align:center}
.footer-container{display:flex;justify-content:space-around;flex-wrap:wrap}
.footer-section{width:22%;padding:10px;cursor:pointer;transition:background .3s}
.footer-section:hover{background:rgba(255,255,255,.1)}
.footer-section a{color:inherit;text-decoration:none}
.footer-section h3{margin:0;font-size:18px}
.footer-section p{font-size:14px}

/* ========== SCROLL BUTTON ========== */
#scrollBtn{display:none;position:fixed;bottom:30px;right:30px;font-size:22px;padding:12px 16px;background:#333;color:#fff;border:none;border-radius:10px;cursor:pointer;box-shadow:0 4px 12px rgba(0,0,0,.3)}
#scrollBtn:hover{background:#555}
@keyframes slideInLeft {
            from {transform: translateX(-50px);opacity: 0; }
            to {transform: translateX(0);opacity: 1;}
        }
        @keyframes fadeZoomIn {
            from {transform: scale(0.95);opacity: 0;}
            to {transform: scale(1);opacity: 1;}
        }
.animated-heading {animation: slideInLeft 1s ease forwards;}
.product img {animation: fadeZoomIn 1s ease-in-out forwards;}
</style>
</head>
<body>

<header>
  <div class="logo">STYLIQUE</div>
  <nav>
    <ul>
      <li><a href="main.php">Home</a></li>
      <li><a href="AboutUs.php">About&nbsp;Us</a></li>
      <li><a href="register.php">Register</a></li>
      <li>
        <select onchange="location = this.value">
          <option value="Categories" disabled selected>Categories</option>
          <option value="her.php">For Her</option>
          <option value="him.php">For Him</option>
        </select>
      </li>
      <li><a href="ContactUs.php">Contact&nbsp;Us</a></li>
      <li><a href="login.php" title="Login"><i class="fa fa-sign-in-alt" style="font-size:28px"></i></a></li>
      <li style="position:relative">
        <a href="javascript:void(0)" onclick="toggleCartDropdown()"><i class="fa fa-shopping-cart" style="font-size:28px"></i></a>
        <div id="cartDropdown">
          <div id="cartItems"><p style="text-align:center">Nothing in your cart</p></div>
          <button style="width:100%;margin-top:10px;background:#333;color:#fff;border:none;border-radius:6px;padding:10px 0;cursor:pointer" onclick="location='review.php'">Review your Cart</button>
        </div>
      </li>
    </ul>
  </nav>
</header>

<!-- BANNER -->
<div class="banner">
  <div class="banner-text">Women's Wear on Rent</div>
  <div class="category-dropdown">
    <select id="category" onchange="filterByCategory()">
      <option value="all">All Categories</option>
      <option value="lehenga">Lehengas</option>
      <option value="saree">Sarees</option>
      <option value="partywear">Party Wear</option>
      <option value="anarkali">Anarkali</option>
    </select>
  </div>
</div>

<!-- ========== PRODUCT SECTIONS ========== -->
<?php
/* Helper to print product cards */
function card($name,$img,$price){
  echo "
  <div class='product'>
    <img src='$img' alt='".htmlspecialchars($name,ENT_QUOTES)."'>
    <h4>$name</h4>
    <p>₹$price</p>
    <button class='rent-btn' onclick=\"openModal('$name','$img','₹$price')\">Rent Now</button>
  </div>";
}
?>

<div class="products-section" id="lehenga">
  <div class="section-header">
    <h2>Lehengas</h2>
    <div class="section-sort">
      <label>Sort&nbsp;By:</label>
      <select onchange="sortSection('lehenga',this.value)">
        <option value="low-high">Price: Low to High</option>
        <option value="high-low">Price: High to Low</option>
        <option value="a-z">Name: A-Z</option>
        <option value="z-a">Name: Z-A</option>
      </select>
    </div>
  </div>
  <div class="products" data-category="lehenga">
    <?php
      card('Classy Lehengas','len3.jpg',2900);
      card('Royal Pink Lehenga','len2.jpg',3100);
      card('Yellow-Blue Lehenga','len1.jpg',3500);
      card('Patterned Lehenga','len4.jpg',2200);
    ?>
  </div>
</div>

<!-- Repeat for other categories ... -->
<div class="products-section" id="saree">
  <div class="section-header">
    <h2>Sarees</h2>
    <div class="section-sort">
      <label>Sort&nbsp;By:</label>
      <select onchange="sortSection('saree',this.value)">
        <option value="low-high">Price: Low to High</option>
        <option value="high-low">Price: High to Low</option>
        <option value="a-z">Name: A-Z</option>
        <option value="z-a">Name: Z-A</option>
      </select>
    </div>
  </div>
  <div class="products" data-category="saree">
    <?php
      card('Glamorous Saree','saree3.jpg',1200);
      card('Silk Copper Enhanced Saree','saree2.jpg',999);
      card('Silk Saree','saree1.jpg',1700);
      card('Silk Silver Enhanced Saree','saree4.jpg',1100);
    ?>
  </div>
</div>

<div class="products-section" id="partywear">
  <div class="section-header">
    <h2>Party Wear</h2>
    <div class="section-sort">
      <label>Sort&nbsp;By:</label>
      <select onchange="sortSection('partywear',this.value)">
        <option value="low-high">Price: Low to High</option>
        <option value="high-low">Price: High to Low</option>
        <option value="a-z">Name: A-Z</option>
        <option value="z-a">Name: Z-A</option>
      </select>
    </div>
  </div>
  <div class="products" data-category="partywear">
    <?php
      card('Flower Party Wear','party3.jpg',900);
      card('Golden Gown','party2.jpg',1100);
      card('Leaf Theme Beautiful Dress','party1.jpg',850);
      card('Navy Blue Net Dress','party4.jpg',850);
    ?>
  </div>
</div>

<div class="products-section" id="anarkali">
  <div class="section-header">
    <h2>Anarkali</h2>
    <div class="section-sort">
      <label>Sort&nbsp;By:</label>
      <select onchange="sortSection('anarkali',this.value)">
        <option value="low-high">Price: Low to High</option>
        <option value="high-low">Price: High to Low</option>
        <option value="a-z">Name: A-Z</option>
        <option value="z-a">Name: Z-A</option>
      </select>
    </div>
  </div>
  <div class="products" data-category="anarkali">
    <?php
      card('Elegant Anarkali Set','an3.jpg',600);
      card('Blue Anarkali','an2.jpg',700);
      card('Green Anarkali','an1.jpg',850);
      card('Full Sleeves Anarkali','an4.jpg',850);
    ?>
  </div>
</div>

<!-- ========== SCROLL BUTTON ========== -->
<button id="scrollBtn" onclick="scrollToTop()">↑</button>

<!-- ========== RENTAL MODAL ========== -->
<div id="rentModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal()">&times;</span>

    <div class="modal-body">
      <div class="modal-image"><img id="modalImg" src="" alt=""></div>

      <div class="modal-details">
        <h2 id="modalTitle"></h2>
        <p id="modalPrice"></p>

        <label>Start Date:
          <input type="date" id="startDate" onchange="updateReturnDate()" required>
        </label><br><br>

        <label>Return Date:
          <input type="text" id="returnDate" readonly>
        </label><br><br>

        <label>Size:
          <select id="size" required>
            <option value="">Select Size</option>
            <option value="S">Small</option>
            <option value="M">Medium</option>
            <option value="L">Large</option>
            <option value="XL">Extra Large</option>
          </select>
        </label><br><br>

        <button onclick="addToCart()" class="cart-btn">Add to Cart</button>
      </div>
    </div>
  </div>
</div>
<!-- tiny toast -->
<div id="toast"
     style="position:fixed;bottom:40px;left:50%;transform:translateX(-50%);
            background:#333;color:#fff;padding:12px 20px;border-radius:6px;
            font-weight:600;opacity:0;pointer-events:none;
            transition:opacity .4s">
</div>

<?php include 'footer.php'; ?>

<!-- ========== JAVASCRIPT ========== -->
<script>
/* ----CATEGORY FILTER & SORTING (unchange)-------- */
function filterByCategory(){
  const cat=document.getElementById('category').value;
  (cat==='all')
    ? window.scrollTo({top:0,behavior:'smooth'})
    : document.getElementById(cat)?.scrollIntoView({behavior:'smooth'});
}
function sortSection(sectionId,criteria){
  const section=document.querySelector(.products[data-category="${sectionId}"]);
  const products=[...section.querySelectorAll('.product')];
  products.sort((a,b)=>{
    const nmA=a.querySelector('h4').innerText.toLowerCase();
    const nmB=b.querySelector('h4').innerText.toLowerCase();
    const prA=parseInt(a.querySelector('p').innerText.replace('₹',''));
    const prB=parseInt(b.querySelector('p').innerText.replace('₹',''));
    switch(criteria){
      case'low-high':return prA-prB;
      case'high-low':return prB-prA;
      case'a-z':     return nmA.localeCompare(nmB);
      case'z-a':     return nmB.localeCompare(nmA);
    }
  });
  section.innerHTML='';
  products.forEach(p=>section.appendChild(p));
}
/* ---------- SCROLL‑TO‑TOP (unchanged)-------- */
window.onscroll=()=>(
  document.getElementById('scrollBtn').style.display=
    (document.documentElement.scrollTop>300)?'block':'none'
);
function scrollToTop(){window.scrollTo({top:0,behavior:'smooth'});}
/* ---CART (frontend + session sync)---------- */
let cart=[];   /* local copy */
/* --- Build or rebuild dropdown UI --- */
function updateCartDropdown(){
  const box=document.getElementById('cartItems');
  if(cart.length===0){
    box.innerHTML="<p style='text-align:center'>Nothing in your cart</p>";
    return;
  }
  box.innerHTML='';
  cart.forEach((item,i)=>{
    const div=document.createElement('div');
    div.className='cart-item';
    div.innerHTML=`
      <span>${item.title}</span>
      <select onchange="updateSize(${i},this.value)">
        ${['S','M','L','XL'].map(s=>
          <option value="${s}" ${s===item.size?'selected':''}>${s}</option>).join('')}
      </select>
      <i class="fa fa-trash" onclick="removeCartItem(${i})"></i>
    `;
    box.appendChild(div);
  });
}
/* --- Toggle dropdown visibility --- */
function toggleCartDropdown(){
  const dd=document.getElementById('cartDropdown');
  dd.style.display=(dd.style.display==='block')?'none':'block';
}
/* --- Change size & sync session --- */
function updateSize(index,newSize){
  cart[index].size=newSize;
  fetch('',{                           // same PHP file
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:new URLSearchParams({
      action:'update_size',
      row:index,          /* simple index is fine for demo */
      size:newSize
    })
  }).catch(console.error);
  updateCartDropdown();
}
/* --- Delete item & sync session --- */
function removeCartItem(index){
  cart.splice(index,1);
  fetch('',{
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:new URLSearchParams({
      action:'remove_item',
      row:index
    })
  }).catch(console.error);
  updateCartDropdown();
}

/* -------MODAL & ADD‑TO‑CART------------ */
let currentProduct={};
function openModal(name,imgSrc,price=''){
  currentProduct={name,imgSrc,price};
  document.getElementById('modalTitle').textContent=name;
  document.getElementById('modalImg').src=imgSrc;
  document.getElementById('modalPrice').textContent=price;
  document.getElementById('startDate').value='';
  document.getElementById('returnDate').value='';
  document.getElementById('size').value='';
  document.getElementById('rentModal').style.display='flex';
}
function closeModal(){document.getElementById('rentModal').style.display='none';}
function updateReturnDate(){
  const start=new Date(document.getElementById('startDate').value);
  if(!isNaN(start)){
    const ret=new Date(start);ret.setDate(start.getDate()+4);
    document.getElementById('returnDate').value=ret.toISOString().split('T')[0];
  }else{document.getElementById('returnDate').value='';}
}
/* --- Main “Add to Cart” --- */
function addToCart(){
  const size=document.getElementById('size').value;
  const start=document.getElementById('startDate').value;
  const ret=document.getElementById('returnDate').value;
  if(!start||!size){alert('Please select start date and size.');return;}
  /* 1. push locally */
  cart.push({title:currentProduct.name,size});
  updateCartDropdown();
  /* 2. sync to PHP session */
  fetch('',{
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:new URLSearchParams({
      action:'add_to_cart',
      title:currentProduct.name,
      size,
      start,
      return:ret
    })
  }).catch(console.error);
  /* 3. visual feedback */
  closeModal();
  document.getElementById('cartDropdown').style.display='block'; /* auto‑open */
}
/* --INITIAL DROPDOWN STATE ON PAGE LOAD------- */
document.addEventListener('DOMContentLoaded',updateCartDropdown);
</script>
</body>
</html>