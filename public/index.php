<?php
// public/index.php

// Session aur Timezone setup
session_start();
date_default_timezone_set('Asia/Kolkata');

// Helpers aur Config include karein
require_once __DIR__ . '/../app/Helpers/functions.php';
require_once __DIR__ . '/../config/database.php';

// Simple Routing Logic (Abhi ke liye basic)
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = '/service-marketplace-saas'; // Apne folder name ke hisab se change karein

// API header set karna agar API call ho rahi hai
if (strpos($request_uri, '/api/') !== false) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
}

// Check Database Connection
$db = new Database();
$conn = $db->getConnection();

if(!$conn) {
    sendResponse(false, "System Maintenance: Database Connection Failed", [], 500);
}

// Yahan se routing start hogi... 
// Agle step mein hum Auth Controller aur Signup banayenge.
