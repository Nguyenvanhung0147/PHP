<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/admin_page.css">
    <title>Admin Page</title>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Accusoft</span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="edit_customer.php" class="sidebar-menu-item <?php if(isset($khachhang)) echo "active"?>"><span class="las la-igloo"></span>
                    <span>Customers</span></a>
                </li>
                <li><a href="edit_product.php"  class="sidebar-menu-item <?php if(isset($sanpham)) echo "active"?> " ><span class="las la-users"></span>
                    <span>Product</span></a>
                    <div class="product-item">
                    <ul>
                        <li>Speak</li>
                        <li>Keyboard</li>
                        <li>mouse</li>
                        <li>Webcam</li>
                        <li>USB</li>
                    </ul>
                    </div>
                </li>
                <li><a href=" "  class="sidebar-menu-item"><span class="las la-clipboard-list"></span>
                    <span>Category</span></a>
                </li>
                <li><a href=" "  class="sidebar-menu-item"><span class="las la-receipt"></span>
                    <span>Inventory</span></a>
                </li>
                <li><a href=" "  class="sidebar-menu-item"><span class="las la-circle"></span>
                    <span>Accounts</span></a>
                </li>
                <li><a href=" " class="sidebar-menu-item"><span class="las la-clipboard-list"></span>
                    <span>Tasks</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here">
            </div>

            <div class="user-wrapper">
                <img src="images/avatar.jpg" width="40xpx" height="40px" alt="">
                <div>
                    <h4>Chronos</h4>
                    <small>Super Admin</small>
                </div>
             
            </div>
        </header>

      
    </div>
    <script src="../Script/admin_header.js"></script>
