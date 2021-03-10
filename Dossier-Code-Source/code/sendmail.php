
<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

// 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  // Captcha verification
  if(empty($_POST['recaptcha-response'])){
    header('Location: contact.php');
  }else{

    // INITIALISATION VERIFICATION URL AND CATPTCHA RESPONSE 
    $secretKey = "6Lex4EYaAAAAAEQRc7Zhz6jRsRakONcYeR6m2GGq";
    $reCaptchaResponse = $_POST['recaptcha-response'] ;

    $url = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$reCaptchaResponse}";


    // CHECK IF CURL EXIST 
    if(function_exists('curl_version')){
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_TIMEOUT, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//Si SSL fonctione pas 
      $urlResponse = curl_exec($curl);
    }else{
      // USING file_get_content if curl dont exist
      $urlResponse = file_get_contents($url);
    };

    //Verify urlResponsse
    if(empty($urlResponse) || is_null($urlResponse)){
      header('Location: contact.php');
    }else{
      // decode json urlresponse 

      

      $data = json_decode($urlResponse);

      // echo "<pre>";
      // var_dump($urlResponse);
      // var_dump($data->success);
      // echo "</pre>";
      
      if($data->success){
        
        if
        (
          isset($_POST['name']) && !empty($_POST['name']) &&
          isset($_POST['email']) && !empty($_POST['email']) &&
          isset($_POST['postal']) && !empty($_POST['postal']) &&
          isset($_POST['city']) && !empty($_POST['city']) &&
          isset($_POST['objets']) && !empty($_POST['objets']) &&
          isset($_POST['message']) && !empty($_POST['message'])
        ){
          // We Clean the content
          $regex ="/^[a-zA-Z\s]+$/";
          $regexMail ="/^[a-zA-Z\d\._-]+@[a-zA-Z\d\._-]+\.[a-zA-Z\d\.]+$/";
          $regexPostal ="/^[\d]+$/";
          $regexMessage ="/^[a-zA-Z\/()_?!:.,'\d\s-]+$/";
      
      
      
          if(preg_match($regex, ($_POST['name'])) && strlen(($_POST['name'])) < 20){
              $name = strip_tags($_POST['name']);
          }else{
          $error1 = '<div class="alert-error mb-5">
                      <span>Erreur ! Prénom invalide. Maximum 20 caractère</span>
                    </div>';
          };
      
      
          if(preg_match($regexMail, ($_POST['email'])) && strlen(($_POST['email'])) < 40){
            $email = strip_tags($_POST['email']);
          }else{
          $error2 = '<div class="alert-error mb-5">
                      <span>Erreur ! Email invalide exemple: exemple@gmail.com. Maximum 40 caractères </span>
                    </div>';
          };
      
      
          if(preg_match($regexPostal, ($_POST['postal'])) && strlen(($_POST['postal'])) < 10){
            $postal = strip_tags($_POST['postal']);
          }else{
          $error2 = '<div class="alert-error mb-5">
                      <span>Erreur ! Code postal invalide. Maximum 10 caractères. Exemple: 75000. </span>
                    </div>';
          };
      
          if(preg_match($regex, ($_POST['city'])) && strlen(($_POST['city'])) < 20 ){
            $city = strip_tags($_POST['city']);
          }else{
          $error3 = '<div class="alert-error mb-5">
                      <span>Erreur ! Nom de ville invalide. Maximum 20 caractères. Exemple: Paris.</span>
                    </div>';
          };
      
          if(preg_match($regexMessage, ($_POST['objets'])) && strlen(($_POST['objets'])) < 40) {
            $objets = strip_tags($_POST['objets']);
          }else{
          $error4 = '<div class="alert-error mb-5">
                      <span>Erreur ! Objet invalide. Maximum 40 caractères. Exemple: Contract permis auto.</span>
                    </div>';
          };
      
          if(preg_match($regexMessage, ($_POST['message'])) && strlen(($_POST['message'])) < 1500) {
            $message = htmlspecialchars($_POST['message']);
          }else{
          $error5 = '<div class="alert-error mb-5">
                      <span>Erreur ! Message invalide. Utiliser seulement a->Z 0->9 ()_?!:.,\'. Maximum 1500 caractères  </span>
                    </div>';
          };
      
          // echo($name ." , ". $email ." , ". $postal ." , ". $city ." , ". $objets ." , ". $message);
      
        }else{
          $error6 = '<div class="alert-error mb-5">
                      <span>Erreur ! Un champ est vide.</span>
                    </div>';
        };
      }else{
        header('Location: contact.php');
      };
      
      
      if
      (
        isset($_POST['submit']) &&
        isset($name) &&
        isset($email) &&
        isset($postal) &&
        isset($city) &&
        isset($objets) &&
        isset($message)
      ){
        try{
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'montlhery.autoecole.narbonne@gmail.com'; // Gmail address which you want to use as SMTP server
          $mail->Password = 'Montlhery1234'; // Gmail address Password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = '587';
      
          $mail->setFrom('montlhery.autoecole.narbonne@gmail.com'); // Gmail address which you used as SMTP server
          $mail->addAddress('montlhery.autoecole.narbonne@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
      
          $mail->isHTML(true);
          $mail->Subject = 'Message Received (Contact Page)';
          $mail->Body = "<h2>Prenom: $name </h2> <h3> Email: $email<br /> Ville : $postal, $city  <br /> <br />Objets : $objets <br /><br />  Message : </h3> <p>$message </p>";
      
          $mail->send();
          $alert = '<div class="alert-success mb-5">
                      <span>Message envoyé ! Merci de nous avoir contacté</span>
                    </div>';
        } catch (Exception $e){
          $alert = '<div class="alert-error mb-5">
                      <span>'.$e->getMessage().'</span>
                    </div>';
        };

      };

    };
    
  };

}
?>

