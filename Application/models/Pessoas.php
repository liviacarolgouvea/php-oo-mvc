<?php

namespace Application\models;

use DateTime;

abstract class Pessoas
{
   public int $id;
   public string $nome;
   public string $telefone;
   protected string $email;
   public string $dataNascimento;

   public function calculaIdade($dataNascimento): int
   {
      $date = new DateTime($dataNascimento);
      $interval = $date->diff(new DateTime(date('Y-m-d')));
      return $interval->format('%Y');
   }

   abstract function calculaAvaliacao();
}
