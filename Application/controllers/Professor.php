<?php

use Application\core\Controller;

class Professor extends Controller
{
   /**
    * chama a view index.php da seguinte forma /professor/index ou somente /professor
    * e retorna para a view todos os usuários no banco de dados.
    */
   public function index()
   {
      $Professores = $this->model('Professores'); // é retornado o model Professores()
      $data = $Professores::findAll();
      $this->view('professor/index', ['professores' => $data]);
   }

   /**
    * chama a view editForm.php da seguinte forma /professor/editForm passando um parâmetro 
    * via URL /professor/editForm/id e é retornado um array contendo (ou não) um determinado
    * usuário. Além disso é verificado se foi passado ou não um id pela url, caso
    * não seja informado, é chamado a view de página não encontrada.
    * @param  int   $id   Identificado do usuário.
    */

   public function createForm()
   {
      $Professores = $this->model('Professores');
      $this->view('professor/createForm');
   }

   public function create()
   {
      $Professores = $this->model('Professores');
      $data = $Professores::create($_POST);
      if ($data == true) {
         $this->view('professor/create', 'Professor criado com sucesso!');
      } else {
         $this->view('professor/create', 'Erro ao criar professor.');
      }
   }

   public function editForm($id = null)
   {
      if (is_numeric($id)) {
         $Professores = $this->model('Professores');
         $data = $Professores::findById($id);
         $this->view('professor/editForm', $data);
      } else {
         $this->pageNotFound();
      }
   }

   public function edit()
   {
      $Professores = $this->model('Professores');
      $data = $Professores::edit($_POST);
      if ($data == true) {
         $this->view('professor/edit', 'Professor editado com sucesso!');
      } else {
         $this->view('professor/edit', 'Erro ao editar professor.');
      }
   }
   
   public function delete($id = null)
   {
      if (is_numeric($id)) {
         $Professores = $this->model('Professores');
         $data = $Professores::delete($id);
         if ($data == true) {
            $this->view('professor/delete', ['professor' => 'Professor excluído com sucesso']);
         } else {
            $this->view('professor/delete', ['professor' => 'Erro ao excluir professor']);
         }
      } else {
         $this->pageNotFound();
      }
   }
}
