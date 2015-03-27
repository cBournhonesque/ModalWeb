<?php
class Database {
	public static function connect() {
		$dsn = 'mysql:dbname=usports;host=127.0.0.1';
		$user = 'root';
		$password = '';
		$dbh = null;
		try {
			$dbh = new PDO ( $dsn, $user, $password, array (
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" 
			) );
			$dbh->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			echo 'Connexion échouée : ' . $e->getMessage ();
			exit ( 0 );
		}
		return $dbh;
	}
}
class Rencontre {
	public $sport;
	public $equipe1;
	public $equipe2;
	public $vainqueur;
	public $score1;
	public $score2;
	public $date;
	public $lieu;
	public $heure;
	public $duree;
	public $commentaire;
	public $poule;
	public $cle;
	public $hebdomadaire;
	public static function insererRencontre($dbh, $sport, $equipe1, $equipe2, $vainqueur, $score1, $score2, $date, $heure, $duree, $lieu, $poule, $commentaire, $hebdomadaire) {
		// opérations sur la base
		$sth = $dbh->prepare ( "INSERT INTO `rencontre` (`sport`, `equipe1`, `equipe2`, `vainqueur`, `score1`, `score2`, `date`, `heure`, `duree`, lieu`, `poule`, `commentaire`, `hebdomadaire`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)" );
		$sth->execute ( array (
				$sport,
				$equipe1,
				$equipe2,
				$vainqueur,
				$score1,
				$score2,
				$date,
				$heure,
				$duree,
				$lieu,
				$poule,
				$commentaire,
				$hebdomadaire 
		) );
		
		return TRUE;
	}
	public static function insererEntrainement($dbh, $sport, $equipe1, $date, $heure, $duree, $lieu, $commentaire, $hebdomadaire) {
		// opérations sur la base
		$sth = $dbh->prepare ( "INSERT INTO `rencontre` (`sport`, `equipe1`, `equipe2`, `vainqueur`, `score1`, `score2`, `date`, `heure`, `duree`, lieu, poule, commentaire,hebdomadaire) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)" );
		$sth->execute ( array (
				$sport,
				$equipe1,
				NULL,
				NULL,
				NULL,
				NULL,
				$date,
				$heure,
				$duree,
				$lieu,
				NULL,
				$commentaire,
				$hebdomadaire 
		) );
		
		return TRUE;
	}
	public static function getSport($dbh, $login) {
		$query = 'SELECT `sport` FROM rencontre WHERE `login`=$login';
		$sth = $dbh->prepare ( $query );
		
		$sth->setFetchMode ( PDO::FETCH_CLASS, 'Rencontre' );
		$sth->execute ();
		
		$sth->fetch ();
		$sth->closeCursor ();
		return $sth;
	}
	public static function getEntrainements($dbh) {
		$query = 'SELECT `date`,`heure`,`duree` FROM rencontre WHERE `equipe2` IS NULL or `equipe2`=""';
		$sth = $dbh->prepare ( $query );
		
		$sth->setFetchMode ( PDO::FETCH_CLASS, 'Rencontre' );
		$sth->execute ();
		
		return $sth->fetchAll ();
		$sth->closeCursor ();
	}
}
class Message {
	public $cle;
	public $emetteur;
	public $date;
	public $destinataire;
	public $titre;
	public static function getSentMessage($dbh, $emetteur) {
		$query = "SELECT * FROM message WHERE emetteur=? ORDER BY date DESC";
		$sth = $dbh->prepare ( $query );
		
		$sth->setFetchMode ( PDO::FETCH_CLASS, 'Message' );
		$sth->execute ( array (
				$emetteur
		) );
		$messages = $sth->fetchAll ();
		
		$sth->closeCursor ();
		if (! $messages)
			return null;
		else
			return $messages;
	}
	
	public static function getReceivedMessage($dbh, $destinataire) {
		$query = "SELECT * FROM message WHERE destinataire=? ORDER BY date DESC";
		$sth = $dbh->prepare ( $query );
	
		$sth->setFetchMode ( PDO::FETCH_CLASS, 'Message' );
		$sth->execute ( array (
				$destinataire
		) );
		$messages = $sth->fetchAll ();
	
		$sth->closeCursor ();
		if (! $messages)
			return null;
		else
			return $messages;
	}
	
}
class Utilisateur {
	public $login;
	public $mdp;
	public $nom;
	public $prenom;
	public $sport;
	public $naissance;
	public $email;
	public $categorie;
	public $equipe;
	public function __toString() {
		$date = explode ( "-", $this->naissance );
		return "[" . $this->login . "] " . $this->prenom . " <b>" . $this->nom . "</b>, né le " . $date [2] . "/" . $date [1] . "/" . $date [0] . ", " . $this->email;
	}
	public static function amisDe($dbh, $login) {
		$user = Utilisateur::getUtilisateur ( $dbh, $login );
		$tab = $user->getAmis ( $dbh );
		foreach ( $tab as $amis ) {
			echo $amis . "<br>";
		}
	}
	public function getAmis($dbh) {
		$query = "SELECT * FROM amis JOIN utilisateurs ON utilisateurs.login = amis.login1 WHERE login2=?";
		$sth = $dbh->prepare ( $query );
		
		$sth->setFetchMode ( PDO::FETCH_CLASS, 'Utilisateur' );
		$sth->execute ( array (
				$this->login 
		) );
		$users = $sth->fetchAll ();
		
		$sth->closeCursor ();
		if (! $users)
			return null;
		else
			return $users;
	}
	public static function getUtilisateur($dbh, $login) {
		$query = "SELECT * FROM utilisateurs WHERE login=?";
		$sth = $dbh->prepare ( $query );
		
		$sth->setFetchMode ( PDO::FETCH_CLASS, 'Utilisateur' );
		$sth->execute ( array (
				$login 
		) );
		$user = $sth->fetch ();
		
		$sth->closeCursor ();
		
		if (! $user) {
			return null;
		} else {
			return $user;
		}
	}
	public static function insererUtilisateur($dbh, $login, $mdp, $nom, $prenom, $sport, $naissance, $email, $categorie, $equipe) {
		// opérations sur la base
		$test = Utilisateur::getUtilisateur ( $dbh, $login );
		if (! is_null ( $test )) {
			echo "L'utilisateur est déjà dans la base.";
			return FALSE;
		} else {
			
			$sth = $dbh->prepare ( "INSERT INTO `utilisateurs` (`login`, `sport`, `mdp`, `nom`, `prenom`, `naissance`, `email`, `categorie`, `equipe`) VALUES(?,?,SHA1(?),?,?,?,?,?,?)" );
			$sth->execute ( array (
					$login,
					$sport,
					$mdp,
					$nom,
					$prenom,
					$naissance,
					$email,
					$categorie,
					$equipe 
			) );
			return TRUE;
		}
	}
	public function testerMdp($mdp) {
		return ($this->mdp == sha1 ( $mdp ));
	}
}

?>