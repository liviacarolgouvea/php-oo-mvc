<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Professores extends Pessoas
{
   public string $especialidade;
   public float $salario;

   /**
    * Este método busca todos os professores armazenados na base de dados
    *
    * @return array
    */
   public static function findAll()
   {
      $conn = new Database();
      $sql = "SELECT ID, nome, telefone, email, especialidade, salario, data_nascimento
            FROM php_oo.professor o
            LEFT JOIN pessoa p
            ON o.pessoa_id = p.ID";
      $result = $conn->executeQuery($sql);
      return $result->fetchAll(PDO::FETCH_ASSOC);
   }

   /**
    * Este método busca um professor armazenados na base de dados com um
    * determinado ID
    * @param int $id Identificador único do usuário
    *
    * @return array
    */
   public static function findById(int $id)
   {
      $conn = new Database();

      $sql = "SELECT ID, nome, telefone, email, especialidade, salario, data_nascimento
            FROM php_oo.professor o
            LEFT JOIN php_oo.pessoa p 
            ON o.pessoa_id = p.ID 
            WHERE ID = :id";
      $result = $conn->executeQuery($sql, array(':id' => $id));

      return $result->fetchObject();
   }
   
   /**
    * Este método deleta um professor armazenado na base de dados com um
    * determinado ID
    *
    * @param integer $id Identificador único do usuário
    * @return void
    */
   public static function delete(int $id)
   {
      $conn = new Database();
      $sql = "DELETE php_oo.pessoa, php_oo.professor
            FROM php_oo.pessoa
            INNER JOIN php_oo.professor
            ON professor.pessoa_id = pessoa.ID
            WHERE ID =:id";
      $result = $conn->executeQuery($sql, array(':id' => $id));
      return $result;
   }
   /**
    * Este método idita dos dados de um professor armazenado na base de dados com um
    * determinado ID
    *
    * @param array $professor Dados do professor a ser editado
    * @return void
    */
   public static function edit(array $professor)
   {
      $conn = new Database();
      $sql = "UPDATE php_oo.pessoa 
            SET nome=:nome, telefone=:telefone, email=:email, data_nascimento=:data_nascimento
            WHERE ID=:id";
      $result = $conn->executeQuery($sql, array(
         ':nome' => $professor['nome'],
         ':telefone' => $professor['telefone'],
         ':email' => $professor['email'],
         ':data_nascimento' => $professor['data_nascimento'],
         ':id' => $professor['id']
      ));
      if ($result) {
         $sql = "UPDATE php_oo.professor 
                  SET especialidade=:especialidade, salario=:salario 
                  WHERE pessoa_id=:id";
         $result = $conn->executeQuery($sql, array(
            ':especialidade' => $professor['especialidade'],
            ':salario' => $professor['salario'],
            ':id' => $professor['id']
         ));
         return $result;
      } else {
         return false;
      }
   }
   /**
    * Este método cria um novo professor na base de dados com um
    *
    * @param array $professor Dados do professor a ser criado
    * @return void
    */
   public static function create(array $professor)
   {
      $conn = new Database();
      $sql = "INSERT INTO php_oo.pessoa (nome, telefone, email, data_nascimento)
            VALUES (:nome, :telefone, :email, :data_nascimento)";
      $result = $conn->executeQuery($sql, array(
         ':nome' => $professor['nome'],
         ':telefone' => $professor['telefone'],
         ':email' => $professor['email'],
         ':data_nascimento' => $professor['data_nascimento'],
      ));
      $idCriado = $conn->conn->lastInsertId();
      if ($idCriado) {
         $sql = "INSERT INTO php_oo.professor (pessoa_id, especialidade, salario) 
                  VALUES (:id, :especialidade, :salario)";
         $result = $conn->executeQuery($sql, array(
            ':especialidade' => $professor['especialidade'],
            ':salario' => $professor['salario'],
            ':id' => $idCriado
         ));
         return $result;
      } else {
         return false;
      }
   }

   /**
    * Método de exemplo para definir a classe calculaAvaliacao abstrata da classe mâe
    *
    * @return void
    */
   public function calculaAvaliacao()
   {
      $qtdDisciplinasMinistradas = 100;
      $qtdAnosNaInstituicao = 12;
      $resultado = $qtdDisciplinasMinistradas * $qtdAnosNaInstituicao;
      return $resultado;
   }
}
