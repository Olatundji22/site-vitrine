<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['Submit'])) {
    $txtName = htmlspecialchars($_POST['Name']);
    $txtEmail = htmlspecialchars($_POST['Email']);
    $txtPhone = htmlspecialchars($_POST['Phone']);
    $txtMsg = htmlspecialchars($_POST['Msg']);

    $contenu = "<h3>Nom : $txtName<br>Email: $txtEmail<br>Telephone: $txtPhone<br>Message: $txtMsg</h3>";

    try{
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail-> Username = 'mon@gmail.com';/**adresse gmail**/
      $mail->Password = 'mot de passe gmail';/**mot de passe gmail**/
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = '587';

      $mail->setFrom('mon@gmail.com');/**adresse gmail**/
      $mail->addAddress('mon@gmail.com');/**adresse gmail**/

      $mail->isHTML(true);
      $mail->Subject = 'Message depuis la page de contact du site credits';
      $mail->Body = $contenu;

      $mail->send();
      $alert = '<div class="alert-success">
                  <span>Message envoyer avec succès! Merci de nous avoir contacter</span>
                </div>';
    }catch(Exception $e){
      $alert = '<div class="alert-error">
                  <span>$e->'.$e->getMessage().'</span>
                </div>';
    }
}
    
?>

<!DOCTYPE html>
<html lang="en" class="contact">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUNITEDCREDIT</title>

    <!--css-->
  <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<?php echo $alert; ?>
<body class="contact">
  <nav class="navbar navbar-expand-lg navbar-light bg-white" >
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><img src="img/logo1.png" alt="..."></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.html"><i class="bi bi-house-fill"></i> ACCUEIL</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              NOS SERVICES</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="service.html">Prêt Personnel</a></li>
              <li><a class="dropdown-item" href="service.html">Prêt Immobilier</a></li>
              <li><a class="dropdown-item" href="service.html">Prêt Automobile</a></li>
              <li><a class="dropdown-item" href="service.html">Rachat de Credits</a></li>
              <li><a class="dropdown-item" href="service.html">Prêt Scolaire</a></li>
              <li><a class="dropdown-item" href="service.html">Crédit Renouvelable</a></li>
              <li><a class="dropdown-item" href="service.html">Investissement</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="demande.php">DEMANDER UN CREDITS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="condition.html">NOS CONDITIONS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.php"><i class="bi bi-envelope-fill"></i> CONTACT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>


    <div class="container contact-form">
      <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
      </div>
      <form method="post">
        <h3>Contactez-nous</h3>
        <center><p>Vous souhaitez en savoir plus ? N'hésitez pas à nous contacter</p></center>
        <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="Name" class="form-control" placeholder="Nom et prénom *" value="" required/>
                </div>
                <div class="form-group">
                  <input type="email" name="Email" class="form-control" placeholder="Email *" value="" required/>
                </div>
                <div class="form-group">
                  <input type="text" name="Phone" class="form-control" placeholder="Tel *" value="" required/>
                </div>
                <div class="form-group">
                  <input type="submit" name="Submit" class="btnContact" value="Envoyer message" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea name="Msg" class="form-control" placeholder="Votre message *" style="width: 100%; height: 150px;" required></textarea>
                </div>
              </div>
        </div>
      </form>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>YOUNITEDCREDIT</h6>
            <p class="text-justify"> Avec Nos Engagements, nous nous engageons envers nos clients tout 
              au long de notre relation : de la souscription au remboursement de votre credit, 
              en passant par vos éventuels changements de vie. Laissez-vous guider sur notre site Internet 
              et souscrivez en quelques clics un credit renouvelable , auto ou tout autre produit, 
              qui saura répondre à vos attentes.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <br>
            <p>Un service fiable <br>
              Un processus transparent <br>
              Des mises à jour régulières de la qualité des services proposés <br>
              <a href="tel:+33 0622222222"><i class="bi bi-telephone-fill"></i> +33 0622222222</a> <br>
              <a href="mailto:younitedcredit@contact.com "><i class="bi bi-envelope-fill"></i> younitedcredit@contact.com</a> <br>
            </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>ATTENTION !!!</h6>
            <p>
              Un crédit vous engage et doit être remboursé. 
              Vérifiez vos capacités de remboursement avant de vous engager. 
            </p>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">YOUNITEDCREDIT &copy; 2017 Tous droits réservés | 
              Mentions légales.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="bi bi-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="bi bi-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="bi bi-instagram"></i></a></li>
              <li><a class="linkedin" href="#"><i class="bi bi-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/text.js"></script>
</body>
</html>