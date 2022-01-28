<?php

//                  ####### PARTIE INSCRIPTION/DECO/CONNEXION #######

function getUsername()
{
	// Contrôle si Username entrée par le visiteur est présent dans Base de données, si "oui" récupération du password et id de la bdd.
	$db = dbConnect();
	$req = $db->prepare('SELECT id, groupe, username, password FROM user WHERE username = ?');
	$req->execute(array($_POST['username']));

	$data = $req->fetch();

	return $data;
	$req->closeCursor();
}

function inscription()
{
	$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$username = strtolower($_POST['username']);
	$email = strtolower($_POST['email']);
	//Création aléatoire d'une clé
	$cle = md5(microtime(TRUE)*100000);

//entrée des valeurs de l'utilisateur dans la DB.
	$db = dbConnect();
	$req = $db->prepare('INSERT INTO user(username, password, email, cle, date_inscription) VALUES(:username, :password, :email, :cle, CURDATE())');
	$req->execute(array(
		'username' => $username,
		'password' => $pass_hache,
		'email' => $email,
		'cle' => $cle));

	//Preparation du mail contenant le lien d'activation
	$destinataire = $email;
	$sujet = 'Activer votre compte';
	$header = 'From: inscription@eidhendust.com';

	$message = 'Bienvenue sur Mike Echo,

	Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.

	http://eidhendust.com/index.php?action=activation/$log='.urlencode($username).'$cle='.urlencode($cle).'

	-------------------
	Ceci est un mail automatique, merci de ne pas y répondre.';

	mail($destinataire, $sujet, $message, $header) ; // Envoi du mail

	return $req;
	$req->closeCursor();
}

// Permet d'aller vérifier si user et email déjà inscrit dans la DB

function controlDbInscription()
{
		$db = dbConnect();
		$req = $db->prepare('SELECT username, email FROM user WHERE username = :username || email = :email');
		$req->execute(array('username' => $_POST['username'], 'email' => $_POST['email']));
		$data = $req->fetch();

	return $data;
	$req->closeCursor();
}

function verifActivationAccount()
{
	// Récupération des variables nécessaires à l'activation
	$login = $_GET['log'];
	$cle = $_GET['cle'];

	$db = dbConnect();
	$req = $db->prepare('SELECT cle, actif FROM user WHERE login = :login');
	$req->execute(array(':login' => $login)); 
	$row = $req->fetch();

	return $row;
	$req->closeCursor();
}

function activationAccount()
{
	$db = dbConnect();
	$req = $db->prepare("UPDATE user SET actif = 1 WHERE login = :login");
	$req->bindParam(':login', $login);
	$req->execute();
	$req->closeCursor();
}



//                     ####### PARTIE HOME VIEW #######

function getArticles()
{
	$db = dbConnect();

	$req = $db->query('SELECT id, image, titre, contenu, statut, DATE_FORMAT(date_creation,\'%d %M %Y\') AS date_creation_fr FROM articles WHERE statut=\'posted\' ORDER BY date_creation DESC');
	return $req;
	$req->closeCursor();
}

//                     ######## PARTIE ARTICLE INDIVIDUEL ###########

function getArticle()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT id, image, titre, contenu, DATE_FORMAT(date_creation,\'%d/%M/%Y\') AS date_creation_fr FROM articles WHERE id = :article_id');
		$req->execute(array('article_id' => $_GET['article_id']));

	return $req;
	$req->closeCursor();
}

function getComments()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT auteur, comment, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS date_comments_fr FROM comments WHERE id_article = ? AND statut=\'posted\' ORDER BY date_comment');
	$req->execute(array($_GET['article_id']));

	return $req;
	$req->closeCursor();
}

function add_comment()
{
	$id_article = $_GET['article_id'];
	$auteur = $_SESSION['username'];
	$comment = $_POST['add_comment'];

	$db = dbConnect();
	$req = $db->prepare('INSERT INTO comments(id_article, auteur, comment, date_comment, statut) VALUES(:id_article, :auteur, :comment, CURDATE(), \'new\')');
	$req->execute(array(
		'id_article' => $id_article,
		'auteur' => $auteur,
		'comment' => $comment));

	return $req;
	$req->closeCursor();
}

//                      ######## CONNECTION A LA DB ########

// Fonction pour se connecter à la db pour toutes les autres fonctions.
function dbConnect()
{
	try
		{
			$db = new PDO('mysql:host=localhost;dbname=u427970665_lc;charset=utf8','u427970665_Senshee', 'xvBy9$2705!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$db->query("SET lc_time_names = 'fr_FR'");
			return $db;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
}

//Partie test

function testMail()
{
	mail('senshee@eidhendust.com', 'subject test', 'msg test');
}