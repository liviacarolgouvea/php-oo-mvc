<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Estudantes extends Pessoas
{
   public $matricula;
   public $ira;

   /**
    * Este método busca todos os estudantes armazenados na base de dados
    *
    * @return   array
    */
   public static function findAll()
   {
      $conn = new Database();
      $sql = "SELECT ID, nome, telefone, email, data_nascimento, matricula, ira
            FROM php_oo.estudante e
            LEFT JOIN pessoa p
            ON e.pessoa_id = p.ID";
      $result = $conn->executeQuery($sql);
      return $result->fetchAll(PDO::FETCH_ASSOC);
   }

   /**
    * Este método busca um estudante armazenados na base de dados com um
    * determinado ID
    * @param int $id Identificador único do usuário
    *
    * @return array
    */
   public static function findById(int $id)
   {
      $conn = new Database();
      $sql = "SELECT ID, nome, telefone, email, data_nascimento, matricula, ira
            FROM php_oo.estudante e
            LEFT JOIN php_oo.pessoa p
            ON e.pessoa_id = p.ID
            WHERE ID = :id";
      $result = $conn->executeQuery($sql, array(':id' => $id));
      return $result->fetchObject();
   }

   /**
    * Este método edita os dados de um estudante armazenados na base de dados com um
    *
    * @param array $estudante Dados do estudante
    * @return void
    */
   public static function edit(array $estudante)
   {
      $conn = new Database();
      $sql = "UPDATE php_oo.pessoa 
            SET nome=:nome, telefone=:telefone, email=:email, data_nascimento=:data_nascimento
            WHERE ID=:id";
      $result = $conn->executeQuery($sql, array(
         ':nome' => $estudante['nome'],
         ':telefone' => $estudante['telefone'],
         ':email' => $estudante['email'],
         ':data_nascimento' => $estudante['data_nascimento'],
         ':id' => $estudante['id']
      ));

      if ($result) {
         $sql = "UPDATE php_oo.estudante 
              SET matricula=:matricula
              WHERE pessoa_id=:id";
         $result = $conn->executeQuery($sql, array(
            ':matricula' => $estudante['matricula'],
            ':id' => $estudante['id']
         ));
         return $result;
      } else {
         return false;
      }
   }

   /**
    * Este método cria um estudante na base de dados
    *
    * @param array $estudante Dados do estudante a ser criado
    * @return void
    */
   public static function create(array $estudante)
   {
      $conn = new Database();
      $sql = "INSERT INTO php_oo.pessoa (nome, telefone, email, data_nascimento)
            VALUES (:nome, :telefone, :email, :data_nascimento)";
      $result = $conn->executeQuery($sql, array(
         ':nome' => $estudante['nome'],
         ':telefone' => $estudante['telefone'],
         ':email' => $estudante['email'],
         ':data_nascimento' => $estudante['data_nascimento'],
      ));
      $idCriado = $conn->conn->lastInsertId();
      if ($idCriado) {
         $sql = "INSERT INTO php_oo.estudante (pessoa_id, matricula) 
              VALUES (:id, :matricula)";
         $result = $conn->executeQuery($sql, array(
            ':matricula' => $estudante['matricula'],
            ':id' => $idCriado
         ));
         return $result;
      } else {
         return false;
      }
   }
   /**
    * Este método deleta um estudante armazenados na base de dados com um
    * determinado ID
    *
    * @param integer $id Identificador único do usuário
    * @return void
    */
   public static function delete(int $id)
   {
      $conn = new Database();
      $sql = "DELETE php_oo.pessoa, php_oo.estudante
            FROM php_oo.pessoa
            INNER JOIN php_oo.estudante
            ON estudante.pessoa_id = pessoa.ID
            WHERE ID =:id";
      $result = $conn->executeQuery($sql, array(':id' => $id));
      return $result;
   }

   public function disciplinasMatriculadas()
   {
      return "PHP Orientado a Objetos";
   }

   /**
    * Este método atualiza o ídice de rendimento do aluno na base de dados
    *
    * @param [type] $nota Nota recebida pelo aluno
    * @return void
    */
   public function atualizaIRA($nota)
   {
      $this->ira += $nota;
      return $this->ira;
   }

   /**
    * Método de exemplo para definir a classe calculaAvaliacao abstrata da classe mâe
    *
    * @return void
    */
   public function calculaAvaliacao()
   {
      $ira = 50;
      $porcentagePresenca = 80;
      $resultado = $ira * $porcentagePresenca;
      return $resultado;
   }
}
