<main>
   <div class="container">
      <div class="row">
         <div class="col-8 offset-2" style="margin-top:100px">
            <h2>Estudantes</h2>
            <a href='/estudante/createForm'>Cadastrar</a>
            <br>
            <table border="1" cellpadding=10>
               <thead>
                  <tr>
                     <th scope="col">Name</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data['estudantes'] as $user) { ?>
                     <tr>
                        <td><?= $user['nome'] ?></td>
                        <td>
                           <a href='/estudante/editForm/<?= $user['ID'] ?>'>Editar</a>
                        </td>
                        <td>
                           <a href='/estudante/delete/<?= $user['ID'] ?>'>Excluir</a><br>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
            <br>
            <a href="/">Voltar</a>
         </div>
      </div>
   </div>
</main>