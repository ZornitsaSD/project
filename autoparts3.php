<?php
include_once('includes/header.php');
?>

<div id="main">

<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');

	echo "<div id='search1'>";
	echo "<p>Избери част</p>";
	echo"<form action='autoparts4.php' method='post'>";

	if (isset($_POST['id_mark'])) {
	$id_mark = $_POST['id_mark'];
	echo "<input type='hidden' name='id_mark' value=$id_mark>";
}
	if (isset($_POST['id_model'])) {
	$id_model = $_POST['id_model'];
	echo "<input type='hidden' name='id_model' value=$id_model>";
}
if (isset($_POST['id_category'])) {
	$id_category = $_POST['id_category'];
	echo "<input type='hidden' name='id_category' value=$id_category>";
}
	
	echo "<select name='id_parts'>";
	$q_parts 		= "SELECT * FROM partss WHERE id_category=$id_category AND date_deleted IS NULL";
	$res_parts 	= mysqli_query($conn, $q_parts);
	if (mysqli_num_rows($res_parts) > 0) {
		while($row_parts = mysqli_fetch_assoc($res_parts)){ 			
			echo '<option value="'.$row_parts['id_parts'].'"';
			if($row_parts['id_parts']===$row_parts['id_parts']){echo 'selected='.$row_parts['id_parts']."'";}
			echo '>'.$row_parts['parts_name'].'</option>';
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