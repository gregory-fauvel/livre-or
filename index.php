
<html>
<head>
	<link rel="stylesheet" type="text/css" href="module.css">
	<title>Page index</title>
</head>
<body id="bodyindex">
	<header>
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
	</header>
	
	<h1 id="titreindex">Bienvenue dans le site  de  la peur </h1>
<section id="videotheque">
	<section class="video2">
		<div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/AmEpPJ1MKP8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
		<div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/j2lDyh_C6ic" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
	</section>
<section class="video2">
	<div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/wqts5qBX8ZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
	<div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/OuqHdlQ7DBM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
	</section>
</section>
	
</body>
</html>