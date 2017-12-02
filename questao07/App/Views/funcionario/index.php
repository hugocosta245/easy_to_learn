<div class="container">
    <div class="row">
    <br>
    <div class="col-md-12">
        <a href="http://<?php echo APP_HOST; ?>/funcionario/cadastro" class="btn btn-success btn-sm">Adicionar</a>
        <hr>
    </div>
    <div class="col-md-12">
        <?php if($Sessao::retornaMensagem()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
        <?php } ?>

        <?php 
            if(!count($viewVar['listaFuncionarios'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum funcionario encontrado.</div>
        <?php
            } else {
        ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        
                        <td class="info">Nome</td>
                        <td class="info">Empresa</td>
                        <td class="info">Endereço</td>
                        <td class="info">Bairro</td>
                        <td class="info">Cidade</td>
                        <td class="info">Estado</td>
                        <td class="info">Ações</td>
                    </tr>
                    <?php
                        foreach($viewVar['listaFuncionarios'] as $funcionario) {
                    ?>
                        <tr>
                            <td><?php echo $funcionario->getNome(); ?></td>
                            <td><?php echo $funcionario->getEmpresa(); ?></td>
                            <td><?php echo $funcionario->getEndereco(); ?></td>
                            <td><?php echo $funcionario->getBairro(); ?></td>
                            <td><?php echo $funcionario->getCidade(); ?></td>  
                            <td><?php echo $funcionario->getEstado(); ?></td>  


                            
                            <td>
                                <a href="http://<?php echo APP_HOST; ?>/funcionario/edicao/<?php echo $funcionario->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/funcionario/exclusao/<?php echo $funcionario->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        <?php
            }
        ?>
    </div>
</div>
</div>