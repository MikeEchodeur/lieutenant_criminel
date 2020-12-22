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

//entrée des valeurs de l'utilisateur dans la DB.
	$db = dbConnect();
	$req = $db->prepare('INSERT INTO user(username, password, email, date_inscription) VALUES(:username, :password, :email, CURDATE())');
	$req->execute(array(
		'username' => $username,
		'password' => $pass_hache,
		'email' => $email));

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
			$db = new PDO('mysql:host=ruqz3084;dbname=ruqz3084_lc;charset=utf8', 'ruqz3084', '56zqSJbk9ECA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$db->query("SET lc_time_names = 'fr_FR'");
			return $db;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
}

