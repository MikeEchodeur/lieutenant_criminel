<?php

require('model/frontend/frontend.php');

function homeView()
{
	getArticles();
	require('view/frontend/homeView.php');
}

function allArticlesView()
{
	getArticles();
	require('view/frontend/allArticlesView.php');
}

function articleView()
{
	getArticles();
	if (isset($_POST['new_comment']) && !empty($_POST['new_comment']))
	{
		add_comment();
		require('view/frontend/articleView.php');
	}
	else
	{
		require('view/frontend/articleView.php');
	}
	
}

function rulesView()
{
	require('view/frontend/rulesView.php');
}

function contactView()
{
	require('view/frontend/contactView.php');
}

function connectView()
{
// Verification des password entrée et de la bdd pour connexion

	if (isset($_POST['username']) && !empty($_POST['username']))
	{
		$data = getUsername();
		if ($data != NULL && ($data['username'] == strtolower($_POST['username'])))
	    {
            if (password_verify($_POST['password'], $data['password']))
            {
        		// echo 'THEORIQUEMENT LA JE ME CONNECTE';
        		$_SESSION['id'] = $data['id'];
        		$_SESSION['username'] = $data['username'];
        		$_SESSION['groupe'] = $data['groupe'];
        		require('view/frontend/homeView.php');
        	}
        	else
        	{
        		echo 'T\'AS UN MAUVAIS MDP BATARD';
        		require('view/frontend/connectView.php');
        	}
	    }
		else 
		{
		    echo 'ENTRE UN BON USERNAME MONGOLE';
		    require('view/frontend/connectView.php');
		}
	}
	else
	{
		require('view/frontend/connectView.php');
	}
}

function inscriptionView()
{
	//Je m'asssure que les variables possède ou non des données
	if (isset($_POST['username'], $_POST['password'], $_POST['confirmPassword'], $_POST['email']))
	{

		$data = controlDbInscription();

		if (empty($_POST['username']))
		{
			require('view/frontend/inscriptionView.php');
			echo 'Champ du pseudo vide';
		}
		elseif (!preg_match("#^[a-zA-Z0-9]+$#", $_POST['username']))
		{
			require('view/frontend/inscriptionView.php');
			echo "Le pseudo doit êre renseigné sans caractère spéciaux";
		}
		elseif (strlen($_POST['username']) > 25)
		{
			require('view/frontend/inscriptionView.php');
			echo 'Pseudo trop long';
		}
		elseif (empty($_POST['password']) || ($_POST['confirmPassword'] != $_POST['password']))
		{
			require('view/frontend/inscriptionView.php');
			echo 'Erreur lors de la confirmation des mots de passes.';
		}
		elseif (empty($_POST['email']))
		{
			require('view/frontend/inscriptionView.php');
			echo 'champ email vide.';
		}
		elseif (!preg_match("#^[a-z0-9._-]+@([a-z0-9]{2,}\.){1,2}[a-z]{2,4}$#", strtolower($_POST['email'])))
		{
			require('view/frontend/inscriptionView.php');
			echo 'Email non valide';
		}
		elseif($data == TRUE)
		{
			require('view/frontend/inscriptionView.php');
			echo 'Pseudo ou email déjà utilisé pour un autre compte';
		}
		else
		{

			inscription();

			require('view/frontend/inscriptionView.php');
			echo 'INSCRIPTION VALIDEE';
		}
	}
	else	
	{
		require('view/frontend/inscriptionView.php');
	}	
}


// PAGE DE DECONNECTION
function disconnectView()
{
	session_destroy();
	$_SESSION = NULL;
	require('view/frontend/disconnectView.php');
}


function errorView()
{
	require('view/frontend/errorView.php');
}