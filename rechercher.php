<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
 
<body>

    <div class="container">
        <form class="search-bar" method ="POST">
  <input type="search" placeholder="Rechercher..."  class="search-input" name="search">
  <button type="submit" class="search-button" name="submit">rechercher</button>
</div>
</form> 

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
 $search = "";
 if(isset($_POST['search'])){
    $search = trim($_POST['search']);
 }
  
 $sql = "SELECT * FROM employe WHERE nom LIKE '%{$search}%' ";
            $result =mysqli_query( $con , $sql);
            if (mysqli_num_rows($result) == 0) {
             echo"aucun stagiere trouver ,desole!";
            }
             while($row=mysqli_fetch_assoc($result)){?>
   
   
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['nom']?></td>
         <td><?=$row['prenom']?></td>
          <td><?=$row['age']?></td>
          <!--nous allons mettre l id de chaque employe dans se lien-->
          <td><a href="modifier.php?id=<?=$row['id']?>">modifier</a></td>
            <td><a href="supprimer.php?id=<?=$row['id']?>">supprimer</a></td>
    </tr>
    <?php
}

 ?> 
        </table>
    </div>
    
</body>

</html>