<?php 
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){
	echo "<p>Въведете нова част</p>";
	echo "<form action='create.php' method='post'>";
	echo "<input type='text' name='part_name'>";
	echo "<input type='submit' name='submit' value='Въведете'>";
	echo "</form>";
}
else{
	
	$part_name = $_POST['part_name'];
	
	$insert_query = 	"INSERT INTO parts(part_name) 
						VALUES ('$part_name')";
			
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				echo "Успешно добавихте $part_name в базата данни!";
				echo "<p><a href='read.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
}