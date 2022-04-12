<?php


abstract class Conexao {

	//Realizará a conexão com o banco de dados
	protected  function connectDB(){

		try {
			$conexao= new PDO("mysql:host=localhost;dbname=crud_bd","root","");
			return $conexao;
		} catch (PDOException $erro) {
			return $erro->getMessage();
		}

	}
}
