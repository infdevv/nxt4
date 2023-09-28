// Get the input data from the POST request
$input_data = $_POST['input_data'];

// Open the data_m.json file for writing
$file = fopen('data_d.json', 'w');

// Write the input data to the file
fwrite($file, $input_data);

// Close the file
fclose($file);
