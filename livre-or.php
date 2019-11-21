<?php
session_start();
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="livre-or.css">
  <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
  <title>page livre d or</title>
</head>
<body id="livreor">
  <?php
      if (isset($_SESSION['login']) && ($_SESSION['login'] == true))
    {
    include 'barnavco.php';
    }
    else
    {
        include 'barnav.php';
    }
    ?>
    
    
 
  <a id="poster" href="commentaire.php">Ecrire un commentaire</a> 
    

<table id="tableau">
  <tr>
    <th id="tablecomment">Nom</th>
    <th id="tablecomment">Commentaire</th>
    <th id="tablecomment">Date</th>
  </tr>
  <?php
      $connexion = mysqli_connect("localhost","root","","livreor");
      $requete3="SELECT login, commentaire,date FROM utilisateurs LEFT JOIN commentaire ON utilisateurs.id = commentaire.id_utilisateur ORDER BY commentaire.id DESC";

      //echo "$requete3 <br>";
      
      $query3=mysqli_query($connexion, $requete3);
      while($data2 = mysqli_fetch_assoc($query3))
      {
      ?>
        <tr>
          <td class= "comment"><?php echo $data2['login']?></td>
          <td class="comment"><?php echo $data2['commentaire']?></td>
          <td class="comment"><?php echo $data2['date']?></td>
        </tr>
      <?php
      }
      ?>
</table>

</body>
</html>
