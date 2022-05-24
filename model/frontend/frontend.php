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
	$header = 'From: support@lieutenant-criminel.com';

	$message = 'Bienvenue sur Mike Echo,

	Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.

	http://lieutenant-criminel.com/index.php?action=activation&log='.urlencode($username).'&cle='.urlencode($cle).'

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

	$db = dbConnect();
	$req = $db->prepare('SELECT cle, actif FROM user WHERE username = :login');
	$req->execute(array(':login' => $login)); 
	$data = $req->fetch();

	return $data;
	$req->closeCursor();
}

function activationAccount()
{
	$login = $_GET['log'];
	$db = dbConnect();
	$req = $db->prepare('UPDATE user SET actif = 1 WHERE username = :login');
	$req->execute(['login' => $login]);
	$req->closeCursor();
}

function sendNewPW()
{
	$emailUser = $_POST['email'];
	$db = dbConnect();
	$req = $db->prepare('SELECT email, cle FROM user WHERE email = :emailUser');
	$req->execute(array('emailUser' => $emailUser));
	$data = $req->fetch();

	return $data;
	$req->closeCursor();
}

function sendMailNewPW()
{
	$verifEmail = sendNewPW();
	$destinataire = $verifEmail['email'];
	$cle = $verifEmail['cle'];
	$sujet = 'Modifier votre mot de passe';
	$header = 'From: support@lieutenant-criminel.com';

	$message = 'Ce mail vous a été envoyé suite à un oubli de mot de passe,

	Si vous n\êtes pas à l\origine de la demande, merci de ne pas prendre en compte ce mail.
	Pour mettre en place votre nouveau mot de passe, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur internet.

	http://lieutenant-criminel.com/index.php?action=changepassword&cle='.urlencode($cle).'

	-------------------
	Ceci est un mail automatique, merci de ne pas y répondre.';

	mail($destinataire, $sujet, $message, $header) ; // Envoi du mail
}

function modifPWInBdd()
{
	$newPass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$db = dbConnect();
	$req = $db->prepare('UPDATE user SET password = :newPassword WHERE cle = :cle');
	$req->execute(array('cle' => $_GET['cle'], 'newPassword' => $newPass_hache));
	$req->closeCursor();
}

function verifAccountPW()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT cle FROM user WHERE cle = :cle');
	$req->execute(array('cle' => $_GET['cle'])); 
	$data = $req->fetch();

	return $data;
	$req->closeCursor();
}


//                     ####### PARTIE HOME VIEW #######

function getArticles()
{
	$db = dbConnect();

	$req = $db->query('SELECT u.id, u.image, u.titre, u.contenu, u.statut, DATE_FORMAT(u.date_creation,\'%d %M %Y\') AS date_creation_fr, COUNT(c.comment) AS comment, c.id_article  FROM articles u LEFT JOIN comments c ON u.id = c.id_article WHERE u.statut=\'posted\' GROUP BY u.id ORDER BY date_creation DESC');
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

//           ################ PARTIE MEMES #################

function getMemes()
{
	$db = dbConnect();
	//$id = $_GET['memes_id'];
	$id = $_GET['memes_id'];
	if($id == NULL)
	{
		$req = $db->query('SELECT u.id, u.image, u.contenu, u.statut, DATE_FORMAT(u.date_creation,\'%d %M %Y\') AS date_creation_fr, COUNT(c.comment) AS comment, c.id_memes  FROM memes u LEFT JOIN memes_comments c ON u.id = c.id_memes WHERE u.id=(SELECT MAX(id) FROM memes) AND u.statut=\'posted\' GROUP BY u.id ORDER BY date_creation DESC');
	}

	elseif($id >= '1')
	{
		$req = $db->prepare('SELECT u.id, u.image, u.contenu, u.statut, DATE_FORMAT(u.date_creation,\'%d %M %Y\') AS date_creation_fr, COUNT(c.comment) AS comment, c.id_memes  FROM memes u LEFT JOIN memes_comments c ON u.id = c.id_memes WHERE u.id=:memes_id AND u.statut=\'posted\' GROUP BY u.id ORDER BY date_creation DESC');
		$req->execute(array('memes_id' => $id));
	}
	
	else {$req = 'test';}

	return $req;
	$req->closeCursor();
}

function nextMemes()
{
	$db = dbConnect();

	$newId = $data['u.id']++;
	$next = $db->prepare('SELECT u.id, u.image, u.contenu, u.statut, DATE_FORMAT(u.date_creation,\'%d %M %Y\') AS date_creation_fr, COUNT(c.comment) AS comment, c.id_memes  FROM memes u LEFT JOIN memes_comments c ON u.id = c.id_memes WHERE u.statut=\'posted\' AND u.id = :newId GROUP BY u.id ORDER BY date_creation DESC');
	$next->execute(array('newId' => $newId));

	return ;
	$next->closeCursor();
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