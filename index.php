<?php
session_start();

require('controller/frontend/frontend.php');


if (isset($_GET['action']))
	if ($_GET['action'] == 'connexion')
	{
		connectView();
	}
	elseif ($_GET['action'] == 'inscription') 
	{
		inscriptionView();
	}
	elseif ($_GET['action'] == 'activation')
	{
		activationView();
	}
	elseif ($_GET['action'] == 'disconnect')
	{
		disconnectView();
	}
	elseif ($_GET['action'] == 'rules')
	{
		rulesView();
	}
	elseif ($_GET['action'] == 'contact')
	{
		contactView();
	}
	elseif ($_GET['action'] == 'articles')
	{
		allArticlesView();
	}
	elseif ($_GET['action'] == 'reinitmdp')
	{
		forgetPasswordView();
	}
	elseif ($_GET['action'] == 'changepassword')
	{
		newPasswordView();
	}
	elseif ($_GET['action'] == 'partenaires')
	{
		partenairesView();
	}
	else
	{
		errorView();
	}
elseif (isset($_GET['article_id']))
{
	articleView();
}
elseif (isset($_GET['memes_id']))
{
	memesView();
}
else 
{
	allArticlesView();
}
