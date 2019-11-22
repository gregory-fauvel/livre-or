<?php
session_start();
date_default_timezone_set('Europe/Paris');
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
         <a id="poster" href="commentaire.php">Ecrire un commentaire ici!</a> 
    

      <table id="tableau">
                    <tr>
                      <th id="tablecomment">Nom:</th>
                      <th id="tablecomment">Commentaire:</th>
                      <th id="tablecomment">Date:</th>
                   </tr>
            <?php
                $connexion = mysqli_connect("localhost","root","","livreor");
                $requete3="SELECT login, commentaire,date FROM utilisateurs LEFT JOIN commentaire ON utilisateurs.id = commentaire.id_utilisateur ORDER BY commentaire.id DESC";
                $query3=mysqli_query($connexion, $requete3);
                $data4 = mysqli_fetch_all($query3,MYSQLI_ASSOC);
                $taille = sizeof($data4);

                  $i = 0;
                    while($i < $taille)
                  {
                    $dateold= $data4[$i]['date'];
                    $datenew = date('d/m/Y à H:i:s', strtotime($dateold));
             ?>
                    <tr>
                     <td class= "comment">Par:&nbsp;<?php echo $data4[$i]['login']?></td>
                      <td class="comment"><?php echo $data4[$i]['commentaire']?></td>
                      <td class="comment">Posté le:&nbsp;<?php echo $datenew?></td>
                    </tr>
            <?php
              $i++;
                  }
            ?>
      </table>
  </body>
</html>
