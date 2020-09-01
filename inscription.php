<?php
if (!isset($_SESSION)) {
  session_start();

}

include('config.php');
$date = date('Y-m-d H:i:s');



if (isset($_POST['inscription'])){
  $total=0;
  $reste=0;
  $nonvalide=0;

  if (isset($_POST['v1']) && $_POST['v1'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v1'])) {
    $total--;
  }
  if (isset($_POST['v2']) && $_POST['v2'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v2'])) {
    $total--;
  }
  if (isset($_POST['v3']) && $_POST['v3'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v3'])) {
    $total--;
  }
  if (isset($_POST['v4']) && $_POST['v4'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v4'])) {
    $total--;
  }
  if (isset($_POST['v5']) && $_POST['v5'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v5'])) {
    $total--;
  }
  if (isset($_POST['v6']) && $_POST['v6'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v6'])) {
    $total--;
  }
  if (isset($_POST['v7']) && $_POST['v7'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v7'])) {
    $total--;
  }
  if (isset($_POST['v8']) && $_POST['v8'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v8'])) {
    $total--;
  }
  if (isset($_POST['v9']) && $_POST['v9'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v9'])) {
    $total--;
  }
  if($total == $_SESSION['reponse']){
    if(!empty($_POST['pseudo']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp2'])){

      $pseudo = htmlspecialchars($_POST['pseudo']);
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $email = htmlspecialchars($_POST['email']);
      $mdp = md5($_POST['mdp']);
      $mdp2 = md5($_POST['mdp2']);
      $_SESSION['email']=$email;
      $_SESSION['pseudo']=$pseudo;

      // Verifier que le pseudo n'est pas déjà utilisé
      $q = "SELECT user_id FROM site_user WHERE pseudo = ?";
      $req = $bdd->prepare($q);
      $req->execute([$_POST['pseudo']]);
      $results = $req->fetchAll();
      if(count($results) != 0){ // tableau de résultats pas vide : pseudo déjà pris
        ?>
        <script type="text/javascript">
          alert('Le pseudo choisi est déjà pris !');
        </script>
        <?php
        // echo "Le pseudo choisi est déjà pris !";
        exit;
      }

      // Verifier que le mail n'est pas déjà utilisé
      $q = "SELECT mail FROM site_user WHERE mail = ?";
      $req = $bdd->prepare($q);
      $req->execute([$_POST['email']]);
      $results = $req->fetchAll();
      if(count($results) != 0){ // tableau de résultats pas vide : pseudo déjà pris
        ?>
        <script type="text/javascript">
          alert('Le mail choisi est déjà pris !');
        </script>
        <?php
        // echo "Le mail choisi est déjà pris !";
        exit;
      }

      if(!isset($_POST['mdp']) || strlen($_POST['mdp']) < 8 || strlen($_POST['mdp']) > 30){
        ?>
        <script type="text/javascript">
          alert('Le mot de passe doit contenir entre 8 et 30 caractères !');
        </script>
        <?php
        // echo "Le mot de passe doit contenir entre 8 et 30 caractères !";
        exit;
      }

      if ($_POST['mdp'] == $_POST['mdp2']) {
        $longueurKey = 12;
        $key = "";
        for($i=1;$i<$longueurKey;$i++){
          $key .= mt_rand(0,9);
        }



      $mdp = md5($_POST['mdp']);
      $date = date('Y-m-d H:i:s');
      $insertsql = $bdd->prepare('INSERT INTO site_user(pseudo, last_name, first_name, mail, password, confirm_key, signup_date) VALUES(?, ?, ?, ?, ?, ?, ?)');
      $insertsql->execute(array($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'],$mdp, $key, $date));





      if ($insertsql->rowCount() == 1){
        header('location:verification.php?key='.$key);
        echo "Vous avez reussi";
        exit;
      }
    }
      else{
        ?>
        <script type="text/javascript">
          alert('*Les mots de passes ne correspondent pas');
        </script>
        <?php
      }
    }
    else{
      ?>
      <script type="text/javascript">
        alert('*Il faut remplir tous les champs !');
      </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
      alert('Validez votre captcha ');
    </script>
    <?php
  }




}

include("execution.php");
include("../style/stylecaptcha.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inscription</title>
  <link rel="stylesheet" type="text/css" href="css/inscription.css">
</head>

<body>
  <a href="index.php" class="btn-home"><img src="css/home.png" width="50px"></a>

  <form name=""  id="connexionform" action="" onsubmit=""  method="POST">
    <div class="inscription-left">
      <h1>INSCRIPTION</h1>

      <div class="input-txt">
        <input id="login" type="text" name="pseudo" placeholder="Pseudo">
      </div>

      <div class="input-txt">
        <input type="text" name="nom" placeholder="Nom">
      </div>

      <div class="input-txt">
        <input type="text" name="prenom" placeholder="Prénom">
      </div>

      <div class="input-txt">
        <input id="email" type="text" name="email" placeholder="Adresse mail">
      </div>

      <div class="input-txt">
        <input type="password" id="password" name="mdp" placeholder="Mot de passe">
      </div>

      <div class="input-txt">
        <input type="password" id="password" name="mdp2" placeholder="Vérifiez le mot de passe">
      </div>
    </div>


    <?php
     $reponse = 0;
     if($value == $valeur1){
       $reponse++;
     }

     if($value == $valeur2){
       $reponse++;
     }

     if($value == $valeur3){
       $reponse++;
     }

     if($value == $valeur4){
       $reponse++;
     }

     if($value == $valeur5){
       $reponse++;
     }

     if($value == $valeur6){
       $reponse++;
     }

     if($value == $valeur7){
       $reponse++;
     }

     if($value == $valeur8){
       $reponse++;
     }

     if($value == $valeur9){
       $reponse++;
     }
     $temp=$value;
     $_SESSION['temp'] = $temp;
     $_SESSION['reponse'] = $reponse;
    ?>

    <div class="inscription-right">
      <table>
        <thead>
          <p class="title-captcha"><?php echo "Montre moi :  " . $value; ?></p>
        </thead>

        <tbody>
          <tr>
            <td id='captcha1'><input name="v1" class="captcha" type='checkbox' value='<?php echo $valeur1?>'/></td>
            <td id='captcha2'><input name="v2" class="captcha" type='checkbox' value='<?php echo $valeur2?>'/></td>
            <td id='captcha3'><input name="v3" class="captcha" type='checkbox' value='<?php echo $valeur3?>'/></td>
          </tr>

          <tr>
            <td id='captcha4'><input name="v4" class="captcha" type='checkbox' value='<?php echo $valeur4?>'/></td>
            <td id='captcha5'><input name="v5" class="captcha" type='checkbox' value='<?php echo $valeur5?>'/></td>
            <td id='captcha6'><input name="v6" class="captcha" type='checkbox' value='<?php echo $valeur6?>'/></td>
          </tr>

          <tr>
            <td id='captcha7'><input name="v7" class="captcha" type='checkbox' value='<?php echo $valeur7?>'/></td>
            <td id='captcha8'><input name="v8" class="captcha" type='checkbox' value='<?php echo $valeur8?>'/></td>
            <td id='captcha9'><input name="v9" class="captcha" type='checkbox' value='<?php echo $valeur9?>'/></td>
          </tr>
        </tbody>
      </table>

      <div>
        <input type="submit" name="inscription" class="input-submit">
      </div>
    </div>


    <?php
      if (isset($_SESSION)) {
      }
    ?> 

  </form>

</body>
</html>
