<?php
session_start();
$connexion = mysqli_connect("localhost","root","","livreor");
if ( isset ($_POST['commenter'])){
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
	<title>Page connexion</title>
</head>
<body>
<?php
if (isset($_SESSION['login'])==true){
?>
	<form action="commentaire.php" method="post">

    <div>
        <br><label for="msg"> Poster votre message :</label></br>
        <textarea id="msg" name="message"></textarea>
        <input type="submit" name="commenter">
    </div>
</form>
<?php
}
?>

</body>
</html>