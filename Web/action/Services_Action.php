<?php
	require_once("action/CommonAction.php");

	class Services_Action extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC, "Nos services", "services", "Accueil", "index.php", "Nos Services");
		}

		protected function executeAction() {

		}
	}