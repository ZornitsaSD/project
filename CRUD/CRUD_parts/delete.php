<?php 
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$model_id 	= $_GET['id'];
$date 		= date('Y-m-d');

$delete_query = 	"UPDATE models 
					SET date_deleted ='$date'
					WHERE id_model = $id_model";
	
$delete_result = mysqli_query($conn, $delete_query);

if ($delete_result) {
 				
		echo "Успешно изтрихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешно изтриване на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
