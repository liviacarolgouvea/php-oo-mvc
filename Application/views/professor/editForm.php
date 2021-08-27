<main>
   <div class="container">
      <div class="row">
         <div class="col-8 offset-2" style="margin-top:100px">
            <h2>Edição de professor</h2>
            <form name="edicaoProfessor" action="/professor/edit" method="POST">
               <input type="hidden" name="id" value="<?= $data->ID ?>">
               <p>
                  <label>Nome</label>
                  <input type="text" name="nome" value="<?= $data->nome ?>">
               </p>
               <p>
                  <label>Telefone</label>
                  <input type="text" name="telefone" value="<?= $data->telefone ?>">
               </p>
               <p>
                  <label>Email</label>
                  <input type="text" name="email" value="<?= $data->email ?>">
               </p>
               <p>
                  <label>Data de nascimento</label>
                  <input type="text" name="data_nascimento" value="<?= $data->data_nascimento ?>">
               </p>
               <p>
                  <label>Especialidade</label>
                  <input type="text" name="especialidade" value="<?= $data->especialidade ?>">
               </p>
               <p>
                  <label>Salário</label>
                  <input type="text" name="salario" value="<?= $data->salario ?>">
               </p>
               <p>
                  <input type="submit" name="editarProfessor" value="Salvar">
               </p>
            </form>
            <br>
            <a href="/professor">Voltar</a>
         </div>
      </div>
   </div>
</main>