<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/TexteModifiableDAO.php");

	class SupprimerEmployeAction extends CommonAction {

		public $result;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC, "Modification 'Équipe'", null, null, null, "Administrateur");
		}

		protected function executeAction() {

			$this->result = TexteModifiableDAO::supprimerEmploye($_POST["employeID"]);

		}
	}