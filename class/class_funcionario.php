<?php

include "class_connect.php";


class Funcionario extends Conexao{

    private $id = null;
    private $nome;
    private $cargo;
    private $departamento;
    
    


    /*public function __construct($nome, $cargo, $departamento)
    {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->departamento = $departamento;
    }*/


    //GET
    public function getID(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCargo(){
        return $this->cargo;
    }

    public function getDepartamento(){
        return $this->departamento;
    }

    //SET
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setCargo($cargo){
        $this->cargo = $cargo;
    }

    public function setDepartamento($departamento){
        $this->departamento = $departamento;
    }

    //Create

    public function createFunc($nome, $cargo, $dep){


        try{

            $query = 'INSERT INTO funcionario values (null,:nome,:cargo,:departamento)';

            $stmt = $this->connectDB()->prepare($query);

            $stmt->bindValue(':nome',$nome);
            $stmt->bindValue(':cargo',$cargo);
            $stmt->bindValue(':departamento',$dep);

            $stmt->execute();

            echo "<h1>Cadastrado sucesso</h1>";
        } catch(PDOException $e){
            echo "Erro SQL: ".$e->getMessage();
        }
    }

    //Read
    public function readFunc($id){

    }
}

switch ($_POST['op']) {
    case 'cad':
        $teste = new Funcionario();
        $teste->setNome($_POST['nome']);
        $teste->setCargo($_POST['cargo']);
        $teste->setDepartamento($_POST['depart']);
        $teste->createFunc($teste->getNome(), $teste->getCargo(), $teste->getDepartamento());
        break;
    
    default:
        # code...
        break;
}

/**/