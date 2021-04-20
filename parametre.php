<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Acceuil</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/parametre.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
    <script src="js/parametre.js"></script>
  </head>
  <body>
    <?php
      session_start();
      require 'fonctions/users.php';
      require 'fonctions/usersmanager.php';
      require 'fonctions/BDD.php';
    ?>
    <div class="navbar" id="navbar">
      <a href="index.php" class="select">BiblioTech<span class="dot">.</span>™</a>
      <a href="livre.php" class="select">Livres</a>
      <a href="#films" class="select">Films</a>
      <a href="#jeux" class="select">Jeux</a>
      <div class="topBTN">
        <?php
          if(!$_SESSION['connect']) { echo "<a href=\"connexion.php\"><button type=\"button\" name=\"connect\" class=\"connectBTN\">Se connecter</button></a>
                                            <a href=\"inscription.php\"><button type=\"button\" name=\"connect\" class=\"inscrireBTN\">S'inscrire</button></a>";}
          elseif($_SESSION['connect']) { echo "<a href=\"profil.php\"><button type=\"button\" name=\"connect\" class=\"profilBTN\">Profil</button></a>
                                               <a href=\"fonctions/deco.php\" class=\"door\"><img src=\"ressources/images/door.png\" alt=\"déco\" width=\"20px\" onMouseOver=\"this.src='ressources/images/door2.png'\" onmouseout=\"this.src='ressources/images/door.png'\"/></a>"; }
        ?>
      </div>
      <a href="connexion.php"><img src="ressources/images/6.png" class="icon2" alt="profile"></a>
      <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
    </div>
    <br><br>
    <div class="global">
      <!-- <div class="avatar" style="background-image: url('ressources/images/avatar/<?php// echo $_SESSION['avatar']; ?>.png');"></div> -->
      <form method="post" enctype="multipart/form-data" class="formImage">
        <input type="file" name="avatar" id="avatar" class="inputfile" />
        <label for="avatar">Changer mon image</label>
        <br>
        <input type="submit" name="submit_image" value="Télécharger"><br>
      </form>
      <br>
      <form method="post" class="formPseudo">
        <label for="newpseudo">Pseudo</label>
        <br>
        <input type="text" name="newpseudo" value="<?php echo $_SESSION['avatar']; ?>">
        <input type="submit" name="submit_pseudo" value="Changer"><br>
      </form>
      <br>
      <form method="post" class="formMdp">
        <label for="mdp1">Modifier votre mot de passe :</label>
        <br>
        <input type="password" name="mdp1" placeholder="Nouveau mot de passe">
        <input type="password" name="mdp2" placeholder="Histoire d'être sûr !">
        <input type="submit" name="submit_password" value="Modifier">
      </form>
      <br><hr><br>
      <div>
        <label for="submit_delete">Supprimer mon profil</label>
        <input type="submit" name="submit_delete" value="Supprimer" onclick="confirmer()"><br>
      </div>
      <div class="fullpage">
        <form method="post" class="confirmation">
          <p>Etes-vous sûr de vouloir supprimer votre profil?</p>
          <input type="submit" name="oui" value="Oui">
          <input type="submit" name="non" value="Non">
        </form>
      </div>
      <?php if(isset($_POST['submit_image'])){$avatarManager = new UsersManager($bdd);$avatarManager ->Addavatar();} ?>
      <?php if(isset($_POST['submit_pseudo'])){$pseudo = new Users($_POST['newpseudo'],"empty","empty");$pseudoManager = new UsersManager($bdd);$pseudoManager->Changerpseudo($pseudo);} ?>
      <?php if(isset($_POST['submit_password']))
            {
              if ($_POST['mdp1'] == $_POST['mdp2'])
              {
                $mdp = new Users("empty","empty",sha1($_POST["mdp1"]));
                $mdpManager = new UsersManager($bdd);
                $mdpManager ->Changerpassword($mdp);
              }
            }
      ?>
      <?php
        if(isset($_POST['oui']))
        {
          $deleteManager = new UsersManager($bdd);
          $deleteManager ->delete();
        }
        elseif(isset($_POST['non']))
        {
          echo "Vous avez bien raison !";
        }
      ?>
    </div>
    <?php include 'footer.php' ?>

  </body>
</html>
