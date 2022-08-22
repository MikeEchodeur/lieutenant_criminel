<?php 
require('../../model/backend/backend.php');

function adminView()
{
	$nbrComments = getNbrComments();
	$nbrUsers = getNbrUsers();
	$nbrNewCommentFdp = getNbrCommentsFdp();
	require('../../view/backend/adminView.php');
}

function gestionArticlesView()
{
	getArticles();
	require('../../view/backend/gestionArticlesView.php');
}

function gestionMemesView()
{
	getMemes();
	require('../../view/backend/gestionMemesView.php');
}

function gestionArticlesFdpView()
{
	getArticlesFdp();
	require('../../view/backend/gestionPetitFdpView.php');
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

function addMemesView()
{
		getMemes();

		################################# SI RAJOUT D'UN MEME ########################

	if (isset($_POST['contenu']) && !empty($_POST['contenu']))
	{
		$target_dir = "../../public/image/memes/";
		$target_file = $target_dir . basename($_FILES['fileselect']['name']);

		if (file_exists($target_file))
			{
				echo 'Nom de fichier image déjà existant dans la base de donnée.';
				require('../../view/backend/addMemesView.php');
			}
			else
			{
				move_uploaded_file($_FILES['fileselect']['tmp_name'], $target_file);
				echo 'IMAGE THEoRIQUEMENT ENREGISTRE';

				addMeme();
				require('../../view/backend/addMemesView.php');
				echo 'LE TEXTE ET IMAGE ONT ETE ENREGISTRE';
			}
	}

	################### SI EDITION D'UN MEME ############################

	elseif (isset($_POST['editContenu']) && !empty($_POST['editContenu'])) 
	{
		updateMeme();
		$editDone = TRUE;
		require('../../view/backend/addMemesView.php');
		echo 'CONTROLLER : CONSIGNE ENVOYEE POUR MODIF LE TEXTE VIA MODEL';
	}

##################### EDITION DE L'IMAGE #####################################

	elseif (isset($_FILES['fileselect']))
	{
		$target_dir = "../../public/image/memes/";
		$target_file = $target_dir . basename($_FILES['fileselect']['name']);
		if (file_exists($target_file))
		{
			#### Supprime ancien fichier pour le remplacer par le new ######
			echo 'Nom de fichier image déjà existant dans la base de donnée veuillez le renommer.';
			require('../../view/backend/addMemesView.php');
			echo 'CONTROLLER : CONSIGNE ENVOYEE POUR IMAGE VIA MODEL';
		}
		else
		{
			move_uploaded_file($_FILES['fileselect']['tmp_name'], $target_file);
			echo 'IMAGE THEoRIQUEMENT ENREGISTRE';
			updateImgMeme();
			require('../../view/backend/addMemesView.php');
			echo 'CONTROLLER : CONSIGNE ENVOYEE POUR IMAGE VIA MODEL';
		}
	}
	else 
	{
		require('../../view/backend/addMemesView.php');
		echo 'TEXTE OU IMAGE NON ENREGISTRE';
	}
}

// #################################ADD ARTICLE FDP#############################################

function addArticleFdpView()
{
		getArticlesFdp();

		################################# SI RAJOUT D'UN ARTICLE ########################

	if (isset($_POST['contenu']) && !empty($_POST['contenu']) && isset($_POST['titre']) && !empty($_POST['titre']))
	{
		$target_dir = "../../public/image/articleFdp/";
		$target_file = $target_dir . basename($_FILES['fileselect']['name']);

		if (file_exists($target_file))
			{
				echo 'Nom de fichier image déjà existant dans la base de donnée.';
				require('../../view/backend/addArticleFdpView.php');
			}
			else
			{
				move_uploaded_file($_FILES['fileselect']['tmp_name'], $target_file);
				addArticleFdp();
				require('../../view/backend/gestionPetitFdpView.php');
			}
	}

	################### SI EDITION D'UN ARTICLE ############################

	elseif (isset($_POST['editContenu']) && !empty($_POST['editContenu']) && isset($_POST['editTitre']) && !empty($_POST['editTitre'])) 
	{
		updateArticleFdp();
		$editDone = TRUE;
		require('../../view/backend/addArticleFdpView.php');
		echo 'CONTROLLER : CONSIGNE ENVOYEE POUR MODIF LE TEXTE VIA MODEL';
	}

##################### EDITION DE L'IMAGE #####################################

	elseif (isset($_FILES['fileselect']))
	{
		$target_dir = "../../public/image/articleFdp/";
		$target_file = $target_dir . basename($_FILES['fileselect']['name']);
		if (file_exists($target_file))
		{
			#### Supprime ancien fichier pour le remplacer par le new ######
			echo 'Nom de fichier image déjà existant dans la base de donnée veuillez le renommer.';
			require('../../view/backend/addArticleFdpView.php');
			echo 'CONTROLLER : CONSIGNE ENVOYEE POUR IMAGE VIA MODEL';
		}
		else
		{
			move_uploaded_file($_FILES['fileselect']['tmp_name'], $target_file);
			echo 'IMAGE THEoRIQUEMENT ENREGISTRE';
			updateImgArticleFdp();
			require('../../view/backend/addArticleFdpView.php');
			echo 'CONTROLLER : CONSIGNE ENVOYEE POUR IMAGE VIA MODEL';
		}
	}
	else 
	{
		require('../../view/backend/addArticleFdpView.php');
		echo 'TEXTE OU IMAGE NON ENREGISTRE';
	}
}

###########################################################################

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

function adminMemeView()
{
	getMemes();
	getComments();
	if (isset($_POST['supprimer']))
	{
		deleteMeme();
		require('../../view/backend/adminMemeView.php');
	}
	elseif (isset($_POST['publier']))
	{
		publierMeme();
		require('../../view/backend/adminMemeView.php');
	}
	elseif (isset($_POST['retirer']))
	{
		retirerMeme();
		require('../../view/backend/adminMemeView.php');
	}
	elseif (isset($_POST['publier_comment']))
	{
		publier_comment();
		require('../../view/backend/adminMemeView.php');
	}
	elseif (isset($_POST['supprimer_comment']))
	{
		supprimer_comment();
		require('../../view/backend/adminMemeView.php');
	}
	elseif (isset($_POST['retirer_comment']))
	{
		retirer_comment();
		require('../../view/backend/adminMemeView.php');
	}
	else
	{
		require('../../view/backend/adminMemeView.php');
	}
}

function adminArticleFdpView()
{
	getArticlesFdp();
	getCommentsFdp();
	if (isset($_POST['supprimer']))
	{
		deleteArticleFdp();
		require('../../view/backend/gestionPetitFdpView.php');
	}
	elseif (isset($_POST['publier']))
	{
		publierArticleFdp();
		require('../../view/backend/adminArticleFdpView.php');
	}
	elseif (isset($_POST['retirer']))
	{
		retirerArticleFdp();
		require('../../view/backend/adminArticleFdpView.php');
	}
	elseif (isset($_POST['publier_comment']))
	{
		publier_commentFdp();
		require('../../view/backend/adminArticleFdpView.php');
	}
	elseif (isset($_POST['supprimer_comment']))
	{
		supprimer_commentFdp();
		require('../../view/backend/adminArticleFdpView.php');
	}
	elseif (isset($_POST['retirer_comment']))
	{
		retirer_commentFdp();
		require('../../view/backend/adminArticleFdpView.php');
	}
	else
	{
		require('../../view/backend/adminArticleFdpView.php');
	}
}

/* PARTIE GESTIONS DES COMMENTAIRES */

function gestionCommentsView()
{
	$data = getNewComments();
	#getArticlesWithNewComments();
	if(isset($_POST['publier']))
	{
		publier_comment();
		require('../../view/backend/gestionCommentsView.php');
	}
	elseif(isset($_POST['supprimer']))
	{
		retirer_comment();
		require('../../view/backend/gestionCommentsView.php');
	}
	else
	{
		require('../../view/backend/gestionCommentsView.php');
	}
}