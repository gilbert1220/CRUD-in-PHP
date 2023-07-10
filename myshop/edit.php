<?php

    include('db_connect.php');

    $id = $name = $email = $phone = '';

    $errorMessage ="";
    $successMessage ="";

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        // Get method : Show the data of the client
        if (!isset($_GET["id"])){
            header('Location: index.php');
            exit;
        }
        $id = $_GET["id"];
        // read the row of the selected client from database table
        $sql = "SELECT * FROM clients WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        if (!$row){
            header('Location: index.php');
            exit;
        }

        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];

    } else {
        // POST method: Update the data of the client
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        do{

            // if (empty($id) || empty($name) || empty($email) || empty($phone)){
            //     $erroMessage = "All fields are required";
            //     break;
            // }
    
                $sql = "UPDATE clients SET name = '$name', email = '$email', phone = '$phone' WHERE id = $id";
                $result = $conn->query($sql);
    
                if (!$result){
                    $erroMessage = "Invalid query: " . $conn->error;
                }

                // $successMessage = "CLient update Sccuessfuly";
                header("Location: index.php");
                exit;
    
        } while (true);
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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="flex flex-row py-2">
                <label class="mr-2">Name</label>
                <div>
                    <input type="text" name="name" value="<?php echo $name ?>">
                    <!-- <div class="text-red-700 text-xs"></div> -->
                </div>
            </div>
            <div class="flex flex-row py-2">
                <label class="mr-2">Email</label>
                <div>
                    <input type="text" name="email" value="<?php echo $email ?>">
                    <!-- <div class="text-red-700 text-xs"></div> -->
                </div>
            </div>
            <div class="flex flex-row py-2">
                <label class="mr-2">Phone</label>
                <div>
                    <input type="text" name="phone" value="<?php echo $phone ?>">
                    <!-- <div class="text-red-700 text-xs"></div> -->
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