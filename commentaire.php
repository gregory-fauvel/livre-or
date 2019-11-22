<?php
session_start();
date_default_timezone_set('Europe/Paris');
$connexion = mysqli_connect("localhost","root","","livreor");
if (isset($_SESSION['login'])){
  if (isset ($_POST['commenter'])){
	 $requete3="SELECT * FROM `utilisateurs` WHERE login='".$_SESSION['login']."'";
 	 $query3 = mysqli_query( $connexion,$requete3);
    $resultat3= mysqli_fetch_all($query3);
    $requete2="INSERT INTO commentaire (commentaire, id_utilisateur, date) VALUES ('".$_POST['message']."','".$resultat3[0][0]."','".date("Y-m-d H:i:s")."')";
      
  	     $query2 = mysqli_query( $connexion,$requete2);
  	     header('location: livre-or.php');
 	}

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="commentaire.css">
  <link rel="stylesheet" href="index.css" media="screen" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
	<title>Page connexion</title>
</head>
<body id="commentaire">
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
 

<?php
if (isset($_SESSION['login'])==true){
?>
<div id="formcommentaire">
	<form action="commentaire.php" method="post">
    <div>
        <br><label id="titrepost" for="msg"> Poster votre message :</label></br>
        <textarea id="msg" name="message"></textarea>
        <input id="validcomment" type="submit" name="commenter">
    </div>
</form>
</div>
<img id="sorciere" src="sorciere.png">
<?php
}
?>
<?php 
}
else
  echo "Vous n' êtes pas connecté";
 ?>

</body>
</html>