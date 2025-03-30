<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrow Ways - Travel with Confidence</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0047AB;
            --secondary-color: #4169E1;
            --accent-color: #1E90FF;
            --text-color: #333;
            --light-text: #fff;
            --dark-text: #222;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        /* Header styles */
        header {
            background-color: rgba(0, 71, 171, 0.9);
            padding: 15px 40px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .logo {
            display: flex;
            align-items: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .logo i {
            margin-right: 10px;
            font-size: 28px;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
            padding: 5px 0;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: white;
            transition: width 0.3s;
        }

        nav ul li a:hover {
            color: #e6e6e6;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        .login-btn {
            background-color: white;
            color: var(--primary-color);
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .login-btn:hover {
            background-color: #e6e6e6;
            transform: translateY(-2px);
        }

        .user-info {
            display: flex;
            align-items: center;
            color: white;
        }

        .user-info i {
            margin-right: 8px;
        }

        /* Hero section styles */
        .hero {
            height: 100vh;
            background-image: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('images/The-Best-Online-Flight-Search-Websites-1.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 0 20px;
            text-align: center;
        }






        .hero h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1.5em;
            max-width: 800px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .cta-button {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .cta-button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* About section styles */
        .about {
            padding: 80px 40px;
            background-color: white;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .about h2 {
            text-align: center;
            font-size: 2.5em;
            color: var(--primary-color);
            margin-bottom: 40px;
        }

        .about-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .about-text {
            flex: 1;
            min-width: 300px;
        }

        .about-text p {
            margin-bottom: 20px;
            line-height: 1.6;
            color: var(--text-color);
        }

        .about-image {
            flex: 1;
            min-width: 300px;
            background-image: url('images/The-Best-Online-Flight-Search-Websites-1.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            min-height: 350px;
        }

        /* Features section */
        .features {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 60px;
        }

        .feature {
            flex: 1;
            min-width: 250px;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature i {
            font-size: 40px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .feature h3 {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .feature p {
            line-height: 1.6;
            color: var(--text-color);
        }

        /* Footer styles */
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            font-size: 1.3em;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #e0e0e0;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
                flex-direction: column;
            }

            .logo {
                margin-bottom: 15px;
            }

            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }

            nav ul li {
                margin: 5px 10px;
            }

            .hero h1 {
                font-size: 2.5em;
            }

            .hero p {
                font-size: 1.2em;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2em;
            }

            .about-image {
                min-height: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <i class="fas fa-plane"></i>
            <span>Arrow Ways</span>
        </div>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="flightpage.php">Flights</a></li>
                <li><a href="bookingpage.html">Booking</a></li>
                <li><a href="profile.php">Profile</a></li>
                <?php if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
                    <li><a href="Registrationform.html" class="login-btn">Login</a></li>
                <?php else: ?>
                    <li>
                        <div class="user-info">
                            <i class="fas fa-user-circle"></i>
                            <span><?php echo $_SESSION['user_name']; ?></span>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Arrow Ways</h1>
        <p>Your gateway to unforgettable travel experiences. Explore the world with confidence and comfort.</p>
        <a href="bookingpage.html" class="cta-button">Book Your Flight</a>
    </section>





<style>
    /* Existing styles remain the same, adding new styles for planned trips and business class */
        .special-offers {
            padding: 80px 40px;
            background-color: #f5f5f5;
        }

        .special-offers-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .special-offers h2 {
            text-align: center;
            font-size: 2.5em;
            color: var(--primary-color);
            margin-bottom: 40px;
        }

        .offers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .offer-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .offer-card:hover {
            transform: translateY(-10px);
        }

        .offer-card-image {
            height: 250px;
            background-size: cover;
            background-position: center;
        }

        .offer-card-content {
            padding: 20px;
        }

        .offer-card-content h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .offer-card-content .price {
            font-size: 1.5em;
            font-weight: bold;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .offer-card-content .badge {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .book-offer-btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .book-offer-btn:hover {
            background-color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <!-- Existing header and hero section remain the same -->

    <!-- New Section: Planned Trips -->
    <section class="special-offers planned-trips">
        <div class="special-offers-container">
            <h2>Exciting Planned Trips</h2>
            <div class="offers-grid">
                <?php
                // Sample planned trips data (in a real scenario, this would come from a database)
                $plannedTrips = [
                    [
                        'title' => 'European Summer Adventure',
                        'image' => 'images/443426-european-winter-wallpaper-top-free-european-winter-background.jpg',
                        'price' => '$1,299',
                        'destinations' => ['Paris', 'Rome', 'Barcelona']
                    ],
                    [
                        'title' => 'Tropical Paradise Getaway',
                        'image' => 'images/best-tropical-vacations-philippines-beach-and-chairs.jpg',
                        'price' => '$1,599',
                        'destinations' => ['Bali', 'Maldives', 'Phuket']
                    ],
                    [
                        'title' => 'Cultural Asia Expedition',
                        'image' => 'images/asia-33(1).jpg',
                        'price' => '$1,799',
                        'destinations' => ['Tokyo', 'Seoul', 'Singapore']
                    ]
                ];

                foreach ($plannedTrips as $trip) {
                    echo '<div class="offer-card">';
                    echo '<div class="offer-card-image" style="background-image: url(\'' . $trip['image'] . '\')"></div>';
                    echo '<div class="offer-card-content">';
                    echo '<h3>' . $trip['title'] . '</h3>';
                    echo '<div class="price">' . $trip['price'] . '</div>';
                    echo '<p>Destinations: ' . implode(', ', $trip['destinations']) . '</p>';
                    echo '<a href="bookingpage.html" class="book-offer-btn">Book Now</a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- New Section: Business Class Flights -->
    <section class="special-offers business-class-flights">
        <div class="special-offers-container">
            <h2>Exclusive Business Class Deals</h2>
            <div class="offers-grid">
                <?php
                // Sample business class flights data (in a real scenario, this would come from a database)
                $businessClassFlights = [
                    [
                        'title' => 'New York to London',
                        'image' => 'images/image4.jpg',
                        'price' => '$2,499',
                        'badge' => 'Best Deal'
                    ],
                    [
                        'title' => 'Dubai to Singapore',
                        'image' => 'images/emirates-business-class-dining-EMIRATESBIZ0322-e8414f0893f640929ea0cb2d286d8e61.jpg',
                        'price' => '$2,799',
                        'badge' => 'Luxury Offer'
                    ],
                    [
                        'title' => 'Sydney to Tokyo',
                        'image' => 'images/cabin-web2.jpg',
                        'price' => '$2,999',
                        'badge' => 'Premium Route'
                    ]
                ];

                foreach ($businessClassFlights as $flight) {
                    echo '<div class="offer-card">';
                    echo '<div class="offer-card-image" style="background-image: url(\'' . $flight['image'] . '\')"></div>';
                    echo '<div class="offer-card-content">';
                    echo '<span class="badge">' . $flight['badge'] . '</span>';
                    echo '<h3>' . $flight['title'] . '</h3>';
                    echo '<div class="price">' . $flight['price'] . '</div>';
                    echo '<a href="bookingpage.html" class="book-offer-btn">Book Business Class</a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>





















    <!-- About Section -->
    <section class="about">
        <div class="about-container">
            <h2>About Arrow Ways</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Arrow Ways is a premier travel service dedicated to providing exceptional flight experiences for travelers worldwide. Founded in 2020, we've quickly established ourselves as a trusted name in the travel industry.</p>
                    <p>Our mission is to make air travel accessible, comfortable, and enjoyable for everyone. We believe that every journey should be as memorable as the destination itself.</p>
                    <p>With our extensive network of airline partners, we offer competitive prices, flexible booking options, and 24/7 customer support to ensure your travel plans go smoothly from takeoff to landing.</p>
                </div>
                <div class="about-image">
                    <!-- Background image set in CSS -->
                </div>
            </div>

            <!-- Features Section -->
            <div class="features">
                <div class="feature">
                    <i class="fas fa-globe"></i>
                    <h3>Global Reach</h3>
                    <p>Access flights to over 190 countries and more than 1,000 destinations worldwide through our extensive airline partnerships.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-tag"></i>
                    <h3>Best Prices</h3>
                    <p>Our price match guarantee ensures you'll always get the best deal on your flights, with no hidden fees or surprises.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-headset"></i>
                    <h3>24/7 Support</h3>
                    <p>Our dedicated customer service team is available around the clock to assist you with any questions or concerns.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Arrow Ways</h3>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="careers.php">Careers</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Help</h3>
                <ul>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="cancellation.php">Cancellation</a></li>
                    <li><a href="refund.php">Refund Status</a></li>
                    <li><a href="support.php">Customer Support</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="terms.php">Terms & Conditions</a></li>
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="cookie.php">Cookie Policy</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Connect With Us</h3>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Arrow Ways. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Check if user is logged in via session
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
        document.addEventListener('DOMContentLoaded', function() {
            // User is logged in, no need to do anything as PHP has handled the display
        });
        <?php endif; ?>
    </script>
</body>
<!DOCTYPE html>
<html>
<head>
</html>