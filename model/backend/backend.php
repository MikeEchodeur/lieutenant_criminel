<?php

######################## PARTIE EDITION ARTICLE ########################

function addArticle()
{

	$contenu = $_POST['contenu'];
	$titre = $_POST['titre'];
	$image = 'public/image/article/' . $_FILES['fileselect']['name'];

	$db = dbConnect();
	$req = $db->prepare('INSERT INTO articles(image, titre, contenu, date_creation, statut) VALUES(:image, :titre, :contenu, CURDATE(), \'save\')');
	$req->execute(array(
		'image' => $image,
		'titre' => $titre,
		'contenu' => $contenu));

	return $req;
	$req->closeCursor();
}

function updateImg()
{
	$id = $_GET['edit_article_id'];
	$image = 'public/image/article/' . $_FILES['fileselect']['name'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE articles SET image = :image WHERE id = :id');
	$req->execute(array(
		'image' => $image,
		'id' => $id));

	$req->closeCursor();
}

function updateArticle()
{
	$contenu = $_POST['editContenu'];
	$titre = $_POST['editTitre'];
	$id = $_GET['edit_article_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE articles SET titre = :titre, contenu = :contenu WHERE id = :id');
	$req->execute(array(
		'titre' => $titre,
		'contenu' => $contenu,
		'id' => $id));

	$req->closeCursor();
}

function deleteArticle()
{
	$id = $_GET['edit_article_id'];

	$db = dbConnect();
	$req = $db->prepare('DELETE FROM articles WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

function publierArticle()
{
	$id = $_GET['edit_article_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE articles SET statut = \'posted\' WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

function retirerArticle()
{
	$id = $_GET['edit_article_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE articles SET statut = \'save\' WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

#####################################PARTIE EDITION MEME #################################

function addMeme()
{

	$contenu = $_POST['contenu'];
	$image = 'public/image/memes/' . $_FILES['fileselect']['name'];

	$db = dbConnect();
	$req = $db->prepare('INSERT INTO memes(image, contenu, date_creation, statut) VALUES(:image, :contenu, CURDATE(), \'save\')');
	$req->execute(array(
		'image' => $image,
		'contenu' => $contenu));

	return $req;
	$req->closeCursor();
}

function updateImgMeme()
{
	$id = $_GET['edit_meme_id'];
	$image = 'public/image/memes/' . $_FILES['fileselect']['name'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE memes SET image = :image WHERE id = :id');
	$req->execute(array(
		'image' => $image,
		'id' => $id));

	$req->closeCursor();
}

function updateMeme()
{
	$contenu = $_POST['editContenu'];
	$id = $_GET['edit_meme_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE memes SET contenu = :contenu WHERE id = :id');
	$req->execute(array(
		'contenu' => $contenu,
		'id' => $id));

	$req->closeCursor();
}

function deleteMeme()
{
	$id = $_GET['edit_meme_id'];

	$db = dbConnect();
	$req = $db->prepare('DELETE FROM memes WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

function publierMeme()
{
	$id = $_GET['edit_meme_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE memes SET statut = \'posted\' WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

function retirerMeme()
{
	$id = $_GET['edit_meme_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE memes SET statut = \'save\' WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

#####################################PARTIE EDITION DU PETIT FDP ILLUSTRE #################################

function addArticleFdp()
{

	$contenu = $_POST['contenu'];
	$titre = $_POST['titre'];
	$image = 'public/image/articleFdp/' . $_FILES['fileselect']['name'];

	$db = dbConnect();
	$req = $db->prepare('INSERT INTO articles_fdp(titre, image, contenu, date_creation, statut) VALUES(:titre, :image, :contenu, CURDATE(), \'save\')');
	$req->execute(array(
		'titre' => $titre,
		'image' => $image,
		'contenu' => $contenu));

	return $req;
	$req->closeCursor();
}

function updateImgArticleFdp()
{
	$id = $_GET['edit_articleFdp_id'];
	$image = 'public/image/articleFdp/' . $_FILES['fileselect']['name'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE articles_fdp SET image = :image WHERE id = :id');
	$req->execute(array(
		'image' => $image,
		'id' => $id));

	$req->closeCursor();
}

function updateArticleFdp()
{
	$contenu = $_POST['editContenu'];
	$id = $_GET['edit_articleFdp_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE articles_fdp SET contenu = :contenu WHERE id = :id');
	$req->execute(array(
		'contenu' => $contenu,
		'id' => $id));

	$req->closeCursor();
}

function deleteArticleFdp()
{
	$id = $_GET['edit_articleFdp_id'];

	$db = dbConnect();
	$req = $db->prepare('DELETE FROM articles_fdp WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

function publierArticleFdp()
{
	$id = $_GET['edit_articleFdp_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE articles_fdp SET statut = \'posted\' WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

function retirerArticleFdp()
{
	$id = $_GET['edit_articleFdp_id'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE articles_fdp SET statut = \'save\' WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

################################ PARTIE GESTION COMMENTAIRES #############################

function publier_comment()
{
	$id = $_POST['id_comment'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE comments SET statut = \'posted\' WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

function retirer_comment()
{
	$id = $_POST['id_comment'];

	$db = dbConnect();
	$req = $db->prepare('UPDATE comments SET statut = \'remove\' WHERE id = :id');
	$req->execute(array(
		'id' => $id));

	$req->closeCursor();
}

################ NEW COMMENTAIRES ######################

function getNewComments()
{
	$db = dbConnect();

	$dataComments = $db->query('SELECT id, id_article, auteur, comment, statut, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS date_comments_fr FROM comments WHERE statut = "new" ORDER BY date_comment');

	return $dataComments;
	$dataComments->closeCursor();
}

function getNbrComments()
{
	$db = dbConnect();
	$req = $db->query('SELECT COUNT(id) FROM comments WHERE statut = "new"');
	$nbrComments = $req->fetchColumn();

	return $nbrComments;
	$req->closeCursor();
}

function getArticlesWithNewComments()
{
	#### PAGE ERRONNE A REVOIR ####

	$db = dbConnect();
	$req = $db->prepare('SELECT id, titre FROM articles');

	$data = $req;


	return $data;
	$req->closeCursor();

}

############################# GESTION ADMIN VIEW ###############################

function getArticles()
{
	$db = dbConnect();
	$req = $db->query('SELECT id, image, titre, contenu, statut, DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM articles ORDER BY date_creation DESC');
	return $req;
	$req->closeCursor();
}

function getMemes()
{
	$db = dbConnect();
	$req = $db->query('SELECT id, image, contenu, statut, DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM memes ORDER BY date_creation DESC');
	return $req;
	$req->closeCursor();

}

function getArticlesFdp()
{
	$db = dbConnect();
	$req = $db->query('SELECT id, image, titre, contenu, statut, DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM articles_fdp ORDER BY date_creation DESC');
	return $req;
	$req->closeCursor();
}


############################ ARTICLE ADMIN INDIVIDUEL #####################################

function getArticle()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT id, image, titre, contenu, statut, DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM articles WHERE id = :article_id');
		$req->execute(array('article_id' => $_GET['edit_article_id']));

	return $req;
	$req->closeCursor();
}

function getComments()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT id, auteur, comment, statut, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS date_comments_fr FROM comments WHERE id_article = "new" ORDER BY date_comment');
	$req->execute(array());

	return $req;
	$req->closeCursor();
}


function getMeme()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT id, image, contenu, statut, DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM memes WHERE id = :meme_id');
		$req->execute(array('meme_id' => $_GET['edit_meme_id']));

	return $req;
	$req->closeCursor();
}

function getMemeComments()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT id, auteur, comment, statut, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS date_comments_fr FROM memes_comments WHERE id_meme = "new" ORDER BY date_comment');
	$req->execute(array());

	return $req;
	$req->closeCursor();
}

function getArticleFdp()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT id, image, titre, contenu, statut, DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM articles_fdp WHERE id = :articleFdp_id');
		$req->execute(array('articleFdp_id' => $_GET['edit_articleFdp_id']));

	return $req;
	$req->closeCursor();
}

function getCommentsFdp()
{
	$db = dbConnect();
	$req = $db->prepare('SELECT id, auteur, comment, statut, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS date_comments_fr FROM articlesfdp_comments WHERE id_articleFdp = "new" ORDER BY date_comment');
	$req->execute(array());

	return $req;
	$req->closeCursor();
}

function getNbrUsers()
{
	$db = dbConnect();
	$req = $db->query('SELECT COUNT(id) FROM user');
	$result = $req->fetchColumn();

	return $result;
	$req->closeCursor();
}


//                      ######## CONNECTION A LA DB ########

// Fonction pour se connecter à la db pour toutes les autres fonctions.
function dbConnect()
{
	try
		{
			$db = new PDO('mysql:host=localhost;dbname=u427970665_lc;charset=utf8', 'u427970665_Senshee', 'xvBy9$2705!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
}