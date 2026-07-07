<?php
// app/Helpers/functions.php

/**
 * Standard API Response format
 */
function sendResponse($status, $message, $data = [], $code = 200) {
    header("Content-Type: application/json");
    http_response_code($code);
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data,
        "timestamp" => date("Y-m-d H:i:s")
    ]);
    exit();
}

/**
 * Generate Unique IDs (CUS00000001, SP00000001 etc)
 */
function generateUniqueID($prefix, $last_id_from_db) {
    $number = is_null($last_id_from_db) ? 0 : (int)substr($last_id_from_db, strlen($prefix));
    $new_number = str_pad($number + 1, 8, '0', STR_PAD_LEFT);
    return $prefix . $new_number;
}

/**
 * Clean User Inputs (XSS Protection)
 */
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
