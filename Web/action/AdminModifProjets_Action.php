<?php
	require_once("action/CommonAction.php");

	class AdminModifProjets_Action extends CommonAction {

		public $projetsEnCours;
		public $projetsTermines;
		private $enCours = 0;
		private $termine = 1;


		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMINISTRATOR, "Modification 'Projets'", "admin", null, null, "Administrateur");
		}

		protected function executeAction() {
			$this->projetsEnCours = TexteModifiableDAO::fetchProjets($this->enCours);
			$this->projetsTermines = TexteModifiableDAO::fetchProjets($this->termine);
		}


	}