<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\FuncionarioDAO;
use App\Models\Entidades\Funcionario;
use App\Models\Validacao\FuncionarioValidador;
// Classe de controle da aplicação
/* A aplicção trabalha com sessoes, é os dados cada sessão ficam armazenado.
a cada nova sessão algums dados da sessão anterior são apagados.
*/
class FuncionarioController extends Controller
{

    // Este metodo lista todos os funcionarios cadastrados.
    public function index()
    {
        $funcionarioDAO = new FuncionarioDAO();

        self::setViewParam('listaFuncionarios',$funcionarioDAO->listar());

        $this->render('/funcionario/index');

        // limpar mensagem da sessão
        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/funcionario/cadastro');

         // limpar dados de formulario, mensagem, e erro.
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    //salva informações
    public function salvar()
    {
        $Funcionario = new Funcionario();
        $Funcionario->setNome($_POST['nome']);
        $Funcionario->setEmpresa($_POST['empresa']);
        $Funcionario->setEndereco($_POST['endereco']);
        $Funcionario->setBairro($_POST['bairro']);
        $Funcionario->setCidade($_POST['cidade']);
        $Funcionario->setEstado($_POST['estado']);
        

         // grava os dados para serem usados em uma sessão futura. Assim na proxima sassão não precesa de digita os dados novamente
        Sessao::gravaFormulario($_POST);

        // validação de dados no Backend
        $FuncionarioValidador = new FuncionarioValidador();
        $resultadoValidacao = $FuncionarioValidador->validar($Funcionario);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/funcionario/cadastro');
        }

        $funcionarioDAO = new FuncionarioDAO();

        //salva no banco
        $funcionarioDAO->salvar($Funcionario);
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/funcionario');
      
    }
    //controle da tela de edição
    public function edicao($params)
    {
        $id = $params[0];

        $funcionarioDAO = new FuncionarioDAO();

        $funcionario = $funcionarioDAO->listar($id);

        if(!$funcionario){
            Sessao::gravaMensagem("Funcionario inexistente");
            $this->redirect('/funcionario');
        }

        self::setViewParam('funcionario',$funcionario);

        $this->render('/funcionario/editar');

        Sessao::limpaMensagem();

    }

    // Udpate de informação
    public function atualizar()
    {

        $Funcionario = new Funcionario();
        $Funcionario->setId($_POST['id']);
        $Funcionario->setNome($_POST['nome']);
        $Funcionario->setEmpresa($_POST['empresa']);
        $Funcionario->setEndereco($_POST['endereco']);
        $Funcionario->setBairro($_POST['bairro']);
        $Funcionario->setCidade($_POST['cidade']);
        $Funcionario->setEstado($_POST['estado']);

        Sessao::gravaFormulario($_POST);

        $funcionarioValidador = new FuncionarioValidador();
        $resultadoValidacao = $funcionarioValidador->validar($Funcionario);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/funcionario/edicao/'.$_POST['id']);
        }

        $funcionarioDAO = new FuncionarioDAO();

        $funcionarioDAO->atualizar($Funcionario);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/funcionario');

    }
    // controle da view exclussão
    public function exclusao($params)
    {
        $id = $params[0];

        $funcionarioDAO = new FuncionarioDAO();

        $funcionario= $funcionarioDAO->listar($id);

        if(!$funcionario){
            Sessao::gravaMensagem("Funcionario  inexistente");
            $this->redirect('/funcionario');
        }

        self::setViewParam('funcionario',$funcionario);

        $this->render('/funcionario/exclusao');

        Sessao::limpaMensagem();

    }

    // excluir usuario
    public function excluir()
    {
        $Funcionario = new Funcionario();
        $Funcionario->setId($_POST['id']);

        $funcionarioDAO = new FuncionarioDAO();

        if(!$funcionarioDAO->excluir($Funcionario)){
            Sessao::gravaMensagem("Funcionario inexistente");
            $this->redirect('/Funcionario');
        }

        Sessao::gravaMensagem("Funcionario excluido com sucesso!");

        $this->redirect('/Funcionario');

    }
}