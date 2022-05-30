<?php
require "../controller/cardapioController.php";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/style.css">
	<title>Sistema Lanchonete</title>
</head>
<body>
    <div class="container-fluid">
        <form action="../controller/cardapioController.php" method="post">
            <input type="hidden" name="edicao">
            <input type="number" class="form-control" id="id" name="id"  hidden value=<?php $id = $_GET['id']; echo $id?>>
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
            <label for="descricao">Descricao</label>
            <input type="text" class="form-control" id="descricao" name="descricao">
            <label for="preco">Preco</label>
            <input type="text" class="form-control" id="preco" name="preco" >
            <button type="reset" class="btn btn-secondary"><a href="tabelaCardapio.php">Fechar</a></button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>


</html>