<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">

</head>
        <meta sharset="utf-8">
        <link rel="stylesheet" href= "profil.css">
<?php
session_start();
if (isset ($_SESSION['login'])){
$connexion = mysqli_connect("localhost","root","","livreor");
$requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
$req = mysqli_query($connexion, $requete);
$data = mysqli_fetch_assoc($req);


?>

    <head>
        <title>moduleconnexion</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href= "profil.css">
    </head>

        <?php
    if ($_SESSION['login'] == true)
    {
    include 'barnavco.php';
}
    else
    {
        include 'barnav.php';
    }
    ?>

 <body class="style1">
    <img src="eclair.png" id="eclair2">
    <img src="eclair.png" id="eclair3">
    <img src="eclair.png" id="eclair4">
    <img id="bule" src="bule.png">

    <h1 id="dalle">IL ME MANQUE DES ÂMES <?php echo $_SESSION['login']?></h1>
    <h1 id="dalle2">Meme si tu change de<br> pseudo je te retrouverais</h1>

<div class="titreprofil">
  <h1 id="h1">Modifiez votre profil</h1><br>
</div>


                <div id="profilform">

                    <form method="POST" action="profil.php">

                        <label>nouveau mot de passe:</label>
                        <input type="password" value="<?php echo $data['password']?>" placeholder="nouveau mot de passe" name="mdp"></input><br><br/>

                        <label>nouveaux login</label>
                        <input type="text" value="<?php echo $data['login']?>" placeholder="Nouvel identifiant" name="login"></input><br><br/>

                     

                        <input id="butprof" type="submit" name="Modifier" value ="Valider">

                    </form><br>

                </div>
<?php

if (isset($_POST['Modifier']))
{

    $login = $_POST['login'];
    $passe = $_POST['mdp'];

    $requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe' WHERE login = '".$_SESSION['login']."'"; 
    $query2=mysqli_query($connexion,$requete2);
    // $query= mysqli_query($connexion,$requete2);

    echo "modification effectuer";
}
?>
</body>
<?php
}
else {
    ?>
    <body class="style2">
         <?php
    echo "<p id=\"pprofil \">Pour acceder a la page il vous faut vous connecter!!</p> ";
    ?>
    <form id="profil-deco" action="index.php">
        <input type="submit" name="bouton">
    </body>
       
<?php

}
?>

</html>


