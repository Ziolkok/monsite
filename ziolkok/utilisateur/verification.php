<?php
  if (!isset($_SESSION)) {
    session_start();
  }


  // include('user_header.php');
  include("config.php");
  // include("execution.php");
  $q = "SELECT confirm_key FROM site_user WHERE mail = ?";
  $req = $bdd->prepare($q);
  $req->execute([$_SESSION['email']]);
  $results = $req->fetchAll();

  // $total=0;
  // $reste=0;
  // $nonvalide=0;
 // echo $_SESSION['temp'] ;
 // echo "<br>";
 // echo $_SESSION['reponse'] ;
 // echo "<br>";
 // echo $_SESSION['email'];
 $email=$_SESSION['email'];
 // echo $_SESSION['pseudo'];
 $pseudo=$_SESSION['pseudo'];
 foreach ($results as $key => $value) {
  // echo $value['confirm_key'];
 }
 $key=$_GET['key'];
 // echo "<br>";
 // if (isset($_POST['v1']) && $_POST['v1'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v1'])) {
 //   $total--;
 // }
 // if (isset($_POST['v2']) && $_POST['v2'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v2'])) {
 //   $total--;
 // }
 // if (isset($_POST['v3']) && $_POST['v3'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v3'])) {
 //   $total--;
 // }
 // if (isset($_POST['v4']) && $_POST['v4'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v4'])) {
 //   $total--;
 // }
 // if (isset($_POST['v5']) && $_POST['v5'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v5'])) {
 //   $total--;
 // }
 // if (isset($_POST['v6']) && $_POST['v6'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v6'])) {
 //   $total--;
 // }
 // if (isset($_POST['v7']) && $_POST['v7'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v7'])) {
 //   $total--;
 // }
 // if (isset($_POST['v8']) && $_POST['v8'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v8'])) {
 //   $total--;
 // }
 // if (isset($_POST['v9']) && $_POST['v9'] == $_SESSION['temp']) {
 //   $total++;
 // }
 // elseif(isset($_POST['v9'])) {
 //   $total--;
 // }
 // echo $reste;
 // echo "<br>";
 // echo $total;
 // echo "<br>";
 if($key == $value['confirm_key']){
   $to = $email;
   $subject = 'Confirmation de votre compte';
   $message = '<a href="https://syoinformatik.fr/utilisateur/confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">CONFIRMEZ VOTRE COMPTE ! </a>';
   $headers .= "Content-type:text/html;charset=UTF-8" ."\r\n";

   mail($to, $subject, $message, $headers);
   header('location: confirmation.php?key='.$key);
 }
  else {

 }
  ?>
