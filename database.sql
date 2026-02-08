CREATE DATABASE IF NOT EXISTS appointment_db;
USE appointment_db;

-- Businesses Table
CREATE TABLE IF NOT EXISTS businesses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    blind_id VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    logo_url VARCHAR(255),
    plan ENUM('free', 'starter', 'pro', 'enterprise') DEFAULT 'free',
    subdomain VARCHAR(100) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('owner', 'worker', 'admin') DEFAULT 'owner',
    is_verified BOOLEAN DEFAULT FALSE,
    reset_token_hash VARCHAR(64) NULL,
    reset_token_expires_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE
);

-- Workers Table
CREATE TABLE IF NOT EXISTS workers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    user_id INT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    calendar_connected BOOLEAN DEFAULT FALSE,
    blind_id VARCHAR(10) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Services Table
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    duration_min INT NOT NULL DEFAULT 30,
    price_naira DECIMAL(10, 2) DEFAULT 0.00,
    active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE
);

-- Bookings Table
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    service_id INT,
    worker_id INT,
    visitor_name VARCHAR(255) NOT NULL,
    visitor_email VARCHAR(255) NOT NULL,
    start_at DATETIME NOT NULL,
    end_at DATETIME NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled', 'completed') DEFAULT 'pending',
    blind_ref VARCHAR(10) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE SET NULL,
    FOREIGN KEY (worker_id) REFERENCES workers(id) ON DELETE SET NULL
);

-- Business Availability
CREATE TABLE IF NOT EXISTS availability_business (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    weekday TINYINT NOT NULL, -- 0=Sunday, 6=Saturday
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE
);

-- Worker Availability
CREATE TABLE IF NOT EXISTS availability_worker (
    id INT AUTO_INCREMENT PRIMARY KEY,
    worker_id INT NOT NULL,
    weekday TINYINT NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    FOREIGN KEY (worker_id) REFERENCES workers(id) ON DELETE CASCADE
);

-- OAuth Tokens (Google Calendar)
CREATE TABLE IF NOT EXISTS oauth_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    provider VARCHAR(50) DEFAULT 'google',
    encrypted_token TEXT NOT NULL,
    expires_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Payments
CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    booking_id INT,
    gateway VARCHAR(50) NOT NULL, -- paystack, flutterwave
    ref VARCHAR(100) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    currency VARCHAR(3) DEFAULT 'NGN',
    status ENUM('pending', 'success', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE SET NULL
);

-- Email Logs
CREATE TABLE IF NOT EXISTS email_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT,
    type VARCHAR(50) NOT NULL,
    to_email VARCHAR(255) NOT NULL,
    subject VARCHAR(255),
    status ENUM('sent', 'failed') DEFAULT 'sent',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Abuse Logs (Security)
CREATE TABLE IF NOT EXISTS abuse_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(45) NOT NULL,
    action VARCHAR(50) NOT NULL,
    result VARCHAR(50),
    meta_json TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- API Keys
CREATE TABLE IF NOT EXISTS api_keys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    key_hash VARCHAR(64) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_used_at DATETIME,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE
);

-- Worker Invitations
CREATE TABLE IF NOT EXISTS worker_invitations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    token_hash VARCHAR(64) NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE
);

-- Login Attempts (Rate Limiting)
CREATE TABLE IF NOT EXISTS login_attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    attempts INT DEFAULT 0,
    last_attempt_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    locked_until DATETIME NULL,
    UNIQUE KEY unique_ip (ip_address)
);

-- Worker Invitations
CREATE TABLE IF NOT EXISTS worker_invitations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_id INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    token_hash VARCHAR(64) NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (business_id) REFERENCES businesses(id) ON DELETE CASCADE
);