<?php

include ("connexion.php");
$conn= se_connecter( "projetsteg"); 


$id=$_GET['var'];
echo $id;
$req="DELETE FROM user WHERE id='$id' ";
$send=$conn->exec($req);

header("Location:acceuil.php");

?>