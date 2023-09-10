<?php 
        echo "<meta charset='UTF_8'/>";
        session_start();
        include ("connexion.php");

    
    
        $conn = se_connecter("projetsteg");
        $id = $_SESSION['ref'];


?>