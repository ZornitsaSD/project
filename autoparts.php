<?php
include_once('includes/header.php');
?>
<div id="main">

<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');


echo "<div id='search'>";
echo "<p>";
echo "ТЪРСЕНЕ НА АВТОЧАСТИ ПО МАРКА И МОДЕЛ НА АВТОМОБИЛА";
echo "</p>";
echo "</div>";

 	echo "<div id='search1'>";
 	echo "<p>Избери марка</p>";

    echo"<form action='autoparts1.php' method='post'>";

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
	echo "</div>";


?>
</div>

<?php
include_once('includes/footer.php');
?>