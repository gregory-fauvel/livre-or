<html id="ar-html">
<head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="module.css" media="screen" type="text/css" />
</head>
<?php
session_start();
    if (isset($_SESSION['login']) && ($_SESSION['login'] == true))
    {
    include 'barnavco.php';
}
    else
    {
        include 'barnav.php';
    }
    ?>
<body id="ar-body2">
    <div class='spider_0'>
  <div class='eye left'></div>
  <div class='eye right'></div>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
</div>
<div class='spider_1'>
  <div class='eye left'></div>
  <div class='eye right'></div>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
</div>
<div class='spider_2'>
  <div class='eye left'></div>
  <div class='eye right'></div>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
</div>
<div class='spider_3'>
  <div class='eye left'></div>
  <div class='eye right'></div>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
</div>
<div class='spider_4'>
  <div class='eye left'></div>
  <div class='eye right'></div>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
</div>
<div class='spider_5'>
  <div class='eye left'></div>
  <div class='eye right'></div>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg left'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
  <span class='leg right'></span>
</div>

<img class='web-right' src='http://www.scandiafun.com/images/spiderweb-corner-right.png'>
<img class='web-left' src='http://www.scandiafun.com/images/spiderweb-corner-right.png'>

    <div id="container">
        <!-- zone de connexion -->

        <form id="ar-form" action="connexion.php" method="POST">
            <h1 id="ar-h1-co">Connexion</h1>

            <label class="ar-lab"><b>Login</b></label><br>
            <input class="ar-input-co" type="text" placeholder="Entrer le nom d'utilisateur" name="login" required><br>

            <label class="ar-lab"><b>Password</b></label><br>
            <input class="ar-input-co" type="text" placeholder="Entrer le mot de passe" name="password" required><br><br>

            <br>
            <br><input type="submit" id='submit' value='LOGIN' >
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        </form>
    </div>
    <div id="content">


        <!-- tester si l'utilisateur est connecté -->
        <?php



  ?>

</div>
</body>
</html>

<?php
if (!isset($_SESSION['login']))
{
    $_SESSION['login'] = '';
}

if(isset($_POST['login']) && isset($_POST['password']))
{
    // connexion à la base de données
    $connexion = mysqli_connect ("localhost", "root", "", "livreor");


    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $login = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['login']));
    $password = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['password']));

    if($login !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateurs where
        login = '".$login."' and password = '".$password."' ";
        $exec_requete = mysqli_query($connexion,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count!=0 && $_SESSION['login'] == "")
        {

            $_SESSION['login'] = $login;
            $user = $_SESSION['login'];
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }

   }
}

if(isset($_GET['deconnexion']))
{

    echo "On vous deconnecte";
    session_unset();

}

if (isset($_SESSION['login']) && $_SESSION['login'] !== '')
{
    $user = $_SESSION['login'];
    echo "<p id=\"ar-bonjour\">Bonjour $user, vous êtes connecté</p>";
    echo "<a id=\"ar-deco\" href='connexion.php?deconnexion=true'><span>Déconnexion</span></a>";
}



?>
