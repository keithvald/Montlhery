<?php include 'includes/header.php'; ?>
<!-- Carousel -->

<div id="carouselControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<!--section première image-->
		<div class="carousel-item active">
			<img src="assets/img/slider/diapo1.webp" class="d-block w-100" alt="First slide">
			<div class="carousel-caption d-lg-block zonetextcarousel">
				<p class="slider-p"><span class="titretextcarousel">Passe ton permis</span><br />
					<span class="titretextcarousel">en accéléré</span><br />
				</p>
				<button class="button-slider"><a href="code/permis-accelere.php"
						aria-label="Se renseigner sur le permis accelere">Se renseigner</a></button>
			</div>
		</div>
		<!--section deuxième image-->
		<div class="carousel-item">
			<img src="assets/img/slider/diapo2.webp" class="d-block w-100" alt="Second slide">
			<div class="carousel-caption d-lg-block zonetextcarousel">
				<p class="slider-p"><span class="titretextcarousel">Tu veux apprendre le code</span><br />
					<span class="titretextcarousel">dés aujourd'hui ?</span><br />
				</p>
				<button class="button-slider"><a href="code/cours-de-code.php" aria-label="Se renseigner sur le code">Se
						renseigner</a></button>
			</div>
		</div>
		<!--section troisième image-->
		<div class="carousel-item">
			<img src="assets/img/slider/diapo3.webp" class="d-block w-100" alt="Third slide">
			<div class="carousel-caption d-lg-block zonetextcarousel">
				<p class="slider-p"><span class="titretextcarousel">Tu peux voir</span><br />
					<span class="titretextcarousel">tous nos permis</span><br />
				</p>
				<button class="button-slider"><a href="#ancre1" aria-label="Voir tous les permis">Voir tous les
						permis</a></button>
			</div>
		</div>
	</div>
	<!--Flèches précédents et suivants-->

	<a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev" aria-label="Navigation diapo left">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Précédent</span>
	</a>
	<a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next" aria-label="Navigation diapo right">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Suivant</span>
	</a>
</div>
<!--Permis-->
<div class="container-permis section-permis">
	<div class="row">
		<div class="col-12 permis">
			<h1 id="ancre1">Préparer son permis</h1>
		</div>
		<div class="col-6 col-md-4">
			<div class="card">
				<img src="assets/img/cards/accelere.webp" alt="icon" class="card-img-top">
				<div class="card-body">
					<p class="card-title">Permis <span class="second-line">accéléré</span></p>
					<a href="code/permis-accelere.php" aria-label="Permis-accelere info"><button class="interest">Ca m'intéresse
							!</button></a>
				</div>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<div class="card">
				<img src="assets/img/cards/voiture.webp" alt="icon" class="card-img-top">
				<div class="card-body">
					<p class="card-title">Permis <span class="second-line">voiture</span></p>
					<a href="code/permis-auto.php" aria-label="Permis voiture info"><button class="interest">Ca m'intéresse
							!</button></a>
				</div>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<div class="card">
				<img src="assets/img/cards/moto.webp" alt="icon" class="card-img-top">
				<div class="card-body">
					<p class="card-title">Permis <span class="second-line">moto</span></p>
					<a href="code/permis-moto.php" aria-label="Permis moto info"><button class="interest">Ca m'intéresse
							!</button></a>
				</div>
			</div>
		</div>
		<div class="col-6 col-md-6">
			<div class="card">
				<img src="assets/img/cards/motorcycle.webp" alt="icon" class="card-img-top">
				<div class="card-body">
					<p class="card-title">Permis <span class="second-line">125cm3</span></p>
					<a href="code/scooter.php" aria-label="Permis 125cm3 info"><button class="interest">Ca m'intéresse
							!</button></a>
				</div>
			</div>
		</div>
		<div class="col-6 col-md-6">
			<div class="card">
				<img src="assets/img/cards/scooter.webp" alt="icon" class="card-img-top">
				<div class="card-body">
					<p class="card-title">Permis <span class="second-line">AM(BSR)</span></p>
					<a href="code/permis-am-bsr.php" aria-label="Permis AM(BSR) info">
						<button class="interest">Ca m'intéresse!</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Actualités-->
