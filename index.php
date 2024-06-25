<?php
// cheack method
if($_SERVER['REQUEST_METHOD']=='POST'){
// ASSIGN VALUE
 
$username=filter_var( $_POST['username'],FILTER_SANITIZE_STRING);
$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$cellphone=filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
$msg=filter_var($_POST['msg'],FILTER_SANITIZE_STRING);

// cheack errors
$errors=array();
if(strlen($username)<2){

$errors[]='the user name must be grater than 2';
    
}
if(strlen($cellphone)!=11){

$errors[]='the cellphone must be equal than 11';
    
}
if(strlen($email)<2){

$errors[]='the email must be grater than 2';
    
}
}
// if no errors send email [mail(to,subject,msg,headers,parematers)]
$myemail='allambadalla@gmail.com';
$sub='contact form';
$headers='From: ' . $email .'\r\n';
if(empty($errors)){
mail($myemail,$sub,$msg,$headers);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,800;1,800&display=swap" rel="stylesheet"> <title>Document</title>
</head>
<body>
    
<!-- start form -->
<div class="container">
    <h1 class="text-center">CONTACT ME</h1>

<form class="contact-form" action="<?=$_SERVER['PHP_SELF']?>" method="POST" >



        <?php
        if(! empty($errors)){?>
        <div class="alert alert-danger alert-dismissible" role="start" >
    <button type="button" class="close" data-dismiss="alert" arial-lable="close">
        <span aria-hidden="true">&times;</span>

    </button>
        <?php
            foreach($errors as $error){
                echo $error.'<br>';

            }?>
            
            </div>
            <?php

        }
        
        
        ?>

    <input class="form-control" type="text" name="username"  placeholder="user name!" value="<?php if(isset($username)){echo $username;} ?>">
    <i class="fa fa-user fa-fw"></i>
    <input class="form-control" type="email" name="email"  placeholder="email!" value="<?php if(isset($email)){echo $email;} ?>">
    <i class="fa fa-envelope fa-fw"></i>
    <input class="form-control" type="text" name="cellphone"  placeholder="number!" value="<?php if(isset($cellphone)){echo $cellphone;} ?>">
    <i class="fa fa-phone fa-fw"></i>
    <textarea class="form-control" name="msg" placeholder="your message!" value="<?php if(isset($msg)){echo $msg;} ?>"></textarea>
    
    <input class="btn btn-success btn-block" type="submit" value="send message">
    <i class="fa fa-paper-plane fa-fw send-icon"></i>



</form>

</div>





<!-- end form -->

<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>