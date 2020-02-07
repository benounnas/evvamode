<?php 
include '../includes/config.php';
session_start();
if(isset($_POST['connecter'])){

    $erreurs = [];
    $email = strip_tags(trim($_POST['inputEmail']));
    $password = strip_tags(trim($_POST['inputPassword']));

    
    
    $sql = 'SELECT * FROM client WHERE email_client LIKE :email LIMIT 1';
    $statement = $pdo->prepare($sql);
    

    $statement->bindValue(':email', $email);
   $statement->execute();
   $trouv =  $statement->fetch();

   var_dump($trouv);

  
    if($trouv){
       // echo 'trouvé';
       
       $password_bdd = $trouv['password_client'];
    
       if (password_verify($password, $password_bdd)) {
        // Succèss!
        $_SESSION['nom_client']=$trouv['nom_client'];
        $_SESSION['prenom_client']=$trouv['prenom_client'];
        $_SESSION['id_client']=$trouv['id_client'];
        header('location: ../achat/index.php');
       

        
    }else {
        // Invalide mot de passe
        $erreurs[] = 'mot de passe invalide';
        

        $_SESSION['erreurs'] = $erreurs;
        header('location: loginouss.php');
    }
       
    }else{
          ///pas trouvé
        $erreurs[] = 'votre email n\'existe pas dans notre base de données, veuillez s\'inscrire svp ';
        $_SESSION['erreurs'] = $erreurs;
        header('location: loginouss.php');

    }


    

    
}

?>