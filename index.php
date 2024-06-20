<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Cafe_Radiance</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2Hhh_14Uam62GXGaTMcXWhhVkYg0EbDY&callback=initMap" async defer></script>

        <!-- Custom CSS File Link -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><!-- font awesome cdn link -->
        <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico"><!-- Favicon / Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Google font cdn link -->
    </head>
    <body>
        <!-- HEADER SECTION -->
        <header class="header">
            <a href="#" class="logo">
                <img src="assets/images/logo.png" class="img-logo" alt="Cafe Radiance Logo">
            </a>

            <!-- MAIN MENU FOR SMALLER DEVICES -->
            <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#home" class="text-decoration-none">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="text-decoration-none">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#menu" class="text-decoration-none">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a href="admin\admin_login.php" class="text-decoration-none">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a href="users/login.php" class="text-decoration-none">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn" onclick="redirectCart()"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>

            <!-- SEARCH TEXT BOX -->
            <div class="search-form">
                <input type="search" id="search-box" class="form-control" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </div>

            <!-- CART SECTION -->
            <div class="cart">
                <h2 class="cart-title">Your Cart:</h2>
                <div class="cart-content">
                    
                </div>
                <div class="total">
                    <div class="total-title">Total: </div>
                    <div class="total-price">₹0</div>
                </div>
                <!-- BUY BUTTON -->
                <button type="button" class="btn-buy">Checkout Now</button>
            </div>
        </header>

        <!-- HERO SECTION -->
        <section class="home" id="home">
            <div class="content">
                <h3>Welcome to Cafe Radiance</h3>
                <p>
                    <strong>We are open 4:00 PM to 9:00 PM.</strong>
                </p>
                <a href="#menu" class="btn btn-dark text-decoration-none">Order Now!</a>
            </div>
        </section>

        <!-- ABOUT US SECTION -->
        <section class="about" id="about">
            <h1 class="heading"> <span>About</span> Us</h1>
            <div class="row g-0">
                <div class="image">
                    <img src="assets/images/about-img.png" alt="" class="img-fluid">
                </div>
                <div class="content">
                    <h3>Welcome to Cafe Radiance</h3>
                    <p>
                    "Cafe Radiance" is a coffee shop renowned for its vibrant ambiance and exceptional coffee offerings. With a focus on creating a warm and inviting atmosphere, Cafe Radiance aims to be a beacon of comfort and community for coffee enthusiasts and casual patrons alike. The cafe prides itself on serving high-quality, freshly brewed coffee sourced from the finest beans, carefully selected to ensure a rich and flavorful experience with every sip. Beyond coffee, Cafe Radiance also offers a selection of delicious pastries and light snacks, perfect for pairing with your favorite beverage. Whether you're stopping by for your morning pick-me-up, catching up with friends over a leisurely cup, or seeking a cozy space to work or unwind, Cafe Radiance promises a delightful experience that brightens your day.
                    </p>
                </div>
            </div>
        </section>

        <!-- MENU SECTION -->
        <section class="menu" id="menu">
            <h1 class="heading">Our <span>Menu</span></h1>
            <div class="box-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-1.png" alt="" class="product-img">
                                <h3 class="product-title">Americano - Hot Espresso </h3>
                                <div class="price">₹45.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-2.png" alt="" class="product-img">
                                <h3 class="product-title">Colombian Supremo Cup </h3>
                                <div class="price">₹40.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-3.png" alt="" class="product-img">
                                <h3 class="product-title">Nitro Cold Brew w/ Straw </h3>
                                <div class="price">₹50.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-4.png" alt="" class="product-img">
                                <h3 class="product-title">Seasonal Single-Origin </h3>
                                <div class="price">₹30.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-5.png" alt="" class="product-img">
                                <h3 class="product-title">Indonesian Sumatra Mandheling </h3>
                                <div class="price">₹40.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-6.png" alt="" class="product-img">
                                <h3 class="product-title">Mint Mojito Iced Coffee </h3>
                                <div class="price">₹55.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row row-to-hide">
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-7.png" alt="" class="product-img">
                                <h3 class="product-title">Iced Americano </h3>
                                <div class="price">₹35.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-8.png" alt="" class="product-img">
                                <h3 class="product-title">Specialty Brews </h3>
                                <div class="price">₹85.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-9.png" alt="" class="product-img">
                                <h3 class="product-title">Seasonal Origin </h3>
                                <div class="price">₹80.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row row-to-hide">
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-10.png" alt="" class="product-img">
                                <h3 class="product-title">Ethiopian Yirgacheffe Cup </h3>
                                <div class="price">₹55.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-11.png" alt="" class="product-img">
                                <h3 class="product-title">Cold Brew Tonic In a Cup </h3>
                                <div class="price">₹35.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/cart-item-12.png" alt="" class="product-img">
                                <h3 class="product-title">Caramel Cold Foam Cold Brew </h3>
                                <div class="price">₹55.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    
                </div>
            </div>
        </section>

        <!-- FOOTER SECTION -->
        <section class="footer">
            <div class="footer-container">
                <div class="logo">
                    <img src="assets/images/logo.png" class="img"><br />
                   
                    <p>dwyaneroyston1105@gmail.com</p><br />
                </div>
            </div>
        </section>

        <script>
            // CODE FOR THE FORMSPREE
            window.onbeforeunload = () => {
                for(const form of document.getElementsByTagName('form')) {
                    form.reset();
                }
            }

           

            // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN MENU
            $(document).ready(function() {
                $(".row-to-hide").hide();
                $("#showHideBtn").text("SHOW MORE");
                $("#showHideBtn").click(function() {
                    $(".row-to-hide").toggle();
                    if ($(".row-to-hide").is(":visible")) {
                        $(this).text("SHOW LESS");
                    } else {
                        $(this).text("SHOW MORE");
                    }
                });
            });
            // CODE FOR THE REDIRECT CART
            function redirectCart() {
                // Check if the user is logged in
                if(!"<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : '' ?>") {
                    // Redirect the user to the login page
                    alert("You are not logged in. Please log into your account and try again.");
                    window.location.href = "users/login.php";
                }
            }
        </script> 
    </body>
</html>
