<?php

require('model/frontend/frontend.php');

function homeView()
{
	getArticles();
	require('view/frontend/public/allArticlesView.php');
}

function allArticlesView()
{
	getArticles();
	require('view/frontend/public/allArticlesView.php');
}

function articleView()
{
	getArticles();
	if (isset($_POST['new_comment']) && !empty($_POST['new_comment']))
	{
		add_comment();
		require('view/frontend/public/articleView.php');
	}
	else
	{
		require('view/frontend/public/articleView.php');
	}
	
}

function rulesView()
{
	require('view/frontend/public/rulesView.php');
}

function contactView()
{
	require('view/frontend/public/contactView.php');
}

function connectView()
{
	$login = "0";
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
        		require('view/frontend/public/allArticlesView.php');
        	}
        	else
        	{
        		$login = "erreur";
        		require('view/frontend/public/connectView.php');
        	}
	    }
		else 
		{
		    $login = "erreur";
		    require('view/frontend/public/connectView.php');
		}
	}
	else
	{
		require('view/frontend/public/connectView.php');
	}
}

function inscriptionView()
{
	$inscription = "0";
	$validInscription = "0";
	//Je m'asssure que les variables possèdent ou non des données
	if (isset($_POST['username'], $_POST['password'], $_POST['confirmPassword'], $_POST['email']))
	{

		$data = controlDbInscription();

		if (empty($_POST['username']))
		{
			$inscription = "erreur1";
			require('view/frontend/public/inscriptionView.php');
		}
		elseif (!preg_match("#^[a-zA-Z0-9]+$#", $_POST['username']))
		{
			$inscription = "erreur1";
			require('view/frontend/public/inscriptionView.php');
		}
		elseif (strlen($_POST['username']) > 25)
		{
			$inscription = "erreur1";
			require('view/frontend/public/inscriptionView.php');
		}
		elseif (empty($_POST['password']) || ($_POST['confirmPassword'] != $_POST['password']))
		{
			$inscription = "erreur2";
			require('view/frontend/public/inscriptionView.php');
			echo "erreur 2";
		}
		elseif (empty($_POST['email']))
		{
			require('view/frontend/public/inscriptionView.php');
			echo 'champ email vide.';
		}
		elseif (!preg_match("#^[a-z0-9._-]+@([a-z0-9]{2,}\.){1,2}[a-z]{2,4}$#", strtolower($_POST['email'])))
		{
			$inscription = "erreur3";
			require('view/frontend/public/inscriptionView.php');
		}
		elseif($data == TRUE)
		{
			$inscription = "erreur4";
			require('view/frontend/public/inscriptionView.php');
		}
		else
		{

			inscription();
			$validInscription = "correct";
			require('view/frontend/public/inscriptionView.php');
			
		}
	}
	else	
	{
		require('view/frontend/public/inscriptionView.php');
	}	
}

function activationView()
{
	$data = verifActivationAccount();
	$cle = $_GET['cle'];
	$clebdd = $data['cle'];
	$actif = $data['actif'];
	if($actif == '1')
	{
		echo "Votre compte est déjà actif";
		require('view/frontend/public/activationView.php');
	}
	else 
	{
		if($cle == $clebdd)
		{
			echo "Votre compte a bien été activé";
			activationAccount();
			require('view/frontend/public/activationView.php');
		}
		else
		{
			echo "Erreur, votre compte ne peut pas être activé";
			require('view/frontend/public/activationView.php');
		}
	}
}


// PAGE DE DECONNECTION
function disconnectView()
{
	session_destroy();
	$_SESSION = NULL;
	require('view/frontend/public/disconnectView.php');
}


function errorView()
{
	require('view/frontend/public/errorView.php');
}