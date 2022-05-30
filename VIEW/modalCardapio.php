<form action="../controller/cardapioController.php" method="post">
    <div class="modal fade" id="modalCardapio" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Cadastro de Cardapio </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="codigo" name="codigo">
                    <label>Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                    <label>Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                    <label>Preço</label>
                    <input type="text" class="form-control" id="preco" name="preco">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>