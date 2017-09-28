<?php
session_start();

include_once 'class.user.php';

$user = new User(); 
$id_k = $_SESSION['id_korisnik'];
if (!$user->get_session()){

 header("location:login.php");

}

if (isset($_GET['q'])){

 $user->user_logout();

 header("location:login.php");

 }

?>

<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

<div id="header"><a href="home.php?q=logout">LOGOUT</a></div>

<div id="main-body">

<p>Zdravo <?php $user->get_fullname($id_k); ?></p>

</div>
<form method="post" action="search.php" name="search" id="searchform">
    <input type="text" name="term" id="searchinput">
    <input type="submit" name="submit" id="searchsubmit" value="submit">
</form>

</body>
</html>
