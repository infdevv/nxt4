// Read the contents of data_m.json
$json = file_get_contents('data_m.json');

// Set the response content type to JSON
header('Content-Type: application/json');

// Output the JSON data
echo $json;
