<?php 
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){
	echo "<p>Въведете част на автомобил</p>";
	echo "<form action='create.php' method='post'>";
	echo "<input type='text' name='parts_name'>";
	echo "<input type='submit' name='submit' value='Въведете'>";
	echo "</form>";
}
else{
	
	$parts_name = $_POST['parts_name'];
	
	$insert_query = 	"INSERT INTO partss(parts_name) 
						VALUES ('$parts_name')";
			
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				echo "Успешно добавихте $parts_name в базата данни!";
				echo "<p><a href='read.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
}