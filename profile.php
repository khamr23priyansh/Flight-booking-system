<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        header {
            background-image: linear-gradient(rgba(0, 13, 255, 0.5), rgba(0, 0, 0, 0.5)), url('/api/placeholder/1200/300');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        nav ul li {
            margin-left: 20px;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        
        .profile-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .profile-sidebar {
            flex: 1;
            min-width: 250px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        
        .profile-content {
            flex: 3;
            min-width: 300px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: block;
            background-color: #e0e0e0;
            overflow: hidden;
        }
        
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .sidebar-menu li:last-child {
            border-bottom: none;
        }
        
        .sidebar-menu a {
            text-decoration: none;
            color: #333;
            display: block;
            transition: color 0.3s;
        }
        
        .sidebar-menu a:hover {
            color: #0045e5;
        }
        
        .sidebar-menu .active {
            color: #0045e5;
            font-weight: bold;
        }
        
        .section-title {
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
            margin-top: 0;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .button-primary {
            background-color: #0045e5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        .button-primary:hover {
            background-color: #0036b1;
        }
        
        .button-danger {
            background-color: #e50000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        .button-danger:hover {
            background-color: #b10000;
        }
        
        .ticket-history {
            margin-top: 20px;
        }
        
        .ticket {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .ticket-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .ticket-title {
            font-weight: bold;
            margin: 0;
        }
        
        .ticket-status {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .status-open {
            background-color: #e5f6ff;
            color: #0077cc;
        }
        
        .status-closed {
            background-color: #e5ffe5;
            color: #00aa00;
        }
        
        .status-pending {
            background-color: #fff6e5;
            color: #cc7700;
        }
        
        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
            }
            
            .profile-sidebar, .profile-content {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">TicketSystem</div>
            <nav>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="profile.html" class="active">Profile</a></li>
                    <li><a href="#" onclick="alert('Logged out successfully!'); return false;">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="container">
        <div class="profile-container">
            <div class="profile-sidebar">
                <div class="profile-picture">
                    <img src="/api/placeholder/150/150" alt="Profile Picture">
                </div>
                <ul class="sidebar-menu">
                    <li><a href="#personal-info" class="active">Personal Information</a></li>
                    <li><a href="#change-password">Change Password</a></li>
                    <li><a href="#ticket-history">Ticket History</a></li>
                    <li><a href="#" onclick="alert('Logged out successfully!'); return false;">Logout</a></li>
                </ul>
            </div>
            
            <div class="profile-content">
                <section id="personal-info">
                    <h2 class="section-title">Personal Information</h2>
                    <form>
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullname" value="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" value="john.doe@example.com">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" value="(123) 456-7890">
                        </div>
                        <button type="button" class="button-primary" onclick="alert('Profile updated successfully!')">Save Changes</button>
                    </form>
                </section>
                
                <section id="change-password" style="display: none;">
                    <h2 class="section-title">Change Password</h2>
                    <form>
                        <div class="form-group">
                            <label for="current-password">Current Password</label>
                            <input type="password" id="current-password">
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input type="password" id="new-password">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password</label>
                            <input type="password" id="confirm-password">
                        </div>
                        <button type="button" class="button-primary" onclick="alert('Password updated successfully!')">Update Password</button>
                    </form>
                </section>
                
                <section id="ticket-history" style="display: none;">
                    <h2 class="section-title">Ticket History</h2>
                    <div class="ticket-history">
                        <div class="ticket">
                            <div class="ticket-header">
                                <h3 class="ticket-title">Network Connection Issue</h3>
                                <span class="ticket-status status-closed">Closed</span>
                            </div>
                            <p>Ticket ID: #12345</p>
                            <p>Created: March 15, 2025</p>
                            <p>Last Updated: March 18, 2025</p>
                        </div>
                        
                        <div class="ticket">
                            <div class="ticket-header">
                                <h3 class="ticket-title">Software Installation Help</h3>
                                <span class="ticket-status status-open">Open</span>
                            </div>
                            <p>Ticket ID: #12346</p>
                            <p>Created: March 19, 2025</p>
                            <p>Last Updated: March 19, 2025</p>
                        </div>
                        
                        <div class="ticket">
                            <div class="ticket-header">
                                <h3 class="ticket-title">Password Reset Request</h3>
                                <span class="ticket-status status-pending">Pending</span>
                            </div>
                            <p>Ticket ID: #12347</p>
                            <p>Created: March 20, 2025</p>
                            <p>Last Updated: March 20, 2025</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    
    <script>
        // Simple navigation between sections
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.getAttribute('href').startsWith('#')) {
                    e.preventDefault();
                    
                    // Hide all sections
                    document.querySelectorAll('.profile-content > section').forEach(section => {
                        section.style.display = 'none';
                    });
                    
                    // Show the selected section
                    const targetId = this.getAttribute('href').substring(1);
                    document.getElementById(targetId).style.display = 'block';
                    
                    // Update active state
                    document.querySelectorAll('.sidebar-menu a').forEach(menuLink => {
                        menuLink.classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>