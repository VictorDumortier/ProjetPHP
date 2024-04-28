<!-- header / nav présent sur chaque page -->
<?php

//modification des chemin relatif (index.php se situe à la racine du site)
$path_suffix = "../";
$path = $_SERVER['SCRIPT_FILENAME'];
if (stristr($path, 'index.php')){
    $path_suffix = "";
}

//affichage du bouton connexion pour les personnes non connecté uniquement
if (!isset($_SESSION["id"])){
    
    echo '<header id ="unconn">';
    echo '<a id="header_connexion" href="' . $path_suffix . 'php/page_connexion.php">Se connecter</a>'; //bouton se connecter
}

//affichage bouton profil + photo de profil pour les personnes connecté
else { 
    echo '<header id="conn">';
    echo '<img id="header_pp" src="' . $path_suffix . 'img/compte/'. $_SESSION["profilePicture"].'">'; //photo de profil
    echo '<a id="header_connexion" href="' . $path_suffix . 'php/page_profil.php">Connecté : ' .$_SESSION["name"]. '</a>'; // bouton profil
}

//affichage du logo et du titre (indépendant de la connexion de l'utilisateur)
echo '<a href="' . $path_suffix . 'index.php"><img id="header_img" src="' . $path_suffix . 'img/fonctionnel/logo_2.jpg" alt="logo"></a>
      <h1 id="header_title">Super Sith</h1>
      </header>';


//affichage du nav
echo '
      <nav>
        <a href="' . $path_suffix . 'php/page_pre.php">La prélogie</a>
        <a href="' . $path_suffix . 'php/page_tri.php">La trilogie</a>
        <a href="' . $path_suffix . 'php/page_post.php">La postlogie</a>
        <a href="' . $path_suffix . 'php/page_serie.php">Les séries</a>
        <a href="' . $path_suffix . 'php/page_jv.php">Les jeux-vidéos</a>
        <a href="' . $path_suffix . 'php/page_list_forum.php">Forum et discussions</a>';
        
        if (isset($_SESSION["admin"]) && $_SESSION["admin"]) echo '<a href="' . $path_suffix . 'php/page_admin.php">Admin</a>';

      echo '</nav>';

?>