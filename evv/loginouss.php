

<!DOCTYPE html>
<html lang="fr">
<?php session_start(); 

?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>login</title>

  <!-- Custom fonts for this template-->
  <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  
  <link href="../admin/css/sb-admin.css" rel="stylesheet">


</head>

<body class="bg-white">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header "   style="color:#ffffff;" ><img src="log.png" width="60" height="80"  >  se connecter </div>
		
      <div class="card-body">
        <form method="post" action=" test_login.php">
          <div class="form-group">
            <div class="form-label-group">
             <input type="pseudo" id="email_client" name="inputEmail" class="form-control" placeholder="pseudo" required="required" autofocus="autofocus">
              <label for="email_client">Email</label>
            </div>
			  
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password_client" name="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="password_client">Mot de passe</label>
            </div>
          </div>
          
          <input type="submit" name="connecter" value="connecter" class="btn btn-primary btn-block">
          <a class="" href="../achat/index.php"></h3> </a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">s'inscrire</a>
        </div>
        <div class="<?php if(isset($_SESSION['erreurs']) && !empty($_SESSION['erreurs']))
        {echo 'alert alert-danger mt-4';} ?>" role="alert">
         <?php 
         if(isset($_SESSION['erreurs']) && !empty($_SESSION['erreurs']) ){
         echo '<ul>';
         //var_dump($_SESSION);
          foreach ($_SESSION['erreurs'] as $erreur) {
           echo '<li>' . $erreur . '</li>';
          }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
	
	
	
	
  <!-- Bootstrap core JavaScript-->
  <script src="../admin/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
<?php 
$_SESSION['erreurs'] = '';
unset($_SESSION);
?>