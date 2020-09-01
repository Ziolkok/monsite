<?php
  if (!isset($_SESSION)) {
    session_start();
  }


  include('config.php');

?>



<!DOCTYPE html>
<html>
<head>
  <title>Projet</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/connexion.css">
</head>

<body>

  <a href="index.php" class="btn-home"><img src="css/home.png" width="50px"></a>

  <form class="contact1-form validate-form" id="connexionform" role="form" action="" method="POST">
    <h1 class="contact1-form-title">CONNEXION</h1>

    <div>
      <input type="text" name="pseudoconnect" placeholder="Nom" class="input-txt">
    </div>



    <div>
      <input type="password" name="mdpconnect" placeholder="Mot de passe" class="input-txt">
    </div>

    <?php
    if (isset($_POST['formconnect']))
    {
        $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
        $mdpconnect = md5($_POST['mdpconnect']);
        if(!empty($pseudoconnect) AND !empty($mdpconnect))
        {
            $requser = $bdd->prepare("SELECT * FROM site_user WHERE pseudo = ? AND password = ?");
            $requser->execute(array($pseudoconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if ($userexist == 1)
            {
             /*if($user['confirme'] == 1) {*/

              $userinfo = $requser->fetch();
              $_SESSION['user_id'] = $userinfo['user_id'];
              $_SESSION['pseudo'] = $userinfo['pseudo'];
              $_SESSION['mail'] = $userinfo['mail'];
              echo $_SESSION['mail'];
              $debut = (int)microtime(true);
              $_SESSION['debut']=$debut;
              header("Location: profil.php?id=".$_SESSION['user_id']);
              exit;

          }
            else
            {
              ?>
              <script type="text/javascript">
                alert('Pseudo ou/et Mot de passe incorrect !');
              </script>
              <?php
            }
        }
        else
        {
          ?>
          <script type="text/javascript">
            alert('*Tous les champs doivent être complétés !');
          </script>
          <?php
        }
    }
    ?>


    <div>
      <input type="submit" id="bouton" name="formconnect" value="Se connecter !" class="input-submit">
    </div>

    <div>
      <a href="inscription.php">Pas encore de compte? S'inscrire</a>
      <a href="forgot_p.php">Mot de passe oublié?</a>
    </div>

  </form>

</body>
</html>

