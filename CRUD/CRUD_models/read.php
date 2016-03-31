<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$read_query 	="SELECT * FROM models LEFT JOIN marks
			 	ON models.id_mark=marks.id_mark
			 	WHERE models.date_deleted IS NULL ";
$read_result = mysqli_query($conn, $read_query);

echo "<table border = 1>";
echo '<tr>';
		echo '<td>mark</td>';
		echo '<td>model</td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '</tr>';
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
		echo '<tr>';
		echo '<td>'.$row['mark_name'].'</td>';
		echo '<td>'.$row['model_name'].'</td>';
		
		echo '<td><a href="update.php?id='.$row['id_model'].'">Edit</a></td>';
		echo '<td><a href="delete.php?id='.$row['id_model'].'">Delete</a></td>';
		echo '</tr>';
		}
	}
echo "</table>";