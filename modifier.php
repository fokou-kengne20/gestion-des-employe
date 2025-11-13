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
       include_once "connexion.php";
      //requette d ajout
      $id =$_GET['id'];
      $req = mysqli_query($con , "SELECT* FROM employe WHERE id=$id");
       $row = mysqli_fetch_assoc($req);
  
      //verifier que le button ajouter a bien ete clique
  if(isset($_POST['button'])){
    extract($_POST);
    //extration des information envoye dans des variable par la methode post
    if(isset($nom) && isset($prenom) && isset($age)){
      //requette de modification
      $req = mysqli_query($con,"UPDATE employe SET nom='$nom',prenom='$prenom',age='$age' WHERE id=$id");
      

      if($req)
      {
        header("location:index.php");

      }else{
        $message = "Employer modifier";
      }
      }else{
$message = "veullier remplir les champs";
      }
    }
  
    
  
  ?>
      <div class="form">
        <a href="index.php" class="back_btn">Retour</a>
        <h2>modifier l employer</h2>
        <p class="erreur_message">
           <?php 
           if(isset($message)){
            echo $message;
           }
           ?>
        </p>
        <form action="" method="POST">
         <label>Nom:</label>
         <input type="text" name="nom"value="<?=$row['nom']?>">
           <label>prenom:</label>
         <input type="text" name="prenom" value="<?=$row['prenom']?>">
           <label>age:</label>
         <input type="number" name="age" value="<?=$row['age']?>">
         <input type="submit" value="MODIFIER" name="button">
        </form>
    </div>
</body>
</html>