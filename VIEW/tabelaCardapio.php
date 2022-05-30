<?php
require "modalCardapio.php";
require "../controller/cardapioController.php";
?>
<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<title>Sistema Lanchonete</title>
</head>
<body>
    <div class="container-fluid">
    <h1 class="d-flex justify-content-left">Cadastro de Cardapio</h1>
        <div>
            <table class="table table-striped table-hover">
                
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">idPrato</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descricao</th>
                        <th scope="col">Preco</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($objcli = $dadosCardapio->fetch_object()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $objcli->idPrato; ?></th>
                            <td><?php echo $objcli->tipo; ?></td>
                            <td><?php echo $objcli->nome; ?></td>
                            <td><?php echo $objcli->descricao; ?></td>
                            <td><?php echo $objcli->preco; ?></td>
                            <td> 
                            <a href="editarCardapio.php?id=<?php echo $objcli->idPrato ?>&acao=editar"><img src="../public/img/edit.png"></img></a>                                    
                            <a href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este cardapio? Todos os pedidos relacionados a ele serão deletados'))location.href='../controller/cardapioController.php?id=<?php echo $objcli->idPrato;?>&acao=excluir'"> <img src="../public/img/trash.png"></img></a>
                                    
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="#modalCardapio" data-toggle="modal" class="btn btn-md btn-outline-info"> Inserir </a>   
    <a href="#" class="btn btn-outline-danger">Voltar</a>



    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/scripts.js"></script>
</body>

</html>