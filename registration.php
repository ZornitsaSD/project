
<?php
include_once('includes/header.php');
?>

<div id="main">
<?php
echo'<span id="form"><form action="autoparts.php" method="post">
  <div class="form-group">
    <label for="exampleName">Име*</label>
    <input type="text" class="form-control" id="exampleName" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="exampleThirdName">Фамилия</label>
    <input type="text" class="form-control" id="exampleName" placeholder="Third Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email*</label>
    <input type="Email" class="form-control" id="exampleInputEmail" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputUsername">Потребителско име*</label>
    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Парола*</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Съгласен съм с условията за ползване на сайта
    </label>
  </div>
  <button type="submit" class="btn btn-default">Вход</button>
</form></span>'
/*echo "<div id='reg'><h3>Форма за регистрация</h3></div>";
echo "<span id='form'><form action='autoparts.php' method='post'>";
input_type('<p>','</p>', 'fn','text', 'first_name ', '','Име* ');
input_type('<p>','</p>', 'sn', 'text', 'second_name', '', 'Фамилия ');
input_type('<p>','</p>', 'em', 'text', 'email', '', 'Email* ');
input_type('<p>','</p>','usr', 'text', 'username', '', 'Потребителско име* ');
input_type('<p>','</p>','ps', 'password', 'password', '', 'Парола* ');
input_type('<p>','</p>', 'check', 'checkbox', 'agreement ',  '', 'Съгласен съм с условията за ползване на сайта');
input_type('<p>','</p>','sub', 'submit', 'submit', 'Регисрация', '');
echo "</span></form>";*/
?>
</div>

<?php
include_once('includes/footer.php');
?>
