<?php
include_once('includes/header.php');
?>

<div id="main">
<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');

	echo "<div id='search1'>";
	echo "<p>Избери категория</p>";
	echo"<form action='autoparts3.php' method='post'>";
	
	if (isset($_POST['id_mark'])) {
	$id_mark = $_POST['id_mark'];
}
	echo "<input type='hidden' name='id_mark' value=$id_mark>";

	if (isset($_POST['id_model'])) {
	$id_model = $_POST['id_model'];
	echo "<input type='hidden' name='id_model' value=$id_model>";
}

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
	echo "</form>";
	echo "</div>";
	?>
	</div>

<?php
include_once('includes/footer.php');
?>