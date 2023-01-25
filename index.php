<?php

include_once('connection.php');


$result = $conn->query("SELECT * FROM users ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <a href="adicionar.html">Cadastrar Usuário</a>
    <table class="table table-striped table-hover">

        <thead>

            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Idade</th>
            <th scope="col">Email</th>
            <th scope="col">Cidade</th>
            <th scope="col">Data</th>
            <th scope="col">Update | Delete</th>
        </thead>
        <?php
       
         while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['idade']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['cidade']."</td>";
            echo "<td>".$row['dataAtual']."</td>";
            echo "<td><a href=\"edit.php?id=$row[id]\">Update</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}     echo "</tr>";
	?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>


</table>
</body>

</html>