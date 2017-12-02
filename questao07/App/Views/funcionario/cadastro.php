<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Funcioario</h3>
            
            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/funcionario/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Nome do funcionario" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <input type="text" class="form-control" name="empresa" placeholder="Nome da Empresa" value="<?php echo $Sessao::retornaValorFormulario('empresa'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="endereco" placeholder="Rua: Rodrigo Quitela, N:25" value="<?php echo $Sessao::retornaValorFormulario('endereco'); ?>" required>

                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" placeholder="Bairro Dona Clara" value="<?php echo $Sessao::retornaValorFormulario('bairro'); ?>" required>

                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" placeholder="Belo Horizonte" value="<?php echo $Sessao::retornaValorFormulario('cidade'); ?>" required>

                </div>


                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" name="estado" placeholder="Minas Gerais" value="<?php echo $Sessao::retornaValorFormulario('estado'); ?>" required>

                </div>


                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>