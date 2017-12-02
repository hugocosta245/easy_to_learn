<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar dados do funcionario</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/funcionario/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['funcionario']->getId(); ?>">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $viewVar['funcionario']->getNome(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <input type="text"  class="form-control"  name="empresa" id="empresa" placeholder="" value="<?php echo $viewVar['funcionario']->getEmpresa(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text"  class="form-control"  name="endereco" id="endereco" placeholder="" value="<?php echo $viewVar['funcionario']->getEndereco(); ?>" required>
                </div>               
                

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text"  class="form-control"  name="bairro" id="bairro" placeholder="" value="<?php echo $viewVar['funcionario']->getBairro(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text"  class="form-control"  name="cidade" id="cidade" placeholder="" value="<?php echo $viewVar['funcionario']->getCidade(); ?>" required>
                </div>


                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text"  class="form-control"  name="estado" id="estado" placeholder="" value="<?php echo $viewVar['funcionario']->getEstado(); ?>" required>
                </div>




                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/cliente" class="btn btn-info btn-sm">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
