<?php 
require('../../model/backend/backend.php');

function adminView()
{
	$nbrComments = getNbrComments();
	$nbrUsers = getNbrUsers();
	require('../../view/backend/adminView.php');
}

function gestionArticlesView()
{
	getArticles();
	require('../../view/backend/gestionArticlesView.php');
}

function addArticlesView()
{
		getArticles();

		################################# SI RAJOUT D'UN ARTICLE ########################

	if (isset($_POST['contenu']) && !empty($_POST['contenu']) && isset($_POST['titre']) && !empty($_POST['titre']))
	{
		$target_dir = "../../public/image/article/";
		$target_file = $target_dir . basename($_FILES['fileselect']['name']);

		if (file_exists($target_file))
			{
				echo 'Nom de fichier image déjà existant dans la base de donnée.';
				require('../../view/backend/addArticlesView.php');
			}
			else
			{
				move_uploaded_file($_FILES['fileselect']['tmp_name'], $target_file);
				echo 'IMAGE THEoRIQUEMENT ENREGISTRE';

				addArticle();
				require('../../view/backend/addArticlesView.php');
				echo 'LE TEXTE ET IMAGE ONT ETE ENREGISTRE';
			}
	}

	################### SI EDITION D'UN ARTICLE ############################

	elseif (isset($_POST['editContenu']) && !empty($_POST['editContenu']) && isset($_POST['editTitre']) && !empty($_POST['editTitre'])) 
	{
		updateArticle();
		$editDone = TRUE;
		require('../../view/backend/addArticlesView.php');
		echo 'CONTROLLER : CONSIGNE ENVOYEE POUR MODIF LE TEXTE VIA MODEL';
	}

##################### EDITION DE L'IMAGE #####################################

	elseif (isset($_FILES['fileselect']))
	{
		$target_dir = "../../public/image/article/";
		$target_file = $target_dir . basename($_FILES['fileselect']['name']);
		if (file_exists($target_file))
		{
			#### Supprime ancien fichier pour le remplacer par le new ######
			echo 'Nom de fichier image déjà existant dans la base de donnée veuillez le renommer.';
			require('../../view/backend/addArticlesView.php');
			echo 'CONTROLLER : CONSIGNE ENVOYEE POUR IMAGE VIA MODEL';
		}
		else
		{
			move_uploaded_file($_FILES['fileselect']['tmp_name'], $target_file);
			echo 'IMAGE THEoRIQUEMENT ENREGISTRE';
			updateImg();
			require('../../view/backend/addArticlesView.php');
			echo 'CONTROLLER : CONSIGNE ENVOYEE POUR IMAGE VIA MODEL';
		}
	}
	else 
	{
		require('../../view/backend/addArticlesView.php');
		echo 'TEXTE OU IMAGE NON ENREGISTRE';
	}
}

function adminArticleView()
{
	getArticles();
	getComments();
	if (isset($_POST['supprimer']))
	{
		deleteArticle();
		require('../../view/backend/adminArticleView.php');
	}
	elseif (isset($_POST['publier']))
	{
		publierArticle();
		require('../../view/backend/adminArticleView.php');
	}
	elseif (isset($_POST['retirer']))
	{
		retirerArticle();
		require('../../view/backend/adminArticleView.php');
	}
	elseif (isset($_POST['publier_comment']))
	{
		publier_comment();
		require('../../view/backend/adminArticleView.php');
	}
	elseif (isset($_POST['supprimer_comment']))
	{
		supprimer_comment();
		require('../../view/backend/adminArticleView.php');
	}
	elseif (isset($_POST['retirer_comment']))
	{
		retirer_comment();
		require('../../view/backend/adminArticleView.php');
	}
	else
	{
		require('../../view/backend/adminArticleView.php');
	}
}

/* PARTIE GESTIONS DES COMMENTAIRES */

function gestionCommentsView()
{
	$data = getNewComments();
	#getArticlesWithNewComments();
	require('../../view/backend/gestionCommentsView.php');
}