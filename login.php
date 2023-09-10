
<?php

session_start();

include("connexion.php");
$conn= se_connecter();   


  // vérifier si on arrive à cette page suite à un "submit"
   
   if (isset($_GET["submit"]))
     
    {
        $identifiant = $_GET["login"];       
        $motpasse = $_GET["pwd"];
   
         // vérifier dans la base si l'utilisateur existe
       
         $requette = "SELECT * FROM user "
         . " WHERE email = '" . $identifiant . "'"
         . " AND motdepasse = '" . $motpasse . "'";
        // echo $requette;
         //die($requette);
       
         $resultat = $conn->query($requette, PDO::FETCH_ASSOC);
      
         $ligne = $resultat->fetchObject();
      
          if ($ligne)
          {
            
             $_SESSION['login'] = $ligne->login;

             if ($ligne->role== 'responsable')
             {  
              //  $_SESSION["user"] = "oui";
                    
                    header("location:acceuil.php?var=$ligne->id");
             }  
             else  if ($ligne->role== 'Agent')
             {
              //  $_SESSION["user"] = "oui";
                    
                    header("location:accueilagent.php?var=$ligne->id");
             }
             else if($ligne->role== 'Reparateur') {
                header("location:reparateur.php?var=$ligne->id");
             }       
             exit;
             
          }
          else {
            echo(  "<script> alert('Nom d'utisateur ou mot de passe incorrecte !');</script>");            
             echo "<br/>";
        
            //echo "<a href='se connecter.php'>se connecter de nouveau</a>";
           //  header("location:login.php");
         }
    }
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
<title>page login</title>
    
    
   
    <link href="style.min.css" rel="stylesheet">
   
</head>

<body>
    <div class="main-wrapper">
        
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(img.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="logo.png" alt="logo" width=80 height=50 /></span>
                        <h5 class="font-medium m-b-20">s'authentifier</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" id="loginform" method="get" action="login.php">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="nom d'utilisateur" aria-label="nom d'utilisateur" aria-describedby="basic-addon1"  id="login" name="login" required >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="mot de passe" aria-label="mot de passe" aria-describedby="basic-addon1" id="pwd" name="pwd" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                       
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit" name="submit">Log In</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                       
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    
                    <div class="row m-t-20">
                   
                        <form class="col-12" action="index.html">
                      
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="email" required="" placeholder="nom d'utilisateur" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
   
</body>

</html>