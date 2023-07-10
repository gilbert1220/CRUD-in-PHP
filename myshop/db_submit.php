<?php
if(isset($_POST['submit'])) {
        
        //check title
        if(empty($_POST['name'])){
            $errors['name'] = 'An title is required <br />';
        } else {
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] ='Title must be letters and space only';
            }
        }

        //check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        //check size
        if(empty($_POST['phone'])){
            $errors['phone'] = 'Shoe size is required <br />';
        } else {
            $phone = $_POST['phone'];
            if(!preg_match('/^[0-9.+]+$/', $phone)){
                $errors['phone'] = 'The phone number must be numbers only';
            }
        }
    }    

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex flex-row space-x-[10rem]">
        <div class="bg-green-500 w-[10rem] h-[10rem]">sample</div>
        <div class="bg-red-500 h-[10rem] w-[10rem]"></div>
    </div>  
</body>
</html> -->