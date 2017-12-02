<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">Easy To Learn - E2L</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if($viewVar['nameController'] == "HomeController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>" >Home</a>
                </li>
                <li <?php if($viewVar['nameController'] == "FuncionarioController" && ($viewVar['nameAction'] == "" || $viewVar['nameAction'] == "index")) { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/funcionario" >Lista de Funcionario</a>
                </li>
                <li <?php if($viewVar['nameController'] == "FuncionarioController" && $viewVar['nameAction'] == "cadastro") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/funcionario/cadastro" >Cadastro de Funcionario</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


