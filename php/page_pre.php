<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/trilogie.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>
        
    <?php include('header.php') ?>

        <main>
            <div id="Titre">
                <h1>Prélogie</h1>
                <p>Épisode I, II, III</p>
            </div>

            <div id="epI">
                <h2>Star Wars, épisode I : La Menace fantôme</h2>
                <div>
                    <img src="../img/films/film_1.jpg" alt="affiche film 1">
                </div>
                <div>
                    <dl>
                        <dt>Titre original:</dt>
                        <dd>Star Wars: Episode I – The Phantom Menace</dd>
                        <dt>Réalisation:</dt>
                        <dd>George Lucas</dd>
                        <dt>Scénario:</dt>
                        <dd>George Lucas</dd>
                        <dt>Musique:</dt>
                        <dd>John Williams</dd>
                        <dt>Sociétés de production:</dt>
                        <dd>Lucasfilm Ltd</dd>
                        <dt>Genre:</dt>
                        <dd>Science-fiction</dd>
                        <dt>Durée:</dt>
                        <dd>136 minutes</dd>
                        <dt>Sortie:</dt>
                        <dd>1999</dd>
                    </dl>
                </div>
                <div>
                    <h3>Synopsis</h3>
                    "Star Wars, épisode I : La Menace fantôme" se déroule des décennies avant les événements de la trilogie originale. La République galactique est en proie à des tensions politiques et à des conflits. La planète Naboo est menacée par le blocus de la Fédération du Commerce, dirigée secrètement par Dark Sidious, alias l'empereur Palpatine.
                    Deux chevaliers Jedi, Qui-Gon Jinn et Obi-Wan Kenobi, sont envoyés pour négocier la paix. Ils rencontrent la jeune reine Padmé Amidala de Naboo, et ensemble, ils tentent de s'échapper de la planète assiégée. Pendant leur fuite, ils atterrissent sur la planète déserte de Tatooine, où ils rencontrent un jeune esclave nommé Anakin Skywalker. Ils découvrent que Anakin possède une grande affinité avec la Force.
                    Convaincus que Anakin est destiné à de grandes choses, Qui-Gon et Obi-Wan l'emmènent avec eux pour le former en tant que Jedi. Cependant, leur chemin est semé d'embûches. Ils affrontent Dark Sidious et son apprenti, Dark Maul, dans des combats au sabre laser.
                    La course de modules sur Tatooine, la découverte de l'élu de la prophétie Jedi et les manigances politiques menant à la montée du futur empereur Palpatine sont des éléments clés de ce premier épisode de la saga "Star Wars". La Menace fantôme pose les fondations de l'ascension d'Anakin Skywalker vers son destin tragique en tant que Dark Vador, le seigneur Sith.
                </div>
            </div>

            <?php 

            if (isset($_SESSION["name"])){//on affiche le reste de la page uniquement pour les personnes connecté
                ?>

            <div id="epII">
                <h2>Star Wars, épisode II : L'Attaque des clones</h2>
                <div>
                    <img src="../img/films/film_2.jpg" alt="affiche film 2">
                </div>
                <div>
                    <dl>
                        <dt>Titre original:</dt>
                        <dd>Star Wars: Episode II – Attack of the Clones</dd>
                        <dt>Réalisation:</dt>
                        <dd>George Lucas</dd>
                        <dt>Scénario:</dt>
                        <dd>George Lucas</dd>
                        <dd>Jonathan Hales</dd>
                        <dt>Musique:</dt>
                        <dd>John Williams</dd>
                        <dt>Sociétés de production:</dt>
                        <dd>Lucasfilm Ltd</dd>
                        <dt>Genre:</dt>
                        <dd>Science-fiction</dd>
                        <dt>Durée:</dt>
                        <dd>142 minutes</dd>
                        <dt>Sortie:</dt>
                        <dd>2002</dd>
                    </dl>
                </div>
                <div>
                    <h3>Synopsis</h3>
                    "Star Wars, épisode II : L'Attaque des clones" se déroule dix ans après les événements du premier épisode. La République galactique est en pleine crise, menacée par des séparatistes menés par le comte Dooku, ancien Jedi devenu Sith. Des assassinats et des troubles agitent la galaxie, alimentant les tensions entre la République et la Confédération des systèmes indépendants.
                    Padmé Amidala, désormais sénatrice, échappe de justesse à un attentat. Pour assurer sa protection, le Jedi Obi-Wan Kenobi et son apprenti Anakin Skywalker sont assignés pour veiller sur elle. Une attirance grandissante se développe entre Anakin et Padmé malgré les interdictions des Jedi.
                    Obi-Wan mène une enquête pour découvrir les responsables des attaques, le conduisant sur différentes planètes où il découvre l'existence d'une armée de clones secrète financée par un mystérieux instructeur Jedi, Jango Fett.
                    Anakin, quant à lui, tombe de plus en plus sous l'influence sombre de ses émotions et de ses peurs. Il se lance dans une mission personnelle pour protéger Padmé, ce qui le met en conflit avec les principes stricts des Jedi.
                    La galaxie est plongée dans la guerre lorsque la bataille éclate entre les forces des clones et les séparatistes. Obi-Wan affronte Dooku, tandis qu'Anakin et Padmé sont capturés. Un duel épique s'ensuit entre les Jedi et les Sith, où Anakin montre des signes de pouvoir et de colère menaçants.
                    L'épisode se termine avec la galaxie précipitée vers des événements qui mèneront à la montée de l'Empire et à la tragédie personnelle d'Anakin Skywalker, jetant les bases pour la suite de la saga.
                </div>
            </div>

            <div id="epIII">
                <h2>Star Wars, épisode III : La Revanche des Sith</h2>
                <div>
                    <img src="../img/films/film_3.jpg" alt="affiche film 3">
                </div>
                <div>
                    <dl>
                        <dt>Titre original:</dt>
                        <dd>Star Wars: Episode III – Revenge of the Sith</dd>
                        <dt>Réalisation:</dt>
                        <dd>George Lucas</dd>
                        <dt>Scénario:</dt>
                        <dd>George Lucas</dd>
                        <dt>Musique:</dt>
                        <dd>John Williams</dd>
                        <dt>Sociétés de production:</dt>
                        <dd>Lucasfilm Ltd</dd>
                        <dt>Genre:</dt>
                        <dd>Science-fiction</dd>
                        <dt>Durée:</dt>
                        <dd>140 minutes</dd>
                        <dt>Sortie:</dt>
                        <dd>2005</dd>
                    </dl>
                </div>
                <div>
                    <h3>Synopsis</h3>
                    "Star Wars, épisode III : La Revanche des Sith" se déroule alors que la guerre entre la République galactique et la Confédération des systèmes indépendants fait rage. Les Jedi, menés par Obi-Wan Kenobi et Anakin Skywalker, sont de plus en plus impliqués dans le conflit.
                    Anakin est tourmenté par des visions de la mort de sa femme enceinte, Padmé Amidala. L'ancien Jedi, maintenant devenu seigneur Sith connu sous le nom de Dark Sidious, manœuvre habilement pour manipuler Anakin vers le côté obscur de la Force.
                    Pendant ce temps, la relation entre Anakin et Obi-Wan est mise à l'épreuve alors que des tensions croissantes se développent entre eux. Anakin se sent frustré par les restrictions imposées par les Jedi et se tourne de plus en plus vers l'obscurité pour obtenir le pouvoir de sauver Padmé.
                    Lorsque la trahison de Dark Sidious est révélée, une série d'événements se déclenche, menant à une confrontation spectaculaire entre Anakin et Obi-Wan. Le duel se déroule sur la planète volcanique de Mustafar, où Anakin succombe à la tentation du côté obscur et devient Dark Vador après un combat intense avec Obi-Wan.
                    Simultanément, Dark Sidious exécute son plan pour éliminer les Jedi en déclenchant l'Ordre 66, ordonnant aux clones de l'armée de massacrer les Jedi. La République devient l'Empire galactique, avec Dark Sidious se proclamant empereur.
                    Pendant ce temps, Padmé, dévastée par la chute d'Anakin, meurt en donnant naissance à des jumeaux : Luke Skywalker et Leia Organa. La galaxie est plongée dans les ténèbres, marquant la montée de l'Empire et le début d'une ère sombre.
                </div>
            </div>
            <?php }

                else {
                ?>
                    <div id="contenu">
                        <h3 id="connh3"> La suite de ce contenu est reservé aux personnes connecté, vous pouvez vous identifier ou créer un compte : </h3>
                        <a id="connlink" href="page_connexion.php">Connexion</a>
                    </div>
                <?php } ?>
        </main>

        <?php include('contactbull.php') ?>
        <?php include('footer.php') ?>

    </body>
</html>

