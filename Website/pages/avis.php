<!DOCTYPE html>
<html lang="fr">

<?php include('../core/upload_avis.php'); ?>

<head>
  <meta charset="utf-8" />
  <title>Avis et Contact</title>
  <link rel="stylesheet" href="../css/avis.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="../js/defilementAvis.js"></script>
</head>

<?php include "./header.php" ?>

<body onload="defilement_auto()">

  <?php include('../core/affichage_avis.php'); ?>


  <div class="container">
    <div class="contact-info">
      <img src="../img/AvisEtContact/logo-adresse.png" alt="Logo adresse"
        style="width:50px; height:55px; margin-top: 20px;">
      <h3>Adresse</h3>
      <p style="margin-bottom: 15px; text-align:center;">Chemin des Logis de Beaulieu, Soucelles, 49140, Rives du Loire
        en Anjou</p>
    </div>
    <div class="contact-info">
      <img src="../img/AvisEtContact/logo-telephone.png" alt="Logo téléphone"
        style="width:50px; height:50px; margin-top: 25px;">
      <h3>Téléphone</h3>
      <p>07 84 14 66 59</p>
    </div>
    <div class="contact-info">
      <img src="../img/AvisEtContact/logo-mail.png" alt="Logo email"
        style="width:50px; height:50px; margin-top: 20px; margin-bottom: 5px;">
      <h3>Email</h3>
      <p>hugo.blois@reseau.eseo.fr</p>
    </div>
    <div class="contact-info">
      <img src="../img/AvisEtContact/logo-pouce.png" alt="Logo réseaux sociaux"
        style="width:60px; height:60px; margin-top: 15px; margin-bottom: 0px;">
      <h3>Réseaux Sociaux</h3>
      <p style="display: flex;">
        <a href="https://www.facebook.com/Les-Logis-de-Beaulieu-929752433837612"><i class="icon ion-social-facebook"
            style="margin-right: 10px; font-size: 23px;"></i></a>
        <a href="https://www.instagram.com/leslogisdebeaulieu/"><i class="icon ion-social-instagram"
            style="margin-right: 10px; font-size: 23px;"></i></a>
        <a href="#"><i class="icon ion-social-twitter" style="font-size: 23px"></i></a>
      </p>
    </div>
  </div>

  <div class="map" id="mapid">
    <script src="../js/mapAvis.js"></script>
  </div>

  <div class="formulaire" id="formulaire">
    <div class="titreForm">
      <h1>Soyez le prochain à témoigner</h1>
    </div>
    <form method="post">
      <div style="text-align: center">
        <div style="display: flex;">
          <div style="width: 50%">
            <label class="titreInput" for="prenom">Prénom* :</label>
            <input type="text" id="prenom" name="prenom" style="width: 70%;">
          </div>
          <div style="width: 50%">
            <label class="titreInput" for="nom">Nom* :</label>
            <input type="text" id="nom" name="nom" style="width: 70%;">
          </div>
        </div>
        <div>
          <label class="titreInput" for="email">Adresse mail* :</label>
          <input type="email" id="email" name="email" style="width: 85%;">
        </div>
        <div>
          <label class="titreInput" for="message">Message* :</label>
          <textarea id="message" name="message" rows="5" cols="30" style="width: 85%"></textarea>
        </div>
        <div style="margin-top: 5px">Note* :</div>
        <div style="margin-top: 5px;">
          <div class="rate" id="rate">
            <input type="radio" id="star5" name="rate" value="5"/>
            <label for="star5" title="text" href="#rate">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" onclick="goToSectionAfterRefresh('formulaire')" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3"/>
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2"/>
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1"/>
            <label for="star1" title="text">1 star</label>
          </div>
        </div>
        <input type="submit" name="avis_submit" value="Envoyer" style="margin-top: 30px;" onclick="goToSectionAfterRefresh('formulaire')">
        <?php if ($inputAvisFail) { ?>
          <div class="text_danger"><?php echo $error_input_message ?></div>
        <?php } ?>
        <?php if ($emissionAvisFail) { ?>
          <div class="text_danger"><?php echo $error_emission_message ?></div>
        <?php } ?>
        <h4 style="margin-top: 20px; font-size: 12px;">* Champs obligatoires</h4>
    </form>
  </div>
  </form>
  </div>
</body>

<?php include "./footer.php" ?>

</html>