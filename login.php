<?php
include_once('includes/header.php');
?>

<div id="main">
<?php
$conn = mysqli_connect('localhost', 'root', '', 'autoparts');
// if (!$conn) {
//	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}

if(empty($_POST['username1']) && empty($_POST['password1']) || empty($_POST['submit'])){
/*echo'<span id="form"><form>
  <div class="form-group">
    <label for="exampleInputUsername">Потребителско име</label>
    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Парола</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-default">Вход</button>
</form></span>'*/


//echo "<div id='reg'><h3>Моля, въведете потребителско име и парола!</h3></div>";
echo "<span id='form'><form action='login.php' method='post'>";

input_type('<p>','</p>','usr', 'text', 'username1', '', 'Потребителско име* ');
input_type('<p>','</p>','ps', 'password', 'password1', '', 'Парола* ');
input_type('<p>','</p>','sub', 'submit', 'submit', 'Вход', '');
echo "</span></form>";

}else{
  $username1 = $_POST['username1'];
  $password1 = $_POST['password1'];
  $password1 = md5($password1);

$read_query =   "SELECT username, password FROM users 
                 WHERE date_deleted IS NULL";

$read_result = mysqli_query($conn, $read_query);

$a = 0;

  if (mysqli_num_rows($read_result) > 0) {
    
    while($row = mysqli_fetch_assoc($read_result)){ 
     
      if ($row['username'] == $username1 && $row['password'] == $password1) {

        $a = 1;
         echo "<div id='success'>";
        echo "<h2><a href='autoparts.php'>Добре дошъл!</a></h2>";
        echo "</div>";
      }
    } 
  }
  if ($a != 1) {
    echo "<div id='success'>";
    echo "<h3>Грешна парола или потребителско име!</h3>";
    echo "</div>";
    echo "<div id='success1'>";
    echo "<h3><a href='login.php'>Опитайте отново!</a></h3>";
    echo "</div>";
  }
}
?>
</div>

<?php
//include_once('includes/footer.php');
?>