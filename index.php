    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
        <a href="ajouter.php" class="btn_add">AJOUTER</a>
        <table>
            <tr id="items">
                <th>nom</th>
                <th>prenom</th>
                <th>age</th>
                <th colspan="2">action</th>
            </tr>
             <?php 
  //inclure la page de connexion
  include_once "connexion.php";
  // requete pour affiche la liste des employe
   $req=mysqli_query($con,"SELECT*FROM employe");
   
   if(mysqli_num_rows($req) == 0){
    //si il n existe pas d employe dans la base de donnee , alors on affiche ce message
    echo"il y a pas encore d employe ajouter!";
   }else{
    //si nom ; affiche la liste de tous les employe
    while($row=mysqli_fetch_assoc($req)){?>
    <tr>
        <td><?=$row['nom']?></td>
         <td><?=$row['prenom']?></td>
          <td><?=$row['age']?></td>
          <!--nous allons mettre l id de chaque employe dans se lien-->
          <td><a href="modifier.php?id=<?=$row['id']?>">modifier</a></td>
            <td><a href="supprimer.php?id=<?=$row['id']?>">supprimer</a></td>
    </tr>
    <?php
}
}
 ?> 
        </table>
    </div>
    
</body>

</html>