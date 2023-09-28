<?php
// Read the contents of data_m.json
$json = file_get_contents('data_m.json');

// Set the response content type to JSON
header('Content-Type: application/json');

// Check if file_get_contents was successful
if ($json === false) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Unable to read data_m.json']);
} else {
    // Output the JSON data
    echo $json;
}
?>
