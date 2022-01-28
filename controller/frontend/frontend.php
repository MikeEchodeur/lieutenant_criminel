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
        		echo 'Mauvais mot de passe';
        		require('view/frontend/public/connectView.php');
        	}
	    }
		else 
		{
		    echo 'Entrez un surnom valide';
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
	//Je m'asssure que les variables possèdent ou non des données
	if (isset($_POST['username'], $_POST['password'], $_POST['confirmPassword'], $_POST['email']))
	{

		$data = controlDbInscription();

		if (empty($_POST['username']))
		{
			require('view/frontend/public/inscriptionView.php');
			echo 'Champ du pseudo vide';
		}
		elseif (!preg_match("#^[a-zA-Z0-9]+$#", $_POST['username']))
		{
			require('view/frontend/public/inscriptionView.php');
			echo "Le pseudo doit êre renseigné sans caractère spéciaux";
		}
		elseif (strlen($_POST['username']) > 25)
		{
			require('view/frontend/public/inscriptionView.php');
			echo 'Pseudo trop long';
		}
		elseif (empty($_POST['password']) || ($_POST['confirmPassword'] != $_POST['password']))
		{
			require('view/frontend/public/inscriptionView.php');
			echo 'Erreur lors de la confirmation des mots de passes.';
		}
		elseif (empty($_POST['email']))
		{
			require('view/frontend/public/inscriptionView.php');
			echo 'champ email vide.';
		}
		elseif (!preg_match("#^[a-z0-9._-]+@([a-z0-9]{2,}\.){1,2}[a-z]{2,4}$#", strtolower($_POST['email'])))
		{
			require('view/frontend/public/inscriptionView.php');
			echo 'Email non valide';
		}
		elseif($data == TRUE)
		{
			require('view/frontend/public/inscriptionView.php');
			echo 'Pseudo ou email déjà utilisé pour un autre compte';
		}
		else
		{

			inscription();

			require('view/frontend/public/inscriptionView.php');
			echo 'INSCRIPTION VALIDEE';
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