<?php
try
{ 
	$bdd = new PDO('mysql:host=localhost:3308; dbname=stage', 'root', 'root'); 
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>