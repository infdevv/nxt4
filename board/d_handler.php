<?php
// Enable CORS (Cross-Origin Resource Sharing)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Get the input data from the POST request
$input_data = json_decode(file_get_contents("php://input"), true);

// Check if input_data is not empty and is an array
if (!empty($input_data) && is_array($input_data)) {
    // Open the data_m.json file for writing
    $file = fopen('data_d.json', 'w');

    // Check if the file was opened successfully
    if ($file) {
        // Write the input data to the file
        fwrite($file, json_encode($input_data));

        // Close the file
        fclose($file);

        // Send a success response
        echo json_encode(['status' => 'success']);
    } else {
        // Send an error response if the file couldn't be opened
        http_response_code(500); // Internal Server Error
        echo json_encode(['status' => 'error', 'message' => 'Unable to open the file for writing']);
    }
} else {
    // Send an error response if input_data is empty or not an array
    http_response_code(400); // Bad Request
    echo json_encode(['status' => 'error', 'message' => 'Invalid input data']);
}
?>
