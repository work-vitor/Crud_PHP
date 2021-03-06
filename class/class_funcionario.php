<?php

include "class_connect.php";


class Funcionario extends Conexao
{

    private $id = null;
    private $nome;
    private $cargo;
    private $departamento;
    private $res;




    /*public function __construct($nome, $cargo, $departamento)
    {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->departamento = $departamento;
    }*/


    //GET
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function getDepartamento()
    {
        return $this->departamento;
    }

    //SET
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }

    //Create

    public function createFunc($nome, $cargo, $dep)
    {


        try {

            $query = 'INSERT INTO funcionario values (null,:nome,:cargo,:departamento)';

            $stmt = $this->connectDB()->prepare($query);

            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cargo', $cargo);
            $stmt->bindValue(':departamento', $dep);

            $stmt->execute();

            echo "<script> alert('Cadastrado com sucesso');</script>";
            echo "<script> window.location.replace('../views/list_funcionarios.php');</script>";
            exit;
        } catch (PDOException $e) {
            echo "Erro SQL: " . $e->getMessage();
        }
    }

    //Read
    public function readFunc($id)
    {

        try {
            if ($id >= 1) {
                $query = 'SELECT * FROM funcionario where id = ' . $id . ';';
            } else {
                $query = 'SELECT * FROM funcionario;';
            }
            $stmt = $this->connectDB()->prepare($query);
            $stmt->execute();
            $this->res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->res;
        } catch (PDOException $e) {
            echo "Erro SQL: " . $e->getMessage();
        }
    }

    //Delete
    public function deleteFunc($id)
    {

        try {

            $query = 'DELETE FROM funcionario WHERE id = :id;';
            $stmt = $this->connectDB()->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            echo "<script> alert('Deletado com sucesso');</script>";
            echo "<script> window.location.replace('../views/list_funcionarios.php');</script>";
            exit;
        } catch (PDOException $e) {
            echo "Erro SQL: " . $e->getMessage();
        }
    }

    //Update
    public function updateFunc($id, $nome, $cargo, $dep)
    {


        try {
            $query = 'UPDATE funcionario set nome = :nome, cargo  = :cargo, departamento = :departamento WHERE  id = :id;';

            $stmt = $this->connectDB()->prepare($query);

            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cargo', $cargo);
            $stmt->bindValue(':departamento', $dep);

            $stmt->execute();

            echo "<script> alert('Atualizado com sucesso');</script>";
            echo "<script> window.location.replace('../views/list_funcionarios.php');</script>";
            exit;
        } catch (PDOException $e) {
            echo "Erro SQL: " . $e->getMessage();
        }
    }
}

$teste = new Funcionario();

//Delete
if (isset($_GET['id'])) {

    $teste->setId($_GET['id']);
    $teste->deleteFunc($teste->getId());
}
//Cadastro 
elseif (isset($_POST['cad'])) {

    $teste->setNome($_POST['nome']);
    $teste->setCargo($_POST['cargo']);
    $teste->setDepartamento($_POST['depart']);
    $teste->createFunc($teste->getNome(), $teste->getCargo(), $teste->getDepartamento());
}
//Update
elseif (isset($_POST['up'])) {

    $teste->setId($_POST['id']);
    $teste->setNome($_POST['nome']);
    $teste->setCargo($_POST['cargo']);
    $teste->setDepartamento($_POST['depart']);
    $teste->updateFunc($teste->getId(),$teste->getNome(), $teste->getCargo(), $teste->getDepartamento());
}

/**/