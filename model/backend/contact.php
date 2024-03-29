<?php

    $array = array("username" => "", "email" => "", "phone" => "", "website" => "", "sujet" => "", "message_contact" => "","usernameError" => "", "emailError" => "", "phoneError" => "", "websiteError" => "","sujetError" => "","message_contactError" => "", "isSuccess" => false);
    $emailTo = "lieutenant.criminel@yahoo.com";


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
            $array["usernameError"] = "Aide toi de ta bande patro !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText = "Nom : {$array['username']}\n";
        }

        if(!isEmail($array["email"])) 
        {
            $array["emailError"] = "Le truc avec un @ où tu reçois AIDDA !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText = "Email: {$array['email']}\n";
        }

        if (!isPhone($array["phone"]))
        {
            $array["phoneError"] = "Que des chiffres et des espaces"; 
        }
        else
        {
            $emailText = "Telephone: {$array['phone']}\n";
        }
        
        if (!isWebsite($array["website"]))
        {
            $array["websiteError"] = "Un site commence par http(s) !";
        }
        else
        {
        $emailText = "Site Web: {$array['website']}\n";
        }

        if (empty($array["sujet"]))
        {
            $array["sujetError"] = "Sélectionne un sujet";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailSujet = "{$array['sujet']}\n";
        }

        switch ($array["sujet"]) {
        case "PUB":
            $emailTo = "mikeecho.contact@gmail.com";
        
            break;
        case "EVASAN":
            $emailTo = "mikeecho.evasan@gmail.com";
            break;
        default:
            break;
        }

        if (empty($array["message_contact"]))
        {
            $array["message_contactError"] = "Qu'est-ce que tu veux me dire ?";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText = "Message: {$array['message_contact']}\n";
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
 
?>


