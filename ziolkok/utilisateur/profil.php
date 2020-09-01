<?php
session_start();
include('config.php');


$date = date('Y-m-d H:i:s');




if(isset($_SESSION['user_id']) AND $_SESSION['user_id'] > 0)
{
  $getid = intval($_SESSION['user_id']);
  $requser = $bdd->prepare('SELECT * FROM site_user WHERE user_id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();
?>

<body class="">

<header>
  
  <a href="index.php">index</a>

</header>





<div class="container" id="containerprofil">
  <div class="container" id="profiltitle">


  <h1 id="titleprofil">
  Profil   <?php echo "de ".$userinfo['pseudo']  ?>
  </h1>

    </div>

      <div id="infosprofil" class="container">

  <?php echo '<div id="divinfos" class="container"> <h1 id="apropos">
  A propos de moi :
  </h1><span class="flexinfos"> Profil de : <span id="pseudo">'.$userinfo['pseudo']. '</span></span>' ?>
 <?php echo '<span class="flexinfos"> Nom : <span id="nom">'. $userinfo['last_name'] . '</span></span>'; ?>
   <?php echo '<span class="flexinfos"> Prénom : <span id="prenom">'. $userinfo['first_name'] . '</span></span>'; ?>
   <?php echo '<span class="flexinfos">  Mail : <span id="mail">'. $userinfo['mail'] . '</span></span></div>'; ?>
      </div>






     </div>




    </div>
  </div>
</div>
</div>

</body>
</html>
<?php
}
?>
