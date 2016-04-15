<?php 
//session_start();
?>
<?php
include_once('includes/header.php');
?>
<div id="main">

<?php
	$conn = mysqli_connect('localhost', 'root', '', 'autoparts');

	$id_parts = $_POST['id_parts'];
	
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

   	$qq = "SELECT * FROM parts JOIN models ON parts.id_model=models.id_model
   	 JOIN partss ON parts.id_parts=partss.id_parts
   	  WHERE parts.id_parts=$id_parts AND parts.id_model=$id_model AND parts.date_deleted IS NULL";
   	  
   	 $res11 	= mysqli_query($conn, $qq); 
     
  	echo "<div id='search2'>";
    echo"<form action='autoparts.php' method='post'>";
   	echo "<p>В момента разполагаме с: </p>";
    echo "<table border = 1>";
    echo '<tr>';
    	echo '<td>Снимка на частта</td>';
		echo '<td>Описание на частта</td>';
		echo '<td>цена, лв</td>';
		echo '<td>наличност</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td> ... </td>';
		echo '<td> ... </td>';
		echo '<td> ... </td>';
		echo '<td> ... </td>';
	echo '</tr>';

		if (mysqli_num_rows($res11) > 0) {
		while($row11 = mysqli_fetch_assoc($res11)){
		
		echo '<tr>';
		echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row11['photo'] ).'"/></td>';
		echo '<td>'.$row11['description'].'</td>';
		echo '<td>'.$row11['price'].'</td>';
		echo '<td>'.$row11['instock'].'</td>';
		echo '</tr>';
		}
	}
    echo "</table>";
    echo "</form>";
    echo "</div>";
  //<a href='autoparts.php'><input type='submit' name='submit' value='Начало на търсенето'></a>


?>
<a href='autoparts.php'>Начало на търсенето</a>
</div>

<?php
include_once('includes/footer.php');
?>