<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="shortcut icon" href="img/fonctionnel/logo_1.ico" type="image/x-icon">
</head>

<body>

    <?php include('php/header.php') ?>

    <div id="gradient-bas"> </div> <!--div utile pour le gradient-->

    <main>

        <!-- ---------------------BackGround Video-------------------------  -->

        <video id="background-video" autoplay loop muted>
            <source src="img/index/video_index.mp4" type="video/mp4" />
        </video>

        <div id="p">
            <p>il ya bien longtemps dans une galaxie lointaine, très lointaine</p>
        </div>

        <div id="gradient-haut"> </div> <!--div utile pour le gradient-->

        <div class="video_hidden">

            <!-- ---------------------Block News-------------------------  -->
            <div id="news">
                <h4>actualité Star Wars : </h4>

                <div class="news_content">
                    <h5 class="News_Tilte"> Disney annonce un nouveau film Star Wars </h5>
                    <p class="News_Text">Lors de la Star Wars Celebration qui s'est déroulée en avril dernier, la présidente de Lucasfilm, Kathleen Kennedy, a fait le point sur les projets officiels prévus pour le cinéma. Le premier sera centré sur Rey, l'héroïne de la dernière trilogie Star Wars, incarnée par Daisy Ridley. La date de sortie est fixée au 20 mai 2026</p>
                    <img class="News_img" src="img/index/news_1.jpg" alt="image d'illustration" />
                    <a class="News_info" href="https://www.allocine.fr/article/fichearticle_gen_carticle=1000050211.html" target="_blank">Plus d'information</a>
                </div>

                <div class="news_content">
                    <h2 class="News_Tilte"> Star Wars OutLaws : Un nouveau jeu Ubisoft </h2>
                    <p class="News_Text"> Lors de l'évenement nommé : "Ubisoft Forward 2023" un nouveau jeu développé par Ubisoft a était annoncé : Star Wars Outlaw. Le jeu semble extrêmement ambitieux, au programme : exploration, infiltration et action. Une superbe aventure aussi bien dans l'espace que sur de nombreuse planètes différente. Date de sortie : 2024 ' </p>
                    <img class="News_img" src="img/index/news_2.jpg" alt="image d'illustration" />
                    <a class="News_info" href="https://www.gamekult.com/actualite/star-wars-outlaws-ubisoft-livre-une-bande-annonce-de-gameplay-pour-son-open-world-3050855896.html" target="_blank">Plus d'information</a>
                </div>

            </div>

            <!-- ---------------------Contenu-------------------------  -->

            <div id="Contenu">
                <h4>Présentation de Star Wars : </h4>
                <p>
                    Star Wars, créé par George Lucas, est une épopée de science-fiction qui ce déroule dans galaxie diversifiée, riche en planètes variées, espèces extraterrestres et cultures distinctes. L'équilibre de la Force, une énergie mystique, est au cœur de cet univers, et ceux qui peuvent la manipuler sont les Jedi et les Sith, des individus très spéciaux doté de capacité extra-ordinaire. L'histoire principale explore la lutte entre les forces du bien représenter par les jedi et les forces du mal mené par les sith. Star Wars couvre une vaste gamme de média, tels que les films, séries télévisées, romans, bandes dessinées, jeux vidéo et de nombreux produits dérivés sont disponnible comme par exemple de nombreux modèle lego sont disponible pour l'univers de Star Wars.
                </p>
            </div>

            <!-- ---------------------SideBar-------------------------  -->

            <div id="sidebar">
                <h3>La chronologie : </h3>

                <!-- ---------------------Postlogie-------------------------  -->


                <div class="chrono">
                    <img src="img/films/film_1.jpg" alt="Affiche"/>
                    <a href="php/page_pre.php#epI">Star Wars, La menace fantôme</a>
                </div>

                <div class="chrono">
                    <img src="img/films/film_2.jpg" alt="Affiche"/>
                    <a href="php/page_pre.php#epII">Star Wars, L'Attaque des clones</a>
                </div>

                <div class="chrono">
                    <img src="img/films/film_3.jpg" alt="Affiche"/>
                    <a href="php/page_pre.php#epIII">Star Wars, La Revanche des Sith</a>
                </div>


                <!-- ---------------------Trilogie-------------------------  -->


                <div class="chrono">
                    <img src="img/films/film_4.jpg" alt="Affiche"/>
                    <a href="php/page_tri.php#epI">Star Wars, Un nouvel espoir</a>
                </div>

                <div class="chrono">
                    <img src="img/films/film_5.jpg" alt="Affiche"/>
                    <a href="php/page_tri.php#epII">Star Wars, L'Empire contre-attaque</a>
                </div>

                <div class="chrono">
                    <img src="img/films/film_6.jpg" alt="Affiche"/>
                    <a href="php/page_tri.php#epIII">Star Wars, Le Retour du Jedi</a>
                </div>


                <!-- ---------------------PostLogie-------------------------  -->


                <div class="chrono">
                    <img src="img/films/film_7.jpg" alt="Affiche"/>
                    <a href="php/page_post.php#epI">Star Wars, Le réveil de la Force</a>
                </div>

                <div class="chrono">
                    <img src="img/films/film_8.jpg" alt="Affiche"/>
                    <a href="php/page_post.php#epII">Star Wars, Les Dernier Jedi</a>
                </div>

                <div class="chrono">
                    <img src="img/films/film_9.jpg" alt="Affiche"/>
                    <a href="html/page_post.php#epIII">Star Wars, L'ascension de Skywalker</a>
                </div>

            </div>
        </div>

        <div id="gradient-bas"> </div> <!--div utile pour le gradient-->

        <!-- ----------------------Photo-Box------------------------  -->

        <div id="Faulcon-Wiki">

            <div class="img-container">
                <img class="slide-img" src="img/index/faucon-millenium.jpg">
            </div>

            <div class="text-container">
                <h4>Le Faulcon millenium : une légende </h4>
                <a class="News_info" href="https://starwars.fandom.com/fr/wiki/Faucon_Millenium" target="_blank">découvrir son histoire</a>
            </div>

        </div>

    </main>

    <?php include('php/contactbull.php') ?>
    <?php include('php/footer.php') ?>

</body>
</html>