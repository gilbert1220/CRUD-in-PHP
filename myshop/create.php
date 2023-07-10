<?php

    include('db_connect.php');

    $name = $email = $phone = '';
    $errors = array('name' => '', 'email' => '', 'phone' => '');

    if(isset($_POST['submit'])) {
        
        //check the name
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

        //check phone
        if(empty($_POST['phone'])){
            $errors['phone'] = 'Shoe size is required <br />';
        } else {
            $phone = $_POST['phone'];
            if(!preg_match('/^[0-9.+]+$/', $phone)){
                $errors['phone'] = 'The phone number must be numbers only';
            }
        }

        //checking errors
        if(array_filter($errors)){

        } else{

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);

            //create sql
            $sql = "INSERT INTO clients(name, email, phone) VALUES ('$name', '$email', '$phone')";

            //save to the db
            if(mysqli_query($conn, $sql)){
                //success
                header('Location: index.php');
            } else {
                // error
                echo 'query error:' . mysqli_error($conn);
            }
        }
    }    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="con flex flex-col items-center my-5">
        <h2 class="py-[3rem]">New Client</h2>
        <form method="POST" class="flex flex-col bg-gray-300 w-fit p-5 border">
            <div class="flex flex-row py-2">
                <label class="mr-2">Name</label>
                <div>
                    <input type="text" name="name" value="<?php echo $name ?>">
                    <div class="text-red-700 text-xs"><?php echo $errors['name']; ?></div>
                </div>
            </div>
            <div class="flex flex-row py-2">
                <label class="mr-2">Email</label>
                <div>
                    <input type="text" name="email" value="<?php echo $email ?>">
                    <div class="text-red-700 text-xs"><?php echo $errors['email']; ?></div>
                </div>
            </div>
            <div class="flex flex-row py-2">
                <label class="mr-2">Phone</label>
                <div>
                    <input type="text" name="phone" value="<?php echo $phone ?>">
                    <div class="text-red-700 text-xs"><?php echo $errors['phone']; ?></div>
                </div>
            </div>
            <div class="flex flex-row justify-between mx-[2rem]">
                <div class="">
                    <button name="submit">Submit</button>
                </div>
                <div class="">
                    <a href="index.php" class="btn">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>
</html>