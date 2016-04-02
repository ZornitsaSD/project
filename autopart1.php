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
function mark($conn){
	echo "<form action='autopart1.php' method='post'>";
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
function model($conn,$id_mark){
	echo "<form action='autopart1.php' method='post'>";
	echo "<select name='id_model'>";
	
	$q 		= "SELECT * FROM model WHERE id_mark = $id_mark and date_deleted IS NULL";
	$res 	= mysqli_query($conn, $q);
     if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)){ 			
			echo '<option value="'.$row['id_model'].'"';
			if($row['id_model']===$row['id_model']){echo 'selected='.$row['id_model']."'";}
			echo '>'.$row['mark_name'].'</option>';
		}
	 }
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='Избери'></p>";
	echo "</form>";}	

    model($conn,'Suzuki');




?>
</div>

<?php
include_once('includes/footer.php');
?>