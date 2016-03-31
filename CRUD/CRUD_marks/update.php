<?php

$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
//  	die("Connection failed: " .mysqli_connect_error());
//  	} else {
//  	echo "Connected successfully !";
//  	}
if(empty($_POST['submit'])){

	$id_mark = $_GET['id'];

	$q = "SELECT * FROM marks WHERE id_mark = $id_mark";
	$res = mysqli_query($conn, $q);

	$row = mysqli_fetch_assoc($res);

	echo "<p>Променете марката на автомобила</p>";
	echo "<form action='update.php' method='post'>";
	
	echo "<input type='hidden' name='id_mark' value=".$row['id_mark'].">";

	echo "<input type='text' name='mark_name' value='".$row['mark_name']."'>";
	echo "<input type='submit' name='submit' value='Промени'>";
	echo "</form>";
}else {
	
	$id_mark = $_POST['id_mark'];
	$mark_name = $_POST['mark_name'];
	$update_query = "UPDATE marks 
					SET mark_name ='$mark_name' 
					WHERE id_mark=$id_mark";
					
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				
		echo "Успешно променихте $mark_name в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}