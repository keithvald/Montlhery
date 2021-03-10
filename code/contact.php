<?php include 'sendmail.php'; ?>

<!--header-->
<?php include '../includes/header-page.php'; ?>

<div class="container-fluid bg-custom-blue">
  <div class="row p-8 justify-content-center">
    <h1 class="text-white title-contact"><i class="fas fa-mail-bulk mr-4"></i>Comment nous <span class="question-contact">contacter ?</span></h1>
  </div>
</div>
<div class="container-fluid bg-custom-grey bg-custom-img">
  <div class="row p-8 justify-content-around">
    <div class="col-md-12 col-lg-4 col-xl-3 text-center">
      <div class="contact-info">
        <p class="text-center"><img src="../assets/img/illustrations/contact.png" alt="image contact telephone" class="illu"/></p>
        <p><i class="fas fa-map-marker-alt mr-3"></i>8, rue ancienne porte de beziers<br>
                                                11100 Narbonne</p>
        <p class="links-mentions"><i class="fas fa-envelope mr-3"></i>montlherynarbonne@hotmail.fr</p>
        <p><i class="fas fa-phone mr-3"></i>04.68.32.49.49</p>
        <div class="my-5">
          <p class="font-weight-bold lead"><i class="fas fa-clock mr-3"></i>Ouverture</p>
          <p><span class="font-weight-bold">Lundi au Vendredi</span><br/>
          10h à 12h et de 14h à 19h
          </p>
          <p><span class="font-weight-bold">Samedi</span><br/>
          10h à 12h et de 14h à 18h</p>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-8 col-xl-6 text-center">
      <h2 class="contact mb-5">Envoyer un mail</h2>
      <!--contact section start-->

      <!--alert messages start-->
      <?php
       echo $alert;
       echo $error1;
       echo $error2;
       echo $error3;
       echo $error4;
       echo $error5;
       echo $error6;
       ?>
      <!--alert messages end-->
      <div class="contact-section">
        <div class="contact-form">
          <form class="contact" action="" method="POST">
            <input
              type="text"
              name="name"
              class="text-box"
              placeholder="Prénom*"
              maxlength="20"
              required
            />
            <input
              type="email"
              name="email"
              class="text-box"
              placeholder="Email*"
              maxlength="40"
              required
            />
            <input
              type="number"
              name="postal"
              class="text-box"
              placeholder="Code postal*"
              required
              maxlength="10"
            />
            <input
              type="text"
              name="city"
              class="text-box"
              placeholder="Ville*"
              required
              maxlength="20"
            />
            <input
              type="text"
              name="objets"
              class="text-box w-100"
              placeholder="Objet*"
              required
              maxlength="40"
            />
            <textarea
              name="message"
              id=""
              cols="30"
              rows="10"
              placeholder="Message*"
              required
              maxlength="1500"
              
            ></textarea>
            <input
              type="hidden"
              id="recaptchaResponse"
              name="recaptcha-response"
            />

            <input type="submit" name="submit" class="send-btn" value="Envoyer" />
            <p class="low text-left">
              <span class="font-weight-bold">Tous les champs (*) sont obligatoires.<br/></span>
              Aucune donnée personnelle n’est conservée par notre site via le formulaire de contact.
            </p>
          </form>
        </div>
      </div>
      <!--contact section end-->
    </div>
    <div class="map-contact-sidebar col-xl-3 text-center">
      <h2 class="contact mb-5">Où nous trouver ?</h2>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2909.06611892999!2d3.0048772149990457!3d43.18712347913998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b1ac6e237240cd%3A0xfa638979dd755178!2s8%20Rue%20Ancienne%20Porte%20de%20B%C3%A9ziers%2C%2011100%20Narbonne!5e0!3m2!1sfr!2sfr!4v1611734652187!5m2!1sfr!2sfr" class="map w-100 h-75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </div>
</div>

<!--Map-->

<div class="container-fluid map-contact-footer">
    <div class="row p-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2909.06611892999!2d3.0048772149990457!3d43.18712347913998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b1ac6e237240cd%3A0xfa638979dd755178!2s8%20Rue%20Ancienne%20Porte%20de%20B%C3%A9ziers%2C%2011100%20Narbonne!5e0!3m2!1sfr!2sfr!4v1611734652187!5m2!1sfr!2sfr" class="map w-100 map-contact" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" title="map"></iframe>
    </div>
</div>

<!-- Captcha -->

<script src="https://www.google.com/recaptcha/api.js?render=6Lex4EYaAAAAANYJIq6KZ5hxd4yKn44d-YiWu8Wb"></script>

<script>
    grecaptcha.ready(function () {
      grecaptcha.execute('6Lex4EYaAAAAANYJIq6KZ5hxd4yKn44d-YiWu8Wb',
      {action: 'submit'}).then(function (token) {
        document.getElementById('recaptchaResponse').value = token;
        // Add your logic to submit to your backend server here.
      });
    });
</script>


<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<!--footer-->
<?php include '../includes/footer-page.php'; ?>
