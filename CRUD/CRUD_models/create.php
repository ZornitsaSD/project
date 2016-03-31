<?php 
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){

	$q 		= "SELECT * FROM marks WHERE date_deleted IS NULL";
	$res 	= mysqli_query($conn, $q);
	
	echo "<h3>Въведи нов модел</h3>";
	echo "<form action='create.php' method='post'>";
	echo "<p>Въведи модел</p>";
	echo "<input type='text' name='model_name'>";

	echo "<p>Избери марка</p>";
	echo "<select name='id_mark'>";
	
	if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)){ 
			echo '<option value="'.$row['id_mark'].'"';
			if($row['mark_name']==='--'){echo 'selected="--"';}
			echo '>'.$row['mark_name'].'</option>';
		}
	}
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='Въведи'></p>";
	echo "</form>";
}
else{

	$model_name 		= $_POST['model_name'];
	$id_mark 			= $_POST['id_mark'];
	
	$insert_query = 	"INSERT INTO models(model_name, id_mark) 
						VALUES ('$model_name', $id_mark)";
			
	$insert_result= mysqli_query($conn, $insert_query);
	if ($insert_result) {
				
		echo "Успешно добавихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
	}
}