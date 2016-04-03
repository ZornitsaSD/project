<?php

$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
//  	die("Connection failed: " .mysqli_connect_error());
//  	} else {
//  	echo "Connected successfully !";
//  	}
if(empty($_POST['submit'])){

	$id_parts = $_GET['id'];

	$q = "SELECT * FROM partss WHERE id_parts = $id_parts";
	$res = mysqli_query($conn, $q);

	$row = mysqli_fetch_assoc($res);

	echo "<p>Променете частта на автомобила</p>";
	echo "<form action='update.php' method='post'>";
	
	echo "<input type='hidden' name='id_parts' value=".$row['id_parts'].">";

	echo "<input type='text' name='parts_name' value='".$row['parts_name']."'>";
	echo "<input type='submit' name='submit' value='Промени'>";
	echo "</form>";
}else {
	
	$id_parts = $_POST['id_parts'];
	$parts_name = $_POST['parts_name'];
	$update_query = "UPDATE partss 
					SET parts_name ='$parts_name' 
					WHERE id_parts=$id_parts";
					
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				
		echo "Успешно променихте $parts_name в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}