<?php
include_once('includes/header.php');
?>

<div id="main">

<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');

if(!empty($_GET)) {
	$photo = $_GET['photo'];

	$insert_q = "INSERT INTO parts(photo) 
						VALUES ('$update_photo')";



} else {
	$photo = '';
} 	
//retrieving product info
$q = "SELECT * FROM `parts` WHERE `photo` = '$photo'";
$result = mysqli_query($conn, $q);
if (mysqli_num_rows($result)>0) {
	$row = mysqli_fetch_assoc($result);
}
?>
<!-- to be deleted from here-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="jquery-1.11.3.min.js"></script>
</head>
<body>
	<form method="post" action="img1.php" enctype="multipart/form-data">
		<input type="hidden" name="id_part" value=vzima se ot url"<?php  if (isset ($row['id'])){ echo $row['id']; }?>">
		<!-- <input type="hidden" name="description" value="<?php  if (isset ($description)){ echo $description; }?>"> -->
		<label for="ph">изберете снимка</label>
		<input type="file" name="photo" id="ph">
		<input type="submit" name="submit" value="запиши" >
	</form>
	<?php 
		/*$q_new_info = "UPDATE `parts` 
						SET `description`='$description',
						`price`=$price,
						`instock`=$instock
						WHERE `id` = $id";*/
						if (isset($_POST['submit'])) {
							$id = $_POST['id_part'];
							//$description = $_POST['description'];
							if(!empty($_FILES))		{	
								// $file_name = $_FILES['photo']['name'];
								$tmp_name = $_FILES['photo']['tmp_name'];
								// $file_size = $_FILES['photo']['size'];
								// $file_type = $_FILES['photo']['type'];
								$content = addslashes(file_get_contents($tmp_name));
//insering picture into the
								$q = "UPDATE `parts` 
								SET `photo`='$content',
								
								WHERE `id_part` = $id";
								if (mysqli_query($conn, $q)) {
									echo "Успешно записахте снимка на частта";
									$q = "SELECT `photo` FROM `parts` WHERE id_part = $id";
									$result = mysqli_query($conn, $q);
									$row = mysqli_fetch_assoc($result);
									echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
								} else {
									echo "Опитайте отново!";
								}
							}
						}
						
						//MIME (Multipurpose Internet Mail Extensions)
						?>
							
					</body>
					</html>