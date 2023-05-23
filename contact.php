<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare data to be saved in file
$data = array(
    'name' => $name,
    'email' => $email,
    'message' => $message
);

$file = 'contact_data.json';

// Check if file exists
if (file_exists($file)) {
    // Get existing data
    $current_data = file_get_contents($file);
    $array_data = json_decode($current_data, true);

    // Append new data
    $array_data[] = $data;
    $final_data = json_encode($array_data);
} else {
    // Create new JSON array and add the data
    $final_data = json_encode(array($data));
}

// Save data in file
if (file_put_contents($file, $final_data)) {
    echo "Data successfully saved!";
} else {
    echo "There was an error saving your data!";
}

// Redirect back to the contact form
header("Location: contact-us.html");
exit;
?>
