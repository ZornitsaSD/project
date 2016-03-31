<?php

$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
//  	die("Connection failed: " .mysqli_connect_error());
//  	} else {
//  	echo "Connected successfully !";
//  	}
if(empty($_POST['submit'])){

	$id_category = $_GET['id'];

	$q = "SELECT * FROM categories WHERE id_category = $id_category";
	$res = mysqli_query($conn, $q);
	$row = mysqli_fetch_assoc($res);

	echo "<p>Променете категорията</p>";
	echo "<form action='update.php' method='post'>";
	
	echo "<input type='hidden' name='id_category' value=".$row['id_category'].">";
	echo "<input type='text' name='category_name' value='".$row['category_name']."'>";
	echo "<input type='submit' name='submit' value='Промени'>";
	echo "</form>";
}else {
	
	$id_category = $_POST['id_category'];
	$category_name = $_POST['category_name'];
	$update_query = "UPDATE categories 
					SET category_name ='$category_name' 
					WHERE id_category=$id_category";
					
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				
		echo "Успешно променихте $category_name в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}