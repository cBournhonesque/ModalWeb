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
	public $poule;
	public $cle;
	public static function insererRencontre($dbh, $sport, $equipe1, $equipe2, $vainqueur, $score1, $score2, $date, $lieu, $poule) {
		// opérations sur la base
		$sth = $dbh->prepare ( "INSERT INTO `rencontres` (`sport`, `equipe1`, `equipe2`, `vainqueur`, `score1`, `score2`, `date`, `lieu`, `poule`) VALUES(?,?,?,?,?,?,?,?,?)" );
		$sth->execute ( array (
				$sport,
				$equipe1,
				$equipe2,
				$vainqueur,
				$score1,
				$score2,
				$date,
				$lieu,
				$poule 
		) );
	}
}
class Utilisateur {
	public $login;
	public $mdp;
	public $nom;
	public $prenom;
	public $promotion;
	public $naissance;
	public $email;
	public $feuille;
	public function __toString() {
		$date = explode ( "-", $this->naissance );
		if (! is_null ( $this->promotion )) {
			return "[" . $this->login . "] " . $this->prenom . " <b>" . $this->nom . "</b>, né le " . $date [2] . "/" . $date [1] . "/" . $date [0] . ", X" . $this->promotion . ", " . $this->email;
		} else {
			return "[" . $this->login . "] " . $this->prenom . " <b>" . $this->nom . "</b>, né le " . $date [2] . "/" . $date [1] . "/" . $date [0] . ", " . $this->email;
		}
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
	public static function insererUtilisateur($dbh, $login, $mdp, $nom, $prenom, $promotion, $naissance, $email, $feuille) {
		// opérations sur la base
		$test = Utilisateur::getUtilisateur ( $dbh, $login );
		if (! is_null ( $test )) {
			echo "L'utilisateur est déjà dans la base.";
			return FALSE;
		} else {
			
			$sth = $dbh->prepare ( "INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)" );
			$sth->execute ( array (
					$login,
					$mdp,
					$nom,
					$prenom,
					$promotion,
					$naissance,
					$email,
					$feuille 
			) );
			return TRUE;
		}
	}
	public function testerMdp($mdp) {
		return ($this->mdp == sha1 ( $mdp ));
	}
}

?>