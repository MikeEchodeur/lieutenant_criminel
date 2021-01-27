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
################################ PARTIE FORM MAIL #############################

$array = array("username" => "", "email" => "", "phone" => "", "website" => "", "sujet" => "", "message_contact" => "","usernameError" => "", "emailError" => "", "phoneError" => "", "websiteError" => "","sujetError" => "","message_contactError" => "", "isSuccess" => false);
    $emailTo = "tristancien@live.fr";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["username"] = test_input($_POST["username"]);
        $array["email"] = test_input($_POST["email"]);
        $array["phone"] = test_input($_POST["phone"]);
        $array["website"] = test_input($_POST["website"]);
        $array["sujet"] = test_input($_POST["sujet"]);
        $array["message_contact"] = test_input($_POST["message_contact"]);
        $array["isSuccess"] = true; 
        $emailText = "";
        $emailSujet = "Formulaire Contact - ";

        if (empty($array["username"]))
        {
            $array["usernameError"] = "Et oui je veux tout savoir. Même ton nom !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Nom : {$array['username']}\n";
        }

        if(!isEmail($array["email"])) 
        {
            $array["emailError"] = "T'essaies de me rouler ? C'est pas un email ça  !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Email: {$array['email']}\n";
        }

        if (!isPhone($array["phone"]))
        {
            $array["phoneError"] = "Que des chiffres et des espaces, stp...";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Telephone: {$array['phone']}\n";
        }
        
        if (!isWebsite($array["website"]))
        {
            $array["websiteError"] = "Un vrai site stp";
            $array["isSuccess"] = false; 
        }
        else
        {
        $emailText .= "Site Web: {$array['website']}\n";
        }
        
        if (empty($array["sujet"]))
        {
            $array["sujetError"] = "Sélectionne un sujet";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailSujet .= "{$array['sujet']}\n";
        }

        if (empty($array["message_contact"]))
        {
            $array["message_contactError"] = "Qu'est-ce que tu veux me dire ?";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Message: {$array['message_contact']}\n";
        }
        
        if($array["isSuccess"]) 
        {
            $headers = "From: {$array['username']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, $emailSujet, $emailText, $headers);
        }
        
        echo json_encode($array);
        
    }

    function isEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function isPhone($phone) 
    {
        return preg_match("/^[0-9 ]*$/",$phone);
    }
    function isWebsite($website) 
    {
        return filter_var($website, FILTER_VALIDATE_URL);
    }
    
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
    function test_input_url($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
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

############################# ARTICLE SUR GESTION ADMIN VIEW ###############################

function getArticles()
{
	$db = dbConnect();
	$req = $db->query('SELECT id, image, titre, contenu, statut, DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM articles ORDER BY date_creation DESC');
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
	$req = $db->prepare('SELECT id, auteur, comment, statut, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS date_comments_fr FROM comments WHERE id_article = ? ORDER BY date_comment');
	$req->execute(array($_GET['edit_article_id']));

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
			$db = new PDO('mysql:host=localhost;dbname=ruqz3084_lc;charset=utf8', 'ruqz3084', '56zqSJbk9ECA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
}