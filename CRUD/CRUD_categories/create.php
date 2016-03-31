<?php 
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){
	echo "<p>Въведете категория</p>";
	echo "<form action='create.php' method='post'>";
	echo "<input type='text' name='category_name'>";
	echo "<input type='submit' name='submit' value='Въведете'>";
	echo "</form>";
}
else{

	$category_name = $_POST['category_name'];

	$insert_query = 	"INSERT INTO categories (category_name) 
						VALUES ('$category_name')";
			
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				
				echo "Успешно добавихте $category_name в базата данни!";
				echo "<p><a href='read.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
}