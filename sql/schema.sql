-- Database Schema for Hotel Waiting Management System
CREATE DATABASE IF NOT EXISTS hotel_queue_db;
USE hotel_queue_db;

CREATE TABLE IF NOT EXISTS tables (
    table_id INT AUTO_INCREMENT PRIMARY KEY,
    table_number VARCHAR(10) NOT NULL UNIQUE,
    capacity INT NOT NULL,
    status ENUM('AVAILABLE', 'OCCUPIED', 'RESERVED', 'CLEANING') DEFAULT 'AVAILABLE',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS waiting_queue (
    queue_id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_number INT NOT NULL UNIQUE,
    guest_name VARCHAR(120) NOT NULL,
    party_size INT NOT NULL,
    phone_number VARCHAR(25),
    special_requests TEXT,
    is_priority BOOLEAN DEFAULT FALSE,
    status ENUM('WAITING', 'NOTIFIED', 'SEATED', 'CANCELLED') DEFAULT 'WAITING',
    assigned_table_id INT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    seated_at TIMESTAMP NULL,
    FOREIGN KEY (assigned_table_id) REFERENCES tables(table_id) ON DELETE SET NULL
);
