<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex flex-row justify-center space-x-[30rem] pt-[3rem]">
        <h2 class="">List of Clients</h2>
        <a href="create.php">
            <button class="bg-blue-300 p-[0.2rem] rounded-lg">New Client</button>
        </a>
    </div>
    <br>
    <div class="flex justify-center">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('db_connect.php');

                    $sql = "SELECT * FROM clients";
                    $result = $conn->query($sql);

                    if(!$result){
                        die ('Invalid query:' . $conn->error);
                    }

                    // read the data of each row
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td class='p-3 px-3'>$row[id]</td>
                            <td class='p-2'>$row[name]</td>
                            <td class='p-2'>$row[email]</td>
                            <td class='p-2'>$row[phone]</td>
                            <td class='p-2'>$row[created_at]</td>
                            <td>
                                <a href='edit.php?id=$row[id]'>
                                    <button class='bg-blue-500'>Edit</button>
                                </a>

                                <a href='delete.php?id=$row[id]'>
                                    <button class='bg-red-500'>Delete</button>
                                </a>
                            </td>
                        </tr>
                            ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}

th, td {
  background-color: #E1ECC8;
}
</style>