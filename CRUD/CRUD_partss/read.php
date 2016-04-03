<?php

$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$read_query = 	"SELECT * FROM partss 
				WHERE date_deleted IS NULL";
$read_result = mysqli_query($conn, $read_query);

echo "<ul>";
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
		echo '<li>'.$row['parts_name'];
		echo ' '.'<a href="update.php?id='.$row['id_parts'].'">Edit</a>';
		echo ' '.'<a href="delete.php?id='.$row['id_parts'].'">Delete</a>';
		echo '</li>';
		}
	}
echo "</ul>";
