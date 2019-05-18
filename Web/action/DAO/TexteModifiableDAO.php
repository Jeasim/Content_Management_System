<?php
	require_once("action/DAO/Connection.php");

	class TexteModifiableDAO{

		public static function lireTexteAccueil($section) {
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM accueil WHERE section=?");
			$statement->bindParam(1, $section);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

			$contenu = null;

			if ($row = $statement->fetch()) {
				$contenu = $row;
			}

			$contenu = utf8_decode($contenu['CONTENU']);

			return $contenu;
		}

		public static function updateTexteAccueil($texteModif, $section){
			$connection = Connection::getConnection();

			$texteModif = utf8_encode($texteModif);

			$statement = "UPDATE accueil SET contenu=? WHERE section=?";
			$connection->prepare($statement)->execute([$texteModif, $section]);
		}


		public static function fetchDepartements() {

			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM departements");
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

			$departements = [];

			while ($row = $statement->fetch()) {
				$departements[] = utf8_decode($row['NOM']);
			}

			return $departements;
		}

		public static function fetchEmploye($id){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM employes WHERE id = ?");
			$statement->bindParam(1, $id);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

			while ($row = $statement->fetch()) {
				$employe = $row;
			}

			$employe["DEPARTEMENT"] = self::fetchDepartement($id);

			return $employe;
		}

		public static function fetchDepartement($id){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT nom FROM departements WHERE id = ( SELECT id_departement FROM employes WHERE id = ? )");
			$statement->bindParam(1, $id);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

			while ($row = $statement->fetch()) {
				$departement = $row["NOM"];
			}

			return $departement;
		}

		public static function fetchEmployeParDepartement($departement){
			$departementID =  self::fetchDepartementID($departement);

			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * FROM employes WHERE id_departement = ?");
			$statement->bindParam(1, $departementID);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

			$employes = [];

			while ($row = $statement->fetch()) {
				$employes[] = $row;
			}

			return $employes;
		}

		public static function fetchDepartementID($nomDepartment){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT id FROM departements WHERE nom = ?");
			$statement->bindParam(1, $nomDepartment);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

			if($row = $statement->fetch()) {
				$departementID = $row['ID'];
			}

			return $departementID;
		}

		public static function modifierEmploye($id, $nom, $poste, $departement, $numTel, $courriel, $infoSup1, $infoSup2){
			$departementID = self::fetchDepartementID($departement);

			$connection = Connection::getConnection();
			$statement = $connection->prepare("UPDATE employes SET nom = ?, poste = ?, numtel = ?, courriel = ?, id_departement = ?, info_sup1 = ?, info_sup2 = ? WHERE id = ? ");
			$statement->bindParam(1, $nom);
			$statement->bindParam(2, $poste);
			$statement->bindParam(3, $numTel);
			$statement->bindParam(4, $courriel);
			$statement->bindParam(5, $departementID);
			$statement->bindParam(6, $infoSup1);
			$statement->bindParam(7, $infoSup2);
			$statement->bindParam(8, $id);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

		}

		public static function supprimerEmploye($employeID){
			$connection = Connection::getConnection();
			$statement = $connection->prepare("DELETE FROM employes WHERE id = ?");
			$statement->bindParam(1, $employeID);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();
		}




	}