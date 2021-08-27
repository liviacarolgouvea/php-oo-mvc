<main>
   <div class="container">
      <div class="row">
         <div class="col-8 offset-2" style="margin-top:100px">
            <h2>Novo professor</h2>
            <form name="criacaoProfessor" action="/professor/create" method="POST">
               <p>
                  <label>Nome</label>
                  <input type="text" name="nome" value="">
               </p>
               <p>
                  <label>Telefone</label>
                  <input type="text" name="telefone" value="">
               </p>
               <p>
                  <label>Email</label>
                  <input type="text" name="email" value="">
               </p>
               <p>
                  <label>Data de nascimento</label>
                  <input type="text" name="data_nascimento" value="">
               </p>
               <p>
                  <label>Especialidade</label>
                  <input type="text" name="especialidade" value="">
               </p>
               <p>
                  <label>Salário</label>
                  <input type="text" name="salario" value="">
               </p>
               <p>
                  <input type="submit" name="criarProfessor" value="Salvar">
               </p>
            </form>
            <br>
            <a href="/professor">Voltar</a>
         </div>
      </div>
   </div>
</main>