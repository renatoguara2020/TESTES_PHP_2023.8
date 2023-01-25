<?php 

include_once('connection.php');

 if(isset($_POST['Update'])){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];

if(empty($nome) || empty($email) || empty($cidade) || empty($idade)){

    if(!isset($nome)){

        echo '<div class="alert alert-danger"> Digite seu nome </div>';
    }
    if(!isset($email)){

        echo '<div class="alert alert-danger"> Digite seu Email</div>';
    }

    if(!isset($idade)){

        echo '<div class="alert alert-danger">Digite a sua Idade</div>';
    }

    if(!isset($cidade)){

        echo '<div class="alert alert-danger"> Digite sua Cidade</div>';
    }

}else{

    $stmt = $conn->prepare("UPDATE users SET nome=:nome, email=:email,idade=:idade,cidade=:cidade WHERE id=:id");
     

    

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade);
    $stmt->execute();

    header("Location: http://localhost/testes_php_2023/index.php");
}
 }



?>


<?php



$id = $_GET['id'];

$stmt  =  $conn->prepare("SELECT  * FROM users WHERE id=:id");

$stmt->execute(array(':id' => $id));

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

   $nome = $row["nome"];
   $idade = $row["idade"];
   $email = $row["email"];
   $cidade = $row["cidade"];
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Document</title>
</head>

<body>

    <form action="edit.php" method="post">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>"
            placeholder="Digite seu Nome" />
        <label class="form-label">Email:</label>
        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>"
            placeholder="Digite seu Email" />
        <label class="form-label">Idade</label>
        <input type="text" name="idade" class="form-control" value="<?php echo $idade; ?>"
            placeholder="Digite seu Idade" />
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>"
            placeholder="Digite sua cidade" />

        <!-- <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /> -->

        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>

        <input type="submit" name="Update" value="Adicionar" class="btn btn-warning" />
    </form>
</body>

</html>


<!-- echo "<a href=\"edit.php?id=$row[id]\">Update</a> | <a href=\"delete.php?id=$row[id]\">Delete</a>";
<a href="delete.php?id=$row['id']">Delete</a>
<a href="edit.php?id=$row['id']">Update</a>

$sql = "INSERT INTO users () VALUES ()"; -->