<?php

namespace App\Models\DAO;

use App\Models\Entidades\Funcionario;
// Esta classe inclui os dados na Query
class FuncionarioDAO extends BaseDAO
{
    public  function listar($id = null)
    {
        if($id) {
            $resultado = $this->select(
                "SELECT * FROM funcionarios WHERE id = $id"
            );

            return $resultado->fetchObject(Funcionario::class);
        }else{
            $resultado = $this->select(
                'SELECT * FROM funcionarios'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Funcionario::class);
        }

        return false;
    }

    public  function salvar(Funcionario $funcionario) 
    {
        try {

           
            $nome        = $funcionario->getNome();
            $empresa     = $funcionario->getEmpresa();
            $endereco    = $funcionario->getEndereco();
            $bairro      = $funcionario->getBairro();
            $cidade      = $funcionario->getCidade();
            $estado      = $funcionario->getEstado();
            


            return $this->insert(
                'funcionarios',
                ":nome,:empresa,:endereco,:bairro,:cidade,:estado",
                [
                    ':nome'=>$nome,
                    ':empresa'=>$empresa,
                    ':endereco'=>$endereco,
                    ':bairro'=>$bairro,
                    ':cidade'=>$cidade,
                    ':estado'=>$estado
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public  function atualizar(Funcionario $funcionario) 
    {
        try {

            $id          = $funcionario->getId();
            $nome        = $funcionario->getNome();
            $empresa     = $funcionario->getEmpresa();
            $endereco    = $funcionario->getEndereco();
            $bairro      = $funcionario->getBairro();
            $cidade      = $funcionario->getCidade();
            $estado      = $funcionario->getEstado();
            

            return $this->update(
                'funcionarios',
                "nome = :nome, empresa=:empresa, endereco = :endereco, bairro = :bairro, cidade = :cidade, estado = :estado",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    ':empresa'=>$empresa,
                    ':endereco'=>$endereco,
                    ':bairro'=>$bairro,
                    ':cidade'=>$cidade,
                    ':estado'=>$estado
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Funcionario $funcionario)
    {
        try {
            $id = $funcionario->getId();

            return $this->delete('funcionario',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}