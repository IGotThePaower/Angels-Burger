<?php
// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['messages'];

// Handle file upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["application_form"]["name"]);
if (move_uploaded_file($_FILES["application_form"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["application_form"]["name"])). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Prepare data to be saved in file
$data = array(
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'message' => $message,
    'file' => $target_file
);

$file = 'franchise_data.json';

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

// Redirect back to the franchise form
header("Location: franchise.html");
exit;
?>