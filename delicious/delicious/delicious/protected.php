<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
	header('Location: signup.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Protected Page</title>
</head>
<body>
	<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
</body>
</html>