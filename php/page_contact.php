<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
  
    <?php include('header.php') ?>

    <div class="conteneur">
        <main id="contact">

            <!-- ---------------------Contact-------------------------  -->
            <p class="ee"> </p>
            <p class="ef"> </p>
            <h2>CONTACTEZ NOUS</h2>
            <!-- ---------------------Telephone-------------------------  -->
            <aside class="telephone">
                <p>Par téléphone ?</p>
                <p>Appelez nous au : </p>
                <a href="tel:+33 1 33 33 33 33">+33 1 33 33 33 33</a>
            </aside>
            <!-- ---------------------Mail-------------------------  -->
            <aside class="mail">
                <p>Par mail ?</p>
                <p>envoyer un mail au : </p>
                <a href="mailto:contact@projet.web">contact@projet.web</a>
            </aside>
            <!-- ---------------------Place-------------------------  -->
            <aside class="place">
                <p>Sur place ?</p>
                <p>
                    ISEN Lille - Institut Supérieur<br>
                    de Electronique et du Numérique<br>
                    41 boulevard Vauban <br>
                    59800 Lille Cedex
                </p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2530.6184678248537!2d3.0487603999999875!3d50.634204099999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d578da129f7d%3A0xd134d73fb7f4c699!2sJunia%20ISEN%20Lille!5e0!3m2!1sfr!2sfr!4v1695118276896!5m2!1sfr!2sfr"></iframe>
            </aside>
        </main>
    </div>

    <?php include('contactbull.php') ?>
    <?php include('footer.php') ?>

</body>
</html>

