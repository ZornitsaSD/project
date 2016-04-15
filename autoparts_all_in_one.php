<?php
include_once('includes/header.php');
?>


<div id="main">

<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');

if (empty($_POST['submit'])){$_POST['submit']='';}
echo "<div id='search'>";
echo "<p>";
echo "ТЪРСЕНЕ НА АВТОЧАСТИ ПО МАРКА И МОДЕЛ НА АВТОМОБИЛА";
echo "</p>";
echo "</div>";

 if ($_POST['submit']==''){
 	echo "<div id='search1'>";
 	echo "<p>Избери марка</p>";
    
    echo"<form action='autoparts.php' method='post'>";

    if (isset($_POST['id_mark'])) {
	$id_mark = $_POST['id_mark'];
	echo "<input type='hidden' name='id_mark' value=$id_mark>";
	}
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
    }
  	

  if ($_POST['submit']=='Избери'){
  	echo "<div id='search1'>";
	echo "<p>Избери модел</p>";
	$id_mark = $_POST['id_mark'];

	echo "<form action='autoparts.php' method='post'>";

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
	echo "<p><input type='submit' name='submit' value='Избери '></p>";
	echo "</form>";
	echo "</div>";

	}

	if ($_POST['submit']=='Избери ') {
	$id_model = $_POST['id_model'];

	echo "<div id='search1'>";
	echo "<p>Избери категория</p>";
	echo"<form action='autoparts.php' method='post'>";
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
	echo "<p><input type='submit' name='submit' value='Избери   '></p>";
	echo "</form>";
	echo "</div>";
    }

    
    if ($_POST['submit']=='Избери   ') {
    echo "<div id='search1'>";
	echo "<p>Избери част</p>";
	$id_category = $_POST['id_category'];
	echo"<form action='autoparts.php' method='post'>";

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
	echo "<p><input type='submit' name='submit' value='Избери    '></p>";
	echo "</form>";
	echo "</div>";

	}

   	if ($_POST['submit']=='Избери    '){

  	echo"<form action='autoparts.php' method='post'>";
  
 
   	$id_parts = $_POST['id_parts'];
   	
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
   	  WHERE parts.id_model=$id_model AND parts.id_parts=$id_parts AND parts.date_deleted IS NULL";
   	 
   	 $res11 	= mysqli_query($conn, $qq); 
   	 
  	echo "<div id='search2'>";
    echo"<form action='autoparts.php' method='post'>";
   	echo "<p>В момента разполагаме с: </p>";
    echo "<table border = 1>";
    echo '<tr>';
		echo '<td>Описание на частта</td>';
		echo '<td>цена, лв</td>';
		echo '<td>наличност</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td> ... </td>';
		echo '<td> ... </td>';
		echo '<td> ... </td>';
	echo '</tr>';

		if (mysqli_num_rows($res11) > 0) {
		
		while($row11 = mysqli_fetch_assoc($res11)){
		
		echo '<tr>';
		echo '<td>'.$row11['description'].'</td>';
		echo '<td>'.$row11['price'].'</td>';
		echo '<td>'.$row11['instock'].'</td>';
		echo '</tr>';
		}
	}
    echo "</table>";
    echo "</form>";
    echo "</div>";
    }


?>
</div>

<?php
include_once('includes/footer.php');
?>