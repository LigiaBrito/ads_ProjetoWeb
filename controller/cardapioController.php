<?php
require "../model/conexao.php";
require "../model/cardapio.php"; 
header('Content-Type: text/html; charset=utf-8');
// // Parte para adicionar cardapio
$idPrato = isset($_POST['id']) ? $_POST['id'] : "";
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
$preco = isset($_POST['preco']) ? $_POST['preco'] : "";

$objCardapio = new Cardapio();
$objCardapio->setIdPrato($idPrato);
$objCardapio->setTipo($tipo);
$objCardapio->setNome($nome);
$objCardapio->setDescricao($descricao);
$objCardapio->setPreco($preco);

$dadosCardapio = $objCardapio->listarTodos($conexao);


if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $acao = $_GET['acao'];
    if ($acao == 'excluir') {
        if ($objCardapio->excluirCardapio($conexao, $id)){
            header("location:../view/tabelaCardapio.php");
        }
    } elseif ($acao == 'editar') {
                $edicao = true;
    }
} elseif (isset($_POST['edicao'])) {
        if ($objCardapio->editarCardapio($conexao, $objCardapio))
            header("location:../view/tabelaCardapio.php");
        else
            echo "Erro ao inserir!";
} elseif (isset($_POST['codigo'])) {
        if ($objCardapio->inserirCardapio($conexao, $objCardapio))
            header("Refresh:0;url=../view/tabelaCardapio.php");
        else
            echo "Erro ao inserir!";
}
    


// // Parte do Post
// $objLanche->setId($id);
// $objLanche->setNome($nome);
// $objLanche->setDescricao($descricao);
// $objLanche->setPreco($preco);

// $dadosL = $objLanche->listarTodos($conexao);

// if (isset($_GET['id'])) {

//     $id = $_GET['id'];
//     $acao = $_GET['acao'];

//     if ($acao == 'excluir') {
//         if ($objLanche->excluirLanche($conexao, $id))
//             header("location:../view/tabelaLanches.php");
//     } elseif ($acao == 'editar') {
//         $dadosid = $objLanche->listarPorID($conexao, $id);
//         while ($dadosLanche = $dadosid->fetch_object()) {
//             $id = $dadosLanche->id;
//             $nome = $dadosLanche->nome;
//             $descricao = $dadosLanche->descricao;
//             $preco = $dadosLanche->preco;
//             $edicao = true;
//         }
//     }
// } elseif (isset($_POST['edicao'])) {
//     if ($objLanche->editarLanche($conexao, $objLanche))
//         header("location:../view/index.php");
//     else
//         echo "Erro ao inserir!";
// } elseif (isset($_POST['codigo'])) {
//     if ($objLanche->inserirLanche($conexao, $objLanche))
//         header("Refresh:0;url=../view/index.php");
//     else
//         echo "Erro ao inserir!";
// }
