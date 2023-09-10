<?php

include ("connexion.php");
$conn= se_connecter( "projetsteg"); 


$idd=$_GET['var'];
$id=$_GET['id'];
echo $idd;
echo $id;

$req="DELETE FROM user WHERE id='$id' ";
$send=$conn->exec($req);

header("Location:acceuil.php?var=$idd ");


?>