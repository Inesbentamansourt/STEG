<?php
function se_connecter()
{
  $host = "localhost";
  $user = "root";
  $pass = "";
  $base = "projetsteg";

  try {
      $cnx = new PDO("mysql:host=" . $host . ";dbname=" . $base, $user, $pass);
      // préciser le mode de retour des erreurs : ERRMODE_EXCEPTION : générer une exception
      $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // retourner l'objet  de connexion
      return $cnx;
      }
  catch(PDOException $e)
      {
      echo "<br>" . $e->getMessage();
      }

  return null;
}

?>
