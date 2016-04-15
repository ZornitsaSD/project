<?php

$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
//  	die("Connection failed: " .mysqli_connect_error());
//  	} else {
//  	echo "Connected successfully !";
//  	}
if(empty($_POST['submit'])){
	$id_part = $_GET['id'];

	$q 		= "SELECT * FROM parts 
			JOIN partss ON parts.id_parts=partss.id_parts JOIN models ON parts.id_model=models.id_model 
			WHERE parts.id_part=$id_part";

	$res = mysqli_query($conn, $q);
	$row = mysqli_fetch_assoc($res);

	echo "<p>Въведи промени</p>";
	echo "<form action='update.php' method='post'>";
	
	echo "<input type='hidden' name='id_part' value=".$row['id_part'].">";
	echo "<p>Промени описанието</p>";
	echo "<textarea name='description' value=".$row['description'].">".$row['description']."</textarea>";

	echo "<p>Промени наличност</p>";
	echo "<input type='text' name='instock' value=".$row['instock'].">";
		
	echo "<p>Промени цената</p>";
	echo "<input type='text' name='price' value=".$row['price'].">";

	echo "<p>Промени частта</p>";
	echo "<select name='id_parts'>";
	
	$q_partss 		= "SELECT * FROM partss WHERE date_deleted IS NULL";
	$res_partss 	= mysqli_query($conn, $q_partss);
	if (mysqli_num_rows($res_partss) > 0) {
		while($row_partss = mysqli_fetch_assoc($res_partss)){ 			
			echo '<option value="'.$row_partss['id_parts'].'"';
			if($row_partss['id_parts']===$row_partss['id_parts']){echo 'selected='.$row_partss['id_parts']."'";}
			echo '>'.$row_partss['parts_name'].'</option>';
		}
	}
	echo "</select>";

	echo "<p>Промени модела</p>";
	echo "<select name='id_model'>";
	
	$q_models 		= "SELECT * FROM models WHERE date_deleted IS NULL";
	$res_models 	= mysqli_query($conn, $q_models);
	if (mysqli_num_rows($res_models) > 0) {
		while($row_models = mysqli_fetch_assoc($res_models)){ 			
			echo '<option value="'.$row_models['id_model'].'"';
			if($row_models['id_model']===$row_models['id_model']){echo 'selected='.$row_models['id_model']."'";}
			echo '>'.$row_models['model_name'].'</option>';
		}
	}
	echo "</select>";
	
	echo "<p><input type='submit' name='submit' value='Промени'></p>";
	echo "</form>";
}else {
	
	$id_part			= $_POST['id_part'];
	$description        =$_POST['description'];
	$instock            =$_POST['instock'];
	$price              =$_POST['price'];
	$id_model 			= $_POST['id_model'];

	
	
	$update_query = "UPDATE parts 
					SET 
					description = '$description',
					instock = $instock,
					price = $price,
					id_model = $id_model
					WHERE id_part = $id_part";
				
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				
		echo "Успешно променихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}