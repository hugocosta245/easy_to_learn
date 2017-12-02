<?php

namespace App\Models\Validacao;
// casso ocorra erro na validação do Back end esta classe armazena e retorna o erro com o nome do camo
class ResultadoValidacao{

    private $erros = [];
    
    public function addErro($campo, $mensagem){
        $this->erros[$campo] = $mensagem;
    }

    public function getErros(){
        return $this->erros;
    }

}