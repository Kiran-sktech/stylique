<?php session_start();

// ---------- AJAX actions ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'add_to_cart') {
        $_SESSION['cart'][] = [
            'title'  => $_POST['title']  ?? '',
            'size'   => $_POST['size']   ?? '',
            'start'  => $_POST['start']  ?? '',
            'return' => $_POST['return'] ?? ''
        ];
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
    if ($action === 'update_size') {
        $row = intval($_POST['row']);
        $_SESSION['cart'][$row]['size'] = $_POST['size'] ?? '';
        exit;
    }
    if ($action === 'remove_item') {
        $row = intval($_POST['row']);
        array_splice($_SESSION['cart'], $row, 1);
        exit;
    }
}

$cartJson = json_encode($_SESSION['cart'] ?? []);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Men's Wear on Rent</title>
  <!-- Styles & icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* copy-paste all CSS from the Women’s page (global reset, header, banner, grid, modal, footer, scroll button, animations) */
    /* Only replace banner-text background image and textual content */
  </style>
</head>
<body>
  <header>
    <!-- identical to women's, with cart dropdown, nav, logo -->
  </header>

  <!-- Banner -->
  <div class="banner">
    <div class="banner-text">Men's Wear on Rent</div>
    <div class="category-dropdown">
      <select id="category" onchange="filterByCategory()">
        <option value="all">All Categories</option>
        <option value="wedding">Wedding</option>
        <option value="engagement">Engagement</option>
        <option value="reception">Reception</option>
        <option value="partywear">Party Wear</option>
      </select>
    </div>
  </div>

  <!-- Product Sections -->
  <?php function card($name,$img,$price){ echo "
    <div class='product'>
      <img src='$img' alt='".htmlspecialchars($name,ENT_QUOTES)."'>
      <h4>$name</h4>
      <p>₹$price</p>
      <button class='rent-btn' onclick=\"openModal('$name','$img','₹$price')\">Rent Now</button>
    </div>"; }

  $sections = [
    'wedding' => ['Embroidered Sherwani','wed1.png',8600, /* add more*/],
    'engagement' => ['Waistcoat Kurta','eng1.png',5200, /* ...*/],
    'reception' => ['Linen Satin Tuxedo','re2.png',7100, /* ...*/],
    'partywear' => ['Philocaly Wine Bandhgala','pt1.png',4600, /* ...*/],
  ];

  foreach ($sections as $id => $items) {
    echo "<div class='products-section' id='$id'>
      <div class='section-header'><h2>".ucfirst($id)."</h2>
        <div class='section-sort'><label>Sort By:</label>
          <select onchange=\"sortSection('$id', this.value)\">
            <option value='low-high'>Price: Low to High</option>
            <option value='high-low'>Price: High to Low</option>
            <option value='a-z'>Name: A-Z</option>
            <option value='z-a'>Name: Z-A</option>
          </select>
        </div>
      </div>
      <div class='products' data-category='$id'>";
    // insert card() calls for each product in this category
    card($items[0], $items[1], $items[2]);
    // replicate for more items...
    echo "</div></div>";
  }
  ?>

  <!-- Scroll-to-top -->
  <button id="scrollBtn" onclick="scrollToTop()">↑</button>

  <!-- Rental Modal -->
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
              <option value="">Select Size</option><option value="S">Small</option><option value="M">Medium</option><option value="L">Large</option><option value="XL">Extra Large</option>
            </select>
          </label><br><br>
          <button onclick="addToCart()" class="cart-btn">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast notification -->
  <div id="toast" style="..."></div>

  <?php include 'footer.php'; ?>

  <script>
    const cart = <?php echo $cartJson; ?>;
    /* copy over the entire JavaScript logic from Women’s page:
       - filterByCategory()
       - sortSection()
       - scrollToTop()
       - modal open/close, updateReturnDate()
       - addToCart() with fetch POSTs
       - updateCartDropdown() logic
    */
  </script>
</body>
</html>
