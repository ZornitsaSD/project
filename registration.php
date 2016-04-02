
<?php
include_once('includes/header.php');
?>

<div id="main">
<?php
  $conn = mysqli_connect('localhost', 'root', '', 'autoparts');
/* if (!$conn) {
  die("Connection failed: " .mysqli_connect_error());
  } else {
  echo "Connected successfully !";
  }*/
if ((empty($_POST['first_name']) && empty($_POST['surname'])
 && empty($_POST['email']) && empty($_POST['username']) && empty($_POST['password'])) || empty($_POST['submit'])) {
  
    

//echo "<div id='reg'><h3>Форма за регистрация</h3></div>";
echo "<span id='form'><form action='registration.php' method='post'>";
input_type('<p>','</p>', 'fn','text', 'first_name ', '','Име* ');
input_type('<p>','</p>', 'sn', 'text', 'surname', '', 'Фамилия ');
input_type('<p>','</p>', 'em', 'text', 'email', '', 'Email* ');
input_type('<p>','</p>','usr', 'text', 'username', '', 'Потребителско име* ');
input_type('<p>','</p>','ps', 'password', 'password', '', 'Парола* ');
input_type('<p>','</p>', 'check', 'checkbox', 'agreement ',  '', 'Съгласен съм с условията за ползване на сайта');
input_type('<p>','</p>','sub', 'submit', 'submit', 'Регисрация', '');
echo "</span></form>";

}else{
  $first_name = $_POST['first_name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = md5($password);
  $insert_query =   "INSERT INTO users(first_name, surname, email, username, password) 
            VALUES ('$first_name', '$surname', '$email', '$username', '$password')";
      
      $insert_result= mysqli_query($conn, $insert_query);

      if ($insert_result) {
        echo "<div id='success'>";
        echo "<h2>Успешна регистрация!</h2>";
        echo "</div>";
        echo "<div id='success1'>";
        echo "<h2><a href='autoparts.php'>Добре дошли!</a></h2>";
        echo "</div>";
      }else{
        echo "Неуспешна регистрация! Моля, опитайте по-късно!";
      }
}

?>
</div>

<?php
include_once('includes/footer.php');
?>
