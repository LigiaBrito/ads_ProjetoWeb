<?php
class Cardapio {
    private $idPrato;
    private $tipo;
    private $nome;
    private $descricao;
    private $preco;

    /**
     * Get the value of idPrato
     */ 
    public function getIdPrato()
    {
        return $this->idPrato;
    }

    /**
     * Set the value of idPrato
     *
     * @return  self
     */ 
    public function setIdPrato($idPrato)
    {
        $this->idPrato = $idPrato;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of preco
     */ 
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    public function listarTodos($conexao)
    {
        $sqlstring = "Select * from cardapio";
        $dados = $conexao->query($sqlstring);
        return $dados;
    }

    public function editarCardapio($conexao, $obj)
    {
        echo "Update cardapio set tipo = '$obj->tipo', nome = '$obj->nome', descricao = '$obj->descricao', preco = '$obj->preco' where idPrato = $obj->idPrato";
        $sqlstring = "Update cardapio set tipo = '$obj->tipo', nome = '$obj->nome', descricao = '$obj->descricao', preco = '$obj->preco' where idPrato = $obj->idPrato";
        if ($conexao->query($sqlstring))
            return true;
    }

    public function excluirCardapio($conexao, $id)
    {
        $sqlstring = "delete from cardapio where idPrato = $id";
        if ($conexao->query($sqlstring))
            return true;
    }

        public function inserirCardapio($conexao, $obj)
    {
        $sqlstring = "Insert into cardapio(idPrato, tipo, nome, descricao, preco) values
        (NULL, '$obj->tipo', '$obj->nome', '$obj->descricao','$obj->preco')";
        if ($conexao->query($sqlstring))
            return true;
    }
}
?>