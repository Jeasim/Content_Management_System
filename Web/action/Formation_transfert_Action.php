<?php
	require_once("action/CommonAction.php");

	class Formation_transfert_Action extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC, "Formation et transfert", "services","Nos Services", "services.php", "Nos services");
		}

		protected function executeAction() {

		}
	}