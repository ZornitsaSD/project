<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$read_query 	="SELECT * FROM parts JOIN categories
			 	ON parts.id_category=categories.id_category JOIN models ON parts.id_model=models.id_model
			 	WHERE parts.date_deleted IS NULL ";
$read_result = mysqli_query($conn, $read_query);

echo "<table border = 1>";
echo '<tr>';
		echo '<td>Част</td>';
		echo '<td>Описание</td>';
		echo '<td>Цена, лв</td>';
		echo '<td>Наличност</td>';
		echo '<td>Категория</td>';
		echo '<td>Модел на автомобил</td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '</tr>';
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
		echo '<tr>';
		echo '<td>'.$row['part_name'].'</td>';
		echo '<td>'.$row['description'].'</td>';
		echo '<td>'.$row['price'].'</td>';
		echo '<td>'.$row['instock'].'</td>';
		echo '<td>'.$row['category_name'].'</td>';
		echo '<td>'.$row['model_name'].'</td>';
		
		echo '<td><a href="update.php?id='.$row['id_part'].'">Edit</a></td>';
		echo '<td><a href="delete.php?id='.$row['id_part'].'">Delete</a></td>';
		echo '</tr>';
		}
	}
echo "</table>";