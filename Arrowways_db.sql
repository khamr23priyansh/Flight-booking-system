-- Create the Arrowways database
CREATE DATABASE arrowways;

-- Use the Arrowways database
USE arrowways;

-- Create Aircraft table
CREATE TABLE aircraft (
    id INT PRIMARY KEY AUTO_INCREMENT,
    registration_number VARCHAR(20) NOT NULL UNIQUE,
    model VARCHAR(50) NOT NULL,
    manufacturer VARCHAR(50) NOT NULL,
    seating_capacity INT NOT NULL,
    year_manufactured INT,
    status ENUM('Active', 'Maintenance', 'Retired') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Airline table
CREATE TABLE airline (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    iata_code VARCHAR(2) UNIQUE,
    icao_code VARCHAR(3) UNIQUE,
    country VARCHAR(50) NOT NULL,
    headquarters VARCHAR(100),
    logo_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Airport table
CREATE TABLE airport (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    iata_code VARCHAR(3) UNIQUE,
    icao_code VARCHAR(4) UNIQUE,
    latitude DECIMAL(10, 6),
    longitude DECIMAL(10, 6),
    timezone VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create User table
CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    date_of_birth DATE,
    address TEXT,
    passport_number VARCHAR(50),
    nationality VARCHAR(50),
    status ENUM('Active', 'Inactive') DEFAULT 'Active',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Admin table
CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    role ENUM('Super Admin', 'Admin', 'Moderator') DEFAULT 'Admin',
    last_login TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Flights table
CREATE TABLE flights (
    id INT PRIMARY KEY AUTO_INCREMENT,
    flight_number VARCHAR(10) NOT NULL,
    airline_id INT NOT NULL,
    aircraft_id INT NOT NULL,
    departure_airport_id INT NOT NULL,
    arrival_airport_id INT NOT NULL,
    departure_time DATETIME NOT NULL,
    arrival_time DATETIME NOT NULL,
    status ENUM('Scheduled', 'Delayed', 'Boarding', 'In Air', 'Landed', 'Cancelled') DEFAULT 'Scheduled',
    economy_price DECIMAL(10, 2) NOT NULL,
    business_price DECIMAL(10, 2),
    first_class_price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (airline_id) REFERENCES airline(id),
    FOREIGN KEY (aircraft_id) REFERENCES aircraft(id),
    FOREIGN KEY (departure_airport_id) REFERENCES airport(id),
    FOREIGN KEY (arrival_airport_id) REFERENCES airport(id)
);

-- Create Booking table
CREATE TABLE booking (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    flight_id INT NOT NULL,
    booking_reference VARCHAR(10) NOT NULL UNIQUE,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    travel_class ENUM('Economy', 'Business', 'First') DEFAULT 'Economy',
    seat_number VARCHAR(5),
    passengers INT DEFAULT 1,
    total_price DECIMAL(10, 2) NOT NULL,
    payment_status ENUM('Pending', 'Completed', 'Failed', 'Refunded') DEFAULT 'Pending',
    booking_status ENUM('Confirmed', 'Cancelled', 'Checked In') DEFAULT 'Confirmed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (flight_id) REFERENCES flights(id)
);