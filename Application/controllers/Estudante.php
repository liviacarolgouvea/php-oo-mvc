<?php

use Application\core\Controller;

class Estudante extends Controller
{
   /**
    * chama a view index.php da seguinte forma /user/index   ou somente   /user
    * e retorna para a view todos os usuários no banco de dados.
    */
   public function index()
   {
      $Estudantes = $this->model('Estudantes'); // é retornado o model Estudantes()
      $data = $Estudantes::findAll();
      $this->view('estudante/index', ['estudantes' => $data]);
   }

   public function createForm()
   {
      $Estudantes = $this->model('Estudantes');
      $this->view('estudante/createForm');
   }

   public function create()
   {
      $Estudantes = $this->model('Estudantes');
      $data = $Estudantes::create($_POST);
      if ($data == true) {
         $this->view('estudante/create', 'Estudante criado com sucesso!');
      } else {
         $this->view('estudante/create', 'Erro ao criar estudante.');
      }
   }

   /**
    * chama a view editForm.php da seguinte forma /estudante/editForm passando um parâmetro 
    * via URL /estudante/editForm/id e é retornado um array contendo (ou não) um determinado
    * usuário. Além disso é verificado se foi passado ou não um id pela url, caso
    * não seja informado, é chamado a view de página não encontrada.
    * @param  int   $id   Identificado do usuário.
    */
   public function editForm($id = null)
   {
      if (is_numeric($id)) {
         $Estudantes = $this->model('Estudantes');
         $data = $Estudantes::findById($id);
         $this->view('estudante/editForm', $data);
      } else {
         $this->pageNotFound();
      }
   }

   public function edit()
   {
      $Estudantes = $this->model('Estudantes');
      $data = $Estudantes::edit($_POST);
      if ($data == true) {
         $this->view('estudante/edit', 'Estudante editado com sucesso!');
      } else {
         $this->view('estudante/edit', 'Erro ao editar estudante.');
      }
   }

   public function delete($id = null)
   {
      if (is_numeric($id)) {
         $Estudantes = $this->model('Estudantes');
         $data = $Estudantes::delete($id);
         if ($data == true) {
            $this->view('estudante/delete', ['estudante' => 'Estudante excluído com sucesso']);
         } else {
            $this->view('estudante/delete', ['estudante' => 'Erro ao excluir estudante']);
         }
      } else {
         $this->pageNotFound();
      }
   }
}
