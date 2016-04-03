<?php 
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){

	echo "<h3>Въведи нова част</h3>";
	echo "<form action='create.php' method='post'>";

	echo "<p>Въведи описание на частта</p>";
	echo "<textarea name='description'></textarea>";

	echo "<p>Въведи наличност</p>";
	echo "<input type='text' name='instock'>";

	echo "<p>Въведи цена на частта</p>";
	echo "<input type='text' name='price'>";

	$q 	= "SELECT * FROM categories WHERE date_deleted IS NULL";
	$res 	= mysqli_query($conn, $q);
	echo "<p>Избери категория на частта</p>";
	echo "<select name='id_category'>";
	
	if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res1)){ 
			echo '<option value="'.$row['id_category'].'"';
			if($row['category_name']==='--'){echo 'selected="--"';}
			echo '>'.$row['category_name'].'</option>';
		}
	}
	echo "</select>";

	$q1 	= "SELECT * FROM categories WHERE date_deleted IS NULL";
	$res1 	= mysqli_query($conn, $q1);
	echo "<p>Избери категория на частта</p>";
	echo "<select name='id_category'>";
	
	if (mysqli_num_rows($res1) > 0) {
		while($row1 = mysqli_fetch_assoc($res1)){ 
			echo '<option value="'.$row1['id_category'].'"';
			if($row1['category_name']==='--'){echo 'selected="--"';}
			echo '>'.$row1['category_name'].'</option>';
		}
	}
	echo "</select>";

	$q2 		= "SELECT * FROM models WHERE date_deleted IS NULL";
	$res2 	= mysqli_query($conn, $q2);
	echo "<p>Избери модел на автомобил</p>";
	echo "<select name='id_model'>";
	
	if (mysqli_num_rows($res2) > 0) {
		while($row2 = mysqli_fetch_assoc($res2)){ 
			echo '<option value="'.$row2['id_model'].'"';
			if($row2['model_name']==='--'){echo 'selected="--"';}
			echo '>'.$row2['model_name'].'</option>';
		}
	}
	echo "</select>";

	echo "<p><input type='submit' name='submit' value='Въведи'></p>";
	echo "</form>";
}
else{
	$part_name 		= $_POST['part_name'];	
	$description 	= $_POST['description'];
	$instock        = $_POST['instock'];
	$price		    = $_POST['price'];
	$id_model       = $_POST['id_model'];
	$id_category 	= $_POST['id_category'];
	
	
	$insert_query = 	"INSERT INTO parts(part_name, description, instock, price, id_category, id_model) 
						VALUES ('$part_name', '$description', $instock, $price, $id_category, $id_model)";
		
	$insert_result= mysqli_query($conn, $insert_query);
	if ($insert_result) {
				
		echo "Успешно добавихте запис в базата данни!";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
	}
}