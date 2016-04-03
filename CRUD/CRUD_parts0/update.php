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
			JOIN categories ON parts.id_category=categories.id_category JOIN models ON parts.id_model=models.id_model 
			WHERE parts.id_part=$id_part";

	$res = mysqli_query($conn, $q);
	$row = mysqli_fetch_assoc($res);

	echo "<p>Въведи промени</p>";
	echo "<form action='update.php' method='post'>";
	
	echo "<input type='hidden' name='id_part' value=".$row['id_part'].">";
	
	echo "<p>Промени частта</p>";
	echo "<input type='text' name='part_name' value=".$row['part_name'].">";
	echo "<p>Промени описанието</p>";
	echo "<textarea name='description' value=".$row['description'].">".$row['description']."</textarea>";
	echo "<p>Промени наличност</p>";
	echo "<input type='text' name='instock' value=".$row['instock'].">";
	echo "<p>Промени цената</p>";
	echo "<input type='text' name='price' value=".$row['price'].">";

	echo "<p>Промени категорията</p>";
	echo "<select name='id_category'>";
	
	$q_categories 		= "SELECT * FROM categories WHERE date_deleted IS NULL";
	$res_categories 	= mysqli_query($conn, $q_categories);
	if (mysqli_num_rows($res_categories) > 0) {
		while($row_categories = mysqli_fetch_assoc($res_categories)){ 			
			echo '<option value="'.$row_categories['id_category'].'"';
			if($row_categories['id_category']===$row['id_category']){echo 'selected='.$row_categories['id_category']."'";}
			echo '>'.$row_categories['category_name'].'</option>';
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
			if($row_models['id_model']===$row['id_model']){echo 'selected='.$row_models['id_model']."'";}
			echo '>'.$row_models['model_name'].'</option>';
		}
	}
	echo "</select>";
	
	echo "<p><input type='submit' name='submit' value='Промени'></p>";
	echo "</form>";
}else {
	
	$id_part			= $_POST['id_part'];
	$part_name 		    = $_POST['part_name'];
	$description        =$_POST['description'];
	$instock            =$_POST['instock'];
	$price              =$_POST['price'];
	$id_category 		= $_POST['id_category'];
	$id_model 			= $_POST['id_model'];

	
	
	$update_query = "UPDATE parts 
					SET part_name = '$part_name',
					description = '$description',
					instock = $instock,
					price = $price,
					id_category = $id_category,
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