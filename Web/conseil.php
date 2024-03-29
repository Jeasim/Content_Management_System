<?php
	require_once("action/Conseil_Action.php");
	$action = new Conseil_Action();
	$action->execute();

	require_once("partial/header.php");
	require_once("partial/breadcrump_pageHeader.php");
?>

<div class="container">
	<div class="row">

		<div class="col-sm-5">
			<div class="widget widget-categories">
				<ul>
					<li><a href="personnel_administratif">Personnel administratif</a></li>
					<li><a href="personnel_scientifique">Personnel scientifique</a></li>
					<li><a href="etudiants">Étudiants (Assistants de recherche et stagiaires)</a></li>
					<li><a href="chercheurses_chercheurs">Chercheuses et chercheurs affiliés</a></li>
					<li class="active"><a href="conseil">Conseil d’administration</a></li>
					<li><a href="emplois">Emplois au CRISPESH</a></li>
				</ul>
			</div><!-- widget-categories -->
		</div><!-- col -->

		<div class="col-sm-7 wrap_liste_personnel">
			<?php
				foreach ($action->employes as $employe) {
					?>
				<div class="col-sm-12">
					<p class="nom-employe"><?= $employe["NOM"] ?></p>
					<div><?= $employe["POSTE"] ?></div>
					<div><?= $employe["INFO_SUP1"] ?></div>
					<div><?= $employe["INFO_SUP2"] ?></div>
					<ul>
						<?php
							if(isset($employe["COURRIEL"])){
						?>
								<li><?= $employe["COURRIEL"] ?></li>
						<?php
							}
							if(isset($employe["NUMTEL"])){
						?>
								<li><?= $employe["NUMTEL"] ?></li>
						<?php
							}
						?>
					</ul>
				</div><!-- col -->
			<?php

					}
			?>
		</div><!-- col -->
		<div class="rond_background bleu droite grosseur_1" id="cercle_2"></div>
	</div><!-- row -->
</div><!-- container -->

<?php
	require_once("partial/footer.php");