<div class="container-fluid actu">
	<div class="row mb-5 actu-title">
		<h1 class="col-12 display-4 text-center">Actualités</h1>
	</div>

	<div class="row">
		<?php
        foreach($result as $news){
		setlocale(LC_TIME, 'fr_FR.UTF-8');
		$date = ucfirst(strftime("%A %e %B %Y %T", strtotime($news['dateCreation']))) ;
		?>
		<div class="col-4">
			<div class="card">
				<div class="row g-0">
					<div class="col-4 actu-img-container">
						<img src="assets/img/crud/<?= $news['image'] ?>" alt="<?= $news['image'] ?>">
					</div>
					<div class="col-8 p-0">
						<div class="card-body">
							<h5 class="card-title mb-2"><?= $news['titre'] ?></h5>
							<a class="fs-6 text-dark" href="#"><?= $news['lien']; ?></a>
							<div class="mb-1 text-muted small"><?= $date ?></div>
							<p class="card-text mb-5"><?= $news['sommaire'] ?></p>
							<div class="row justify-content-between">
								<a class="btn btn-outline-primary btn-sm" role="button" href="">Lire la suite</a>
								<p class="card-text text-muted small">Auteur: <?= $news['auteur'] ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
	</div>
</div>

<!--Code-->
<div class="container-fluid section-code">
	<div class="row p-8">
		<div class="col-12 col-md-4 text-center section-code-logo-prepacode">
			<a href="https://www.prepacode-enpc.fr/landing_page" rel="noreferrer" target="_blank"
				aria-label="Prepa Code info"><img src="assets/img/logos/prepacode-index.webp" alt="logo-prepacode"></a>
		</div>
		<div class="col-12 col-md-8 section-inner-code">
			<h1 class="left">Bien se préparer au code</h1>
			<p class="description-code">Envie de passer le code ? Prends des cours avec notre auto-école pour passer l'examen
				sereinement. Apprends, révise et entraîne toi à faire moins de 5 fautes afin de l'obtenir !</p>
			<a href="code/cours-de-code.php" aria-label="Cour Code info"><button class="code-interest">Ca m'intéresse
					!</button></a>
		</div>
	</div>
</div>


<!--historique-->
<div class="container-fluid container-fluid-history">
	<div class="row section-history">
		<div class="col-12 title-our-history">
			<h1>Notre histoire</h1>
		</div>
		<div class="col-12 col-md-6 col-lg-5 section-history-description">
			<p>L’<strong>auto école Montlhéry</strong> a été crée en 1974 par Bernard Caussignac.<br /><br />
				Elle se situe aux abords du centre ville de <strong>Narbonne</strong> entre le jardin de la révolution et la
				place
				Bistan (ou place du forum). A proximité de la gare routière et de la gare SNCF, elle est pratique
				d’accès.<br /><br />
				Du haut de ces 44 ans d’histoire elle a fondé sa renommée sur son <strong>sérieux</strong>, sa
				<strong>convivialité</strong>, son <strong>professionnalisme</strong> ainsi que ses
				<strong>résultats.</strong>
				Nicolas et Gary Caussignac dirigent l’auto-école accompagnés de six autres moniteurs Patrick, Cédric, Dimitri,
				Gregory, Nicolas et Sébastien. Ces deux derniers s'occupent aussi des permis moto et cyclomoteur.<br />
			</p>
		</div>
		<div class="col-12 col-md-6 col-lg-5 section-photo-history">
			<img src="assets/img/photo/histoire.jpg" alt="photo" class="photo-history" />
		</div>
	</div>
</div>

<!-- Flickity HTML init -->
<div class="container-fluid section-team">
	<div class="row section-team">
		<div class="col-12 col-md-4 col-xl-4 section-team-formateurs">
			<h1>Notre équipe</h1>
			<p class="team-description"><span class="six">6</span> formateurs</p>
			<ul>
				<li>Compétents</li>
				<li>A l'écoute</li>
				<li>Qui aiment leur métier</li>
			</ul>
		</div>
		<div class="col-12 col-md-7 col-xl-5 section-flickity">
			<div class="flickity">
				<div class="carousel custom-div" data-flickity='{ "groupCells": true }'>
					<div class="carousel-cell">
						<div class="col">
							<img src="assets/img/slider/gary.webp" alt="gary" />
							<p class="text-center custom-color">Gary</p>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="d-flex">
							<div class="col">
								<img src="assets/img/slider/cedric.webp" alt="cedric" />
								<p class="text-center custom-color">Cédric</p>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="col">
							<img src="assets/img/slider/dimitri.webp" alt="dimitri" />
							<p class="text-center custom-color">Dimitri</p>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="col">
							<img src="assets/img/slider/nicolas.webp" alt="nicolas" />
							<p class="text-center custom-color">Nicolas</p>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="col">
							<img src="assets/img/slider/patrick.webp" alt="patrick" />
							<p class="text-center custom-color">Patrick</p>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="col">
							<img src="assets/img/slider/sebastien.jpg" alt="sebastien" />
							<p class="text-center custom-color">Sébastien</p>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="col">
							<img src="assets/img/slider/nicolas_.jpg" alt="nicolas" />
							<p class="text-center custom-color">Nicolas</p>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="col">
							<img src="assets/img/slider/gregory.jpg" alt="gregory" />
							<p class="text-center custom-color">Gregory</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Stats-->
<div class="container-fluid">
	<div class="row section-stats">
		<div class="col-12 col-md-6 col-lg-5 d-md-grid mx-lg-4">
			<div class="section-stats-pictures">
				<img src="assets/img/illustrations/avis.webp" alt="picture" class="pictures" />
			</div>
			<h1>Satisfaction <img src="assets/img/icones/i-grey.png" alt="informations" class="icon-info"
					title="Moyenne de la note Appréciation Globale attribuée par les élèves ayant repondu à l'enquête"></h1>
			<h2>Parce que votre avis compte pour nous !</h2>
			<p>Notre enquête satisfaction montre que les apprenants à l'auto-
				école Montlhery sont très satisfaits de la formation proposée.</p>
			<p class="font-weight-bold marknote">Note : <span class="mark-number">8,5</span>/10 <span
					class="collected-marks-number mx-4">85 <span class="collected-marks">avis collectés</span></span></p>
			<p class="low">*Note collectée au cours de l'année 2021</p>
		</div>
		<div class="col-12 col-md-6 col-lg-5 d-md-grid mx-lg-4">
			<div class="section-stats-pictures">
				<img src="assets/img/illustrations/stats.webp" alt="picture" class="pictures" />
			</div>
			<h1>Taux de réussite</h1>
			<p>En 2018, <span class="pourcentage">95%</span> des <strong>66 candidats</strong> ont réussi à obtenir le permis
				motocyclettes !</p>
			<p class="button-stats">
				<a href="https://www.vroomvroom.fr/auto-ecoles/aude/narbonne/auto-ecole-montlhery" rel="noreferrer"
					target="_blank" aria-label="Montlhery statistique info"><button class="button-info-stat"><img
							src="assets/img/icones/information.png" alt="icon"
							class="button-info-stat-i">Statistiques</button></a>
			</p>
		</div>
	</div>
</div>

<!--Map-->
<div class="container-fluid">
	<div class="col-12 section">
		<h1>Où nous trouver</h1>
		<div id="map"></div>
	</div>
</div>

<!--footer-->
<?php include 'includes/footer.php'; ?>
