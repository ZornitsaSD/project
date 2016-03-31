<?php
include_once('includes/header.php');
?>

<div id="main">
<?php
echo'<span id="form"><form>
  <div class="form-group">
    <label for="exampleInputUsername">Потребителско име</label>
    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Парола</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-default">Вход</button>
</form></span>'


/*echo "<div id='reg'><h3>Моля, въведете потребителско име и парола!</h3></div>";
echo "<span id='form'><form action='autoparts.php' method='post'>";

input_type('<p>','</p>','usr', 'text', 'username', '', 'Потребителско име* ');
input_type('<p>','</p>','ps', 'password', 'password', '', 'Парола* ');
input_type('<p>','</p>','sub', 'submit', 'submit', 'Вход', '');
echo "</span></form>";*/
?>
</div>

<?php
include_once('includes/footer.php');
?>