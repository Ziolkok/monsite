<?php
session_start();
include('config.php');

  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
  $q = "SELECT * FROM produit";
  $req = $bdd->prepare($q);
  $req->execute();
  ?>
  <div class="">
    <?php
    while ($resu = $req->fetch()) {
      echo $resu['nom']  ;
      echo "<br>";

      echo $resu['ing1'] . " " ;
      echo $resu['ing2'] . " " ;
      echo $resu['ing3'] . " " ;
      echo $resu['ing4'];
      ?>
      <a href="produit.php?id=<?php echo $resu['id']; ?>">rrrrr</a>
      <?php
      echo "<br>";

    } ?>

  </div>
  <?php
 ?>
</body>
</html>
<?php




 ?>
