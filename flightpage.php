<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrow Ways - Flight Search</title>
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
            background-color: #f5f5f5;
            min-height: 100vh;
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

        /* Flight Search Container */
        .flight-search-container {
            margin-top: 100px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .flight-search-form {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .flight-search-form input,
        .flight-search-form select {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: var(--secondary-color);
        }

        /* Flight Results */
        .flight-results {
            margin-top: 20px;
        }

        .flight-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 15px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .flight-details {
            flex: 2;
        }

        .flight-price {
            flex: 1;
            text-align: right;
        }

        .flight-route {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .flight-route i {
            margin: 0 10px;
            color: var(--primary-color);
        }

        .flight-meta {
            display: flex;
            justify-content: space-between;
            color: #666;
        }

        /* Radar Styles */
        .flight-radar {
            margin-top: 20px;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }

        .flight-radar iframe {
            width: 100%;
            height: 500px;
            border: none;
            border-radius: 10px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .flight-search-form {
                flex-direction: column;
            }

            .flight-card {
                flex-direction: column;
                text-align: center;
            }

            .flight-details, .flight-price {
                width: 100%;
                text-align: center;
            }
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
                <li><a href="flightpage.php">Flight radar</a></li>
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

    <!-- Flight Search Container -->
    <div class="flight-search-container">
        <form class="flight-search-form" id="flightSearchForm">
            <select name="origin" required>
                <option value="">From</option>
                <option value="NYC">New York</option>
                <option value="LAX">Los Angeles</option>
                <option value="CHI">Chicago</option>
                <option value="LDN">London</option>
                <option value="TKY">Tokyo</option>
            </select>
            <select name="destination" required>
                <option value="">To</option>
                <option value="PAR">Paris</option>
                <option value="TOR">Toronto</option>
                <option value="DUB">Dubai</option>
                <option value="SYD">Sydney</option>
                <option value="SIN">Singapore</option>
            </select>
            <input type="date" name="departure_date" required>
            <select name="airline">
                <option value="">Select Airline</option>
                <option value="AA">American Airlines</option>
                <option value="DL">Delta</option>
                <option value="UA">United Airlines</option>
                <option value="BA">British Airways</option>
                <option value="EK">Emirates</option>
            </select>
            <button type="submit" class="search-button">Search Flights</button>
        </form>

        <!-- Flight Results -->
        <div class="flight-results" id="flightResults">
            <!-- Flight results will be dynamically populated here -->
        </div>

        <!-- Flight Radar -->
        <div class="flight-radar">
            <h2>Live Flight Tracking</h2>
            <iframe src="https://www.flightradar24.com/simple" title="Flight Radar"></iframe>
        </div>
    </div>

    <script>
    document.getElementById('flightSearchForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Sample flight data (in a real application, this would come from a backend API)
        const flights = [
            {
                airline: 'AA',
                flightNumber: 'AA123',
                origin: 'NYC',
                destination: 'LDN',
                departureTime: '08:00 AM',
                arrivalTime: '08:00 PM',
                duration: '7h 30m',
                stops: 0,
                price: '$550'
            },
            {
                airline: 'BA',
                flightNumber: 'BA456',
                origin: 'NYC',
                destination: 'LDN',
                departureTime: '11:30 AM',
                arrivalTime: '11:00 PM',
                duration: '8h 15m',
                stops: 1,
                price: '$480'
            }
        ];

        const resultsContainer = document.getElementById('flightResults');
        resultsContainer.innerHTML = ''; // Clear previous results

        flights.forEach(flight => {
            const flightCard = document.createElement('div');
            flightCard.classList.add('flight-card');
            flightCard.innerHTML = `
                <div class="flight-details">
                    <div class="flight-route">
                        <span>${flight.origin}</span>
                        <i class="fas fa-plane"></i>
                        <span>${flight.destination}</span>
                    </div>
                    <div class="flight-meta">
                        <div>
                            <strong>Flight: ${flight.flightNumber}</strong>
                            <p>Departure: ${flight.departureTime}</p>
                            <p>Arrival: ${flight.arrivalTime}</p>
                        </div>
                        <div>
                            <p>Duration: ${flight.duration}</p>
                            <p>Stops: ${flight.stops}</p>
                        </div>
                    </div>
                </div>
                <div class="flight-price">
                    <h3>${flight.price}</h3>
                    <button class="search-button">Book Now</button>
                </div>
            `;
            resultsContainer.appendChild(flightCard);
        });
    });
    </script>
</body>
</html>