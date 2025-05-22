<?php
session_start();
require 'config.php';


$is_admin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin';


$sql = "SELECT * FROM furniture"; 
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Furniture | Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">Furniture <span>X.</span></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#shop">Shop</a></li>
            <li><a href="#new">Best Selling</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#brands">Contact</a></li>
            <li><a href="signin.html">Sign In</a></li>
            <?php if ($is_admin): ?>
                <li><a href="remove_furniture.php">Remove Furniture</a></li>
                <li><a href="add_furniture.php">Add Furniture</a></li>
            <?php endif; ?>
            
        </ul>
    </header>
    <section class="home" id="home">
        <div class="home-text">
            <h1><span>Make</span>Your Comfort <br> That's Our <span>Happiness</span></h1>
            <p>Store Created and Assembled specifically to satisfy your results. <br> I am sure you are going to be amazed by our Quality and Service</p>
            <a href="#shop" class="btn">Shop Now</a>
        </div>
    </section>
    <section class="shop" id="shop">
        <div class="heading">
            <span>New Arrival</span>
            <h2>Shop Now</h2>
        </div>
        <div class="shop-container">
        <?php
            foreach ($products as $product) {
                echo '
                <div class="box">
                    <div class="box-img">
                        <img src="'.$product['image'].'" alt="">
                    </div>
                    <div class="title-price">
                        <h3>'.$product['name'].'</h3>
                        <div class="stars">';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= floor($product['rating'])) {
                        echo '<i class="bx bxs-star"></i>';
                    } elseif ($i == ceil($product['rating'])) {
                        echo '<i class="bx bxs-star-half"></i>';
                    } else {
                        echo '<i class="bx bxs-star"></i>';
                    }
                }
                echo '      </div>
                    </div>
                    <span>'.$product['price'].'</span>
                    <a href="checkout.php?id='.$product['id'].'&name='.$product['name'].'&price='.$product['price'].'" class="bx bx-cart"></a>
                    <a href="write_review.php?id='.$product['id'].'" class="btn">Write a Review</a>
                </div>';
            }
            ?>
        </div>
    </section>
    <section class="new" id="new">
        <div class="heading">
            <span>New Collection</span>
            <h2>The Best Selling</h2>
        </div>
        <div class="new-container">
            <?php
            
            $sql = "SELECT * FROM furniture WHERE best_selling = 1"; 
            $result = $conn->query($sql);
            $newProducts = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $newProducts[] = $row;
                }
            }

            foreach ($newProducts as $newProduct) {
    echo '
    <div class="box">
        <div class="box-img">
            <img src="'.$newProduct['image'].'" alt="">
        </div>
        <div class="title-price">
            <h3>'.$newProduct['name'].'</h3>
            <div class="stars">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= floor($newProduct['rating'])) {
            echo '<i class="bx bxs-star"></i>';
        } elseif ($i == ceil($newProduct['rating'])) {
            echo '<i class="bx bxs-star-half"></i>';
        } else {
            echo '<i class="bx bxs-star"></i>';
        }
    }
    echo '      </div>
        </div>
        <span>'.$newProduct['price'].'</span>
        <a href="checkout.php?id='.$newProduct['id'].'&name='.$newProduct['name'].'&price='.$newProduct['price'].'" class="bx bx-cart"></a>
    </div>';
}

            ?>
        </div>
    </section>
    <section class="about" id="about">
        <div class="aboutt-img">
            <img src="img/about.jpg" alt="">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <h2>Furniture Is Important Part <br> For Your Comfort</h2>
            <p>I Think Every single person would love their house to look cozy,modern or just Overall "Comfortable".Why Choosing US? Well Our Staff + Management Itself has 5+ Years Of experience In this Direction Of a Job.I am sure Our Very Communicative Stuff Would guide you through.</p>
            <p>This Is What We Do here,We are trying to give you our maximum quality of a certain object.You can also drop A feedback,We would Really Appreciate it and you will Also take a part to Improve our Service.</p>
            <a href="#shop" class="btn">Learn More.</a>
        </div>
    </section>
    <section class="brands" id="brands">
        <div class="heading">
            <span>Brands</span>
            <h2>Our Partners</h2>
        </div>
        <div class="brands-container">
            <img src="img/Google.png" alt="">
            <img src="img/amazon.png" alt="">
            <img src="img/netflix.png" alt="">
            <img src="img/tesla.png" alt="">
            <img src="img/starbucks.png" alt="">
            <img src="img/zoom.png" alt="">
        </div>
    </section>
    <section class="newsletter" id="contact">
        <h2>Subscribe To NewsLetter</h2>
        <div class="news-box">
            <input type="text" name="" id="" placeholder="Enter Your Email..." required>
            <a href="#" class="btn">Subscribe</a>
        </div>
    </section>
    <section class="footer" id="footer">
        <div class="footer-box">
            <h2>Brand <span>X.</span></h2>
            <p>You Can Contact Us Via Email,Phone,Direct Meeting,Or Any of the Social Medias Listed Below This Text,Our Staff Will Respond You As Soon As It Is Possible.</p>
            <div class="social">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
        <div class="footer-box">
            <h3>Services</h3>
            <li><a href="#">Product</a></li>
            <li><a href="#">Help & Support</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">FAQ</a></li>
        </div>
        <div class="footer-box">
            <h3>Product</h3>
            <li><a href="#">Sofa's</a></li>
            <li><a href="#">Chair's</a></li>
            <li><a href="#">Living Room</a></li>
            <li><a href="#">Office</a></li>
        </div>
        <div class="footer-box contact-info">
            <h3>Contact</h3>
            <span>Zugdidi, Georgia</span>
            <br>
            <span>+995 557 10 00 20</span>
            <br>
            <span>lukapipia@gmail.com</span>
        </div>
    </section>
    <div class="copyright">
        <p>&#169; luka All Right Reserved.</p>
    </div>
    
    <script src="main.js"></script>
</body>
</html>
