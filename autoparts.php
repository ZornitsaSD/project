<?php
include_once('includes/header.php');
?>

<?php
/*if (empty($_POST['submit'])) {*/
?>

<div id="main">
<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
//header('Content-Type: text/html; charset=utf-8');
echo "<p>";
echo "Търсене на авточасти по марка и модел на автомобила: ";
echo "</p>";

/*if (empty($_POST['submit'])){
	echo "<form action='autoparts.php' method='post'>";
	echo "<select name='id_mark'>";
	
	$q 		= "SELECT * FROM marks WHERE date_deleted IS NULL";
	$res 	= mysqli_query($conn, $q);
     if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)){ 			
			echo '<option value="'.$row['id_mark'].'"';
			if($row['id_mark']===$row['id_mark']){echo 'selected='.$row['id_mark']."'";}
			echo '>'.$row['mark_name'].'</option>';
		}
	 }
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='Избери'></p>";
	echo "</form>";}

 
 else{
	$id_mark = $_POST['id_mark'];
	echo "<form action='autoparts.php' method='post'>";
	echo "<select name='id_model'>";
		$q2 	= "SELECT * FROM models WHERE id_mark = $id_mark AND date_deleted IS NULL";
		$res2 	= mysqli_query($conn, $q2);
		if (mysqli_num_rows($res2) > 0) {
		while($row2 = mysqli_fetch_assoc($res2)){ 			
			echo '<option value="'.$row2['id_model'].'"';
			if($row2['id_model']===$row2['id_model']){echo 'selected='.$row2['id_model']."'";}
			echo '>'.$row2['model_name'].'</option>';
		}
	}	
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='Избери'></p>";
    echo "</form>";
   
}*/


if (empty($_POST['submit'])){
	echo "<form action='autoparts.php' method='post'>";
	echo "<select name='id_mark'>";
	
	$q 		= "SELECT * FROM marks WHERE date_deleted IS NULL";
	$res 	= mysqli_query($conn, $q);
     if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)){ 			
			echo '<option value="'.$row['id_mark'].'"';
			if($row['id_mark']===$row['id_mark']){echo 'selected='.$row['id_mark']."'";}
			echo '>'.$row['mark_name'].'</option>';
		}
	 }
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='Избери'></p>";
	echo "</form>";

}else{
	
	echo "<p>Избери модел</p>";
	$id_mark = $_POST['id_mark'];

	echo "<form action='autoparts.php' method='post'>";
	echo "<select name='id_model'>";
	
	$q_models 		= "SELECT * FROM models WHERE id_mark = $id_mark AND date_deleted IS NULL";
	$res_models 	= mysqli_query($conn, $q_models);
	if (mysqli_num_rows($res_models) > 0) {
		while($row_models = mysqli_fetch_assoc($res_models)){ 			
			echo '<option value="'.$row_models['id_model'].'"';
			if($row_models['id_model']===$row_models['id_model']){echo 'selected='.$row_models['id_model']."'";}
			echo '>'.$row_models['model_name'].'</option>';
		}
	}
	echo "</select>";


	echo "<p>Избери категория</p>";
	echo "<select name='id_category'>";
	
	$q_categories 		= "SELECT * FROM categories WHERE date_deleted IS NULL";
	$res_categories 	= mysqli_query($conn, $q_categories);
	if (mysqli_num_rows($res_categories) > 0) {
		while($row_categories = mysqli_fetch_assoc($res_categories)){ 			
			echo '<option value="'.$row_categories['id_category'].'"';
			if($row_categories['id_category']===$row_categories['id_category']){echo 'selected='.$row_categories['id_category']."'";}
			echo '>'.$row_categories['category_name'].'</option>';
		}
	}
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='Избери'></p>";
	if (empty($_POST['submit'])){
		}else{echo 111111111111111;
	echo "</form>";	
	
	echo "<p>Избери част</p>";
	$id_category = $_POST['id_category'];

	echo "<select name='id_part'>";
	
	$q_parts 		= "SELECT * FROM parts WHERE id_category = $id_category AND date_deleted IS NULL";
	$res_parts 	= mysqli_query($conn, $q_parts);
	if (mysqli_num_rows($res_parts) > 0) {
		while($row_parts = mysqli_fetch_assoc($res_parts)){ 			
			echo '<option value="'.$row_parts['id_part'].'"';
			if($row_parts['id_part']===$row_parts['id_part']){echo 'selected='.$row_parts['id_part']."'";}
			echo '>'.$row_parts['part_name'].'</option>';
		}
	}
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='Избери'></p>";
	echo "</form>";	
	
}

}

?>
</div>

<?php
include_once('includes/footer.php');
?>