<?php
class MySQLConnectionUtil
{
	public static function getConnection ()
	{
	$Servername = 'localhost';
	$Username = $_SESSION['username'];
	$Password = $_SESSION['password'];
	$Database = 'delivery';
	$Conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn)
	{
		throw new Exception (mysqli_connect_error());
	}
	return $conn;
	}
}
?>