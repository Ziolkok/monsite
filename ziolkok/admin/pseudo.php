<?php
include('config.php');

  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="text" name="pseudo" placeholder="Pseudo">
    <input type="submit" name="modifier" value="modifier">
	</form>
	<a href="listeuser.php">Retour liste</a>
</body>
</html>
<?php

$id=$_GET['user_id'];



if (isset($_POST['pseudo'])){

  $insertsql = $bdd->prepare("UPDATE site_user SET pseudo=? WHERE user_id = '{$id}'");
  $insertsql->execute(array($_POST['pseudo']));


}
 ?>
