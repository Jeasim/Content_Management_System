<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/TexteModifiableDAO.php");

	class FetchProjetAction extends CommonAction {

		public $result;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC, "fetch projet");
		}

		protected function executeAction() {

			$this->result = TexteModifiableDAO::fetchProjet($_POST["projetID"]);

		}
	}