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
	else
	{
		errorView();
	}
elseif (isset($_GET['article_id']))
{
	articleView();
}
else 
{
	homeView();
}
