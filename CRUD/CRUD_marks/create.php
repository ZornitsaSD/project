<?php 
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){
	echo "<p>Въведете марка на автомобил</p>";
	echo "<form action='create.php' method='post'>";
	echo "<input type='text' name='mark_name'>";
	echo "<input type='submit' name='submit' value='Въведете'>";
	echo "</form>";
}
else{
	
	$mark_name = $_POST['mark_name'];
	
	$insert_query = 	"INSERT INTO marks(mark_name) 
						VALUES ('$mark_name')";
			
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				echo "Успешно добавихте $mark_name в базата данни!";
				echo "<p><a href='read.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
}