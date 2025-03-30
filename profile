<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Arrow Ways</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Reusing styles from homepage.php */
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
            display: flex;
            flex-direction: column;
        }

        /* Header styles (same as homepage) */
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

        /* Profile Page Specific Styles */
        .profile-container {
            max-width: 1200px;
            margin: 120px auto 40px;
            display: flex;
            gap: 30px;
        }

        .profile-sidebar {
            width: 250px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile-main {
            flex-grow: 1;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .profile-sidebar-nav {
            list-style: none;
        }

        .profile-sidebar-nav li {
            margin-bottom: 15px;
        }

        .profile-sidebar-nav li a {
            display: flex;
            align-items: center;
            color: var(--primary-color);
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .profile-sidebar-nav li a:hover,
        .profile-sidebar-nav li a.active {
            background-color: #f0f4ff;
        }

        .profile-sidebar-nav li a i {
            margin-right: 10px;
        }

        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .profile-form {
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: var(--text-color);
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: var(--secondary-color);
        }

        .flight-history-table {
            width: 100%;
            border-collapse: collapse;
        }

        .flight-history-table th,
        .flight-history-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .flight-history-table th {
            background-color: #f9f9f9;
            color: var(--primary-color);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
            }

            .profile-sidebar {
                width: 100%;
            }
        }

        /* Footer styles (same as homepage) */
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px;
            margin-top: auto;
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
    </style>
</head>
<body>
    <!-- Header Section (Same as Homepage) -->
    <header>
        <div class="logo">
            <i class="fas fa-plane"></i>
            <span>Arrow Ways</span>
        </div>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="flights.php">Flights</a></li>
                <li><a href="booking.php">Booking</a></li>
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

    <!-- Profile Container -->
    <div class="profile-container">
        <!-- Profile Sidebar -->
        <div class="profile-sidebar">
            <ul class="profile-sidebar-nav">
                <li><a href="#" class="active" data-section="profile-overview"><i class="fas fa-user"></i>Profile Overview</a></li>
                <li><a href="#" data-section="flight-history"><i class="fas fa-history"></i>Flight History</a></li>
                <li><a href="#" data-section="update-profile"><i class="fas fa-edit"></i>Update Profile</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </div>

        <!-- Profile Main Content -->
        <div class="profile-main">
            <!-- Profile Overview Section -->
            <div id="profile-overview" class="section">
                <h2 class="section-title">Profile Overview</h2>
                <div class="profile-details">
                    <p><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
                    <p><strong>Member Since:</strong> <?php echo $_SESSION['registration_date']; ?></p>
                    <p><strong>Total Flights:</strong> <?php echo $_SESSION['total_flights'] ?? 0; ?></p>
                </div>
            </div>

            <!-- Flight History Section -->
            <div id="flight-history" class="section" style="display:none;">
                <h2 class="section-title">Flight History</h2>
                <table class="flight-history-table">
                    <thead>
                        <tr>
                            <th>Flight Number</th>
                            <th>Destination</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Simulated flight history data
                        $flights = [
                            ['number' => 'AW101', 'destination' => 'New York', 'date' => '2024-03-15', 'status' => 'Completed'],
                            ['number' => 'AW205', 'destination' => 'London', 'date' => '2024-02-20', 'status' => 'Completed'],
                            ['number' => 'AW309', 'destination' => 'Tokyo', 'date' => '2024-01-10', 'status' => 'Completed']
                        ];

                        foreach ($flights as $flight) {
                            echo "<tr>
                                <td>{$flight['number']}</td>
                                <td>{$flight['destination']}</td>
                                <td>{$flight['date']}</td>
                                <td>{$flight['status']}</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Update Profile Section -->
            <div id="update-profile" class="section" style="display:none;">
                <h2 class="section-title">Update Profile</h2>
                <form class="profile-form" action="update_profile.php" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $_SESSION['user_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo $_SESSION['user_phone'] ?? ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password (optional)</label>
                        <input type="password" id="password" name="password" placeholder="Leave blank if no change">
                    </div>
                    <button type="submit" class="btn">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section (Same as Homepage) -->
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
        // Profile Section Navigation
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.profile-sidebar-nav li a');
            const sections = document.querySelectorAll('.section');

            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetSection = this.getAttribute('data-section');

                    // Remove active class from all links
                    sidebarLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    // Hide all sections
                    sections.forEach(section => {
                        section.style.display = 'none';
                    });

                    // Show target section
                    document.getElementById(targetSection).style.display = 'block';
                });
            });
        });
    </script>
</body>
</html>