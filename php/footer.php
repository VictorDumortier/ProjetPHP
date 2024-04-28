<!-- Footer présent sur chaque page -->

<?php

$path_suffix = "";

$path = $_SERVER['SCRIPT_FILENAME'];
if (stristr($path, 'php/')){
    $path_suffix = "../";
}

echo '<footer>
        <div id="footer_link">
            <a href="'.$path_suffix.'php/page_groupe.php">Le groupe</a>
            <a href="'.$path_suffix.'php/page_contact.php">Nous contacter</a>
            <a href="https://www.starwars.com/" target="_blank">Site Officiel</a>
        </div>
        <div id="footer_text">
            <p>Le présent site est non officiel, il a pour seul objectif de fournir une plateforme d\' information pour la communauté des fans de Star Wars. Ce site n\' est en aucun cas affilié, soutenu ou approuvé par Lucasfilm Ltd, la Walt Disney Company ou toute autre entité officielle liée à Star Wars. Tous les éléments visuels, noms, personnages et tout autre contenu relatif à Star Wars sont utilisés ici à des fins de discussion et d\'appréciation, et leur utilisation ne constitue en aucun cas une violation intentionnelle des droits d\'auteur. Un lien direct vers le site officielle est disponible ci-dessus.</p>
        </div>
        <div id="footer_img">
            <img src="'.$path_suffix.'img/fonctionnel/logo_junia.png" alt="logo de junia" />
        </div>
    </footer>';

?>

