<?php
session_start();

require('../../controller/backend/backend.php');

if (isset($_GET['action']))
{
	if ($_GET['action'] == 'articles')
	{
		gestionArticlesView();
	}
	elseif ($_GET['action'] == 'addArticles')
	{
		addArticlesView();
	}
		else
	{
		adminView();
	}
}
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