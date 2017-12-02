<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Funcionario;

// classe de validação do Backend
class FuncionarioValidador{

    public function validar(Funcionario $funcionario)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($funcionario->getNome()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }
        
        if(empty($funcionario->getEmpresa()))
        {
            $resultadoValidacao->addErro('empresa',"Empresa: Este campo não pode ser vazio");
        }

        if(empty($funcionario->getEndereco()))
        {
            $resultadoValidacao->addErro('endereco',"Endereço: Este campo não pode ser vazio");
        }

        if(empty($funcionario->getBairro()))
        {
            $resultadoValidacao->addErro('bairro',"Bairro: Este campo não pode ser vazio");
        }

        if(empty($funcionario->getCidade()))
        {
            $resultadoValidacao->addErro('cidade',"Cidade: Este campo não pode ser vazio");
        }


        if(empty($funcionario->getEstado()))
        {
            $resultadoValidacao->addErro('estado',"Estado: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}