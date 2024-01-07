<?php 

// Get the raw JSON data from the request body
$jsonData = file_get_contents("php://input");

$userArray = json_decode(html_entity_decode($jsonData), true);

// Now $userArray contains the data sent from the frontend
// You can process it as needed, for example, by storing it in a database

// Example: Print the data
print_r($userArray);

?>