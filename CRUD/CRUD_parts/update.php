<?php

$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
//  	die("Connection failed: " .mysqli_connect_error());
//  	} else {
//  	echo "Connected successfully !";
//  	}
if(empty($_POST['submit'])){
	$id_model = $_GET['id'];

	$q 		= "SELECT * FROM models 
			LEFT JOIN marks ON models.id_mark=marks.id_mark 
			WHERE models.id_model=$id_model";
	$res = mysqli_query($conn, $q);
	$row = mysqli_fetch_assoc($res);

	echo "<p>Въведи промени в модела</p>";
	echo "<form action='update.php' method='post'>";
	
	echo "<input type='hidden' name='id_model' value=".$row['id_model'].">";
	
	echo "<p>Промени модела</p>";
	echo "<input type='text' name='model_name' value=".$row['model_name'].">";

	echo "<p>Промени марката</p>";
	echo "<select name='id_mark'>";
	
	$q_marks 		= "SELECT * FROM marks WHERE date_deleted IS NULL";
	$res_marks 	= mysqli_query($conn, $q_marks);
	if (mysqli_num_rows($res_marks) > 0) {
		while($row_marks = mysqli_fetch_assoc($res_marks)){ 			
			echo '<option value="'.$row_marks['id_mark'].'"';
			if($row_marks['id_mark']===$row['id_mark']){echo 'selected='.$row_marks['id_mark']."'";}
			echo '>'.$row_marks['mark_name'].'</option>';
		}
	}
	echo "</select>";
	
	echo "<p><input type='submit' name='submit' value='Промени'></p>";
	echo "</form>";
}else {
	//!!!!!!!!!!!
	$id_model			= $_POST['id_model'];
	$model_name 		= $_POST['model_name'];
	$id_mark 			= $_POST['id_mark'];
	
	
	$update_query = "UPDATE models 
					SET model_name = '$model_name',
					id_mark = $id_mark	
					WHERE id_model = $id_model";
					
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				
		echo "Успешно променихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}