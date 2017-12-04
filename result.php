<?php
$connection = mysqli_connect('localhost', 'root', 'password', 'clearance');
if ($connection == false) {
	echo "Connection not established ".mysqli_connect_error();
	die();
}
