<?php
include_once('includes/header.php');
?>

<div id="main">

<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');

  	echo "<div id='search1'>";
	echo "<p>Избери модел</p>";

	echo "<form action='autoparts2.php' method='post'>";

	if (isset($_POST['id_mark'])) {
	$id_mark = $_POST['id_mark'];
	echo "<input type='hidden' name='id_mark' value=$id_mark>";
}
	
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
	echo "<p><input type='submit' name='submit' value='Избери'></p>";
	echo "</form>";
	echo "</div>";
?>
	</div>

<?php
include_once('includes/footer.php');
?>