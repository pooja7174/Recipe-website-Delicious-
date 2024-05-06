<?php
// Configuration
$db_host = 'your_database_host';
$db_email = 'your_database_email';
$db_password = 'your_database_password';
$db_name = 'your_database_name';

// Connect to database
$conn = new mysqli($db_host, $db_email, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Get posted data
$username = $_POST['email'];
$password = $_POST['password'];

// Query to retrieve user data
$query = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	$user_data = $result->fetch_assoc();
	
	// Verify password
	if (password_verify($password, $user_data['password'])) {
		echo json_encode(['success' => true]);
	} else {
		echo json_encode(['success' => false]);
	}
} else {
	echo json_encode(['success' => false]);
}

$conn->close();
?>