<?php
session_start();
?>

<html>
<head>
  <title>page livre d or</title>
</head>
<body>
<table>
  <tr>
    <th>Nom</th>
    <th>Commentaire</th>
    <th>Date</th>
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
          <td><?php echo $data2['login']?></td>
          <td><?php echo $data2['commentaire']?></td>
          <td><?php echo $data2['date']?></td>
        </tr>
      <?php
      }
      ?>
</table>

</body>
</html>
