<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ajouter.css">
</head>
<body>
  <?php 
  //verifier que le button ajouter a bien ete clique
  if(isset($_POST['button'])){
    extract($_POST);
    //extration des information envoye dans des variable par la methode post
    if(isset($nom) && isset($prenom) && isset($age)){
      //connexion a la base de donnee
      include_once "connexion.php";
      //requette d ajout
      $req = mysqli_query($con , "INSERT INTO employe VALUE(NULL, '$nom','$prenom','$age')");
      if($req){
        header("location:index.php");

      }else{
        $message = "Employer ajoute";
      }
      }else{
$message = "veullier remplir les champs";
      }
    }
  
    
  
  ?>
    <div class="form">
        <a href="index.php" class="back_btn">Retour</a>
        <h2>Ajouter un employe</h2>
        <p class="erreur_message">
           <?php
           //si les variable message existe , affichons sont contenue
           if(isset($message)){
            echo $message;
           }
           
           ?>
        </p>
        <form action="" method="POST">
         <label>Nom:</label>
         <input type="text" name="nom">
           <label>prenom:</label>
         <input type="text" name="prenom">
           <label>age:</label>
         <input type="number" name="age">
         <input type="submit" value="AJOUTER" name="button">
        </form>
    </div>
</body>
</html>