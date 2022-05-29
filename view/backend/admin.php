<?php
session_start();

require('../../controller/backend/backend.php');

if (isset($_GET['action']))
{
	if ($_GET['action'] == 'articles')
	{
		gestionArticlesView();
	}
	elseif ($_GET['action'] == 'memes')
	{
		gestionMemesView();
	}
	elseif ($_GET['action'] == 'addArticles')
	{
		addArticlesView();
	}
		elseif ($_GET['action'] == 'addMemes')
	{
		addMemesView();
	}
	else
	{
		adminView();
	}
}
// ########################### EDIT / PUBLIE ETC ARTICLES ###############################
elseif (isset($_GET['edit_article_id']))
{
	if (isset($_POST['publier']))
	{
		adminArticleView();
	}
	elseif (isset($_POST['editer']))
	{
		addArticlesView();
	}
	elseif (isset($_POST['update']) || isset($_POST['updateImg']))
	{
		addArticlesView();
	}
	elseif (isset($_POST['supprimer']))
	{
		adminArticleView();
	}
	elseif (isset($_POST['retirer']))
	{
		adminArticleView();
	}
	elseif (isset($_POST['publier_comment']))
	{
		adminArticleView();
	}
	else
	{
		adminArticleView();
	}
}

// ##############################  EDIT / PUBLIE ETC MEMES ###############################
elseif (isset($_GET['edit_meme_id']))
{
	if (isset($_POST['publier']))
	{
		adminMemeView();
	}
	elseif (isset($_POST['editer']))
	{
		addMemesView();
	}
	elseif (isset($_POST['update']) || isset($_POST['updateImg']))
	{
		addMemesView();
	}
	elseif (isset($_POST['supprimer']))
	{
		adminMemeView();
	}
	elseif (isset($_POST['retirer']))
	{
		adminMemeView();
	}
	elseif (isset($_POST['publier_comment']))
	{
		adminMemeView();
	}
	else
	{
		adminMemeView();
	}
}

############################ Commentaire ########################
elseif (isset($_GET['gestion_comments']))
{
	if (isset($_POST['publier']))
	{
		gestionCommentsView();
	}
	elseif (isset($_POST['supprimer']))
	{
		gestionCommentsView();
	}
	else
	{
		gestionCommentsView();
	}
}
else  
{
	adminView();
}