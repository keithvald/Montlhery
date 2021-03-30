<?php include 'sendmail.php'; ?>

<!--header-->
<?php include '../includes/header-page.php'; ?>

<div class="container-fluid bg-custom-blue">
	<div class="row p-8 justify-content-center">
		<h1 class="text-white title-contact"><i class="fas fa-mail-bulk mr-4"></i>Comment nous <span
				class="question-contact">contacter ?</span></h1>
	</div>
</div>
<div class="container-fluid bg-custom-grey bg-custom-img">
	<div class="row p-8 justify-content-around">
		<div class="col-md-12 col-lg-4 col-xl-3 text-center">
			<div class="contact-info">
				<p class="text-center"><img src="../assets/img/illustrations/contact.png" alt="image contact telephone"
						class="illu" /></p>
				<p><i class="fas fa-map-marker-alt mr-3"></i>8, rue ancienne porte de beziers<br>
					11100 Narbonne</p>
				<p class="links-mentions"><i class="fas fa-envelope mr-3"></i>montlherynarbonne@hotmail.fr</p>
				<p><i class="fas fa-phone mr-3"></i>04.68.32.49.49</p>
				<div class="my-5">
					<p class="font-weight-bold lead"><i class="fas fa-clock mr-3"></i>Ouverture</p>
					<p><span class="font-weight-bold">Lundi au Vendredi</span><br />
						10h à 12h et de 14h à 19h
					</p>
					<p><span class="font-weight-bold">Samedi</span><br />
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
					<form id="truc" class="contact" action="" method="POST">
						<input type="text" name="name" class="text-box" placeholder="Prénom*" maxlength="20" required />
						<input type="email" name="email" class="text-box" placeholder="Email*" maxlength="40" required />
						<input type="number" name="postal" class="text-box" placeholder="Code postal*" required maxlength="10" />
						<input type="text" name="city" class="text-box" placeholder="Ville*" required maxlength="20" />
						<input type="text" name="objets" class="text-box w-100" placeholder="Objet*" required maxlength="40" />
						<textarea name="message" id="" cols="30" rows="10" placeholder="Message*" required
							maxlength="1500"></textarea>


						<button class="g-recaptcha" data-sitekey="6LcjD5UaAAAAAOonMZp9XNtAnYkWYOWxHuaViPzE"
							data-callback='onSubmit' data-action='submit'>Submit
						</button>

						<p class="low text-left">
							<span class="font-weight-bold">Tous les champs (*) sont obligatoires.<br /></span>
							Aucune donnée personnelle n’est conservée par notre site via le formulaire de contact.
						</p>
					</form>
				</div>
			</div>
			<!--contact section end-->
		</div>
	</div>
</div>

<!-- Captcha -->



<script>
function onSubmit(token) {
	document.getElementById("truc").submit();
}
</script>


<script>
if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.href);
}
</script>

<!--footer-->
<?php include '../includes/footer-page.php'; ?>
