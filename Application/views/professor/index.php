<main>
   <div class="container">
      <div class="row">
         <div class="col-8 offset-2" style="margin-top:100px">
            <h2>Professores</h2>
            <p>
               <a href='/professor/createForm'>Cadastrar</a>
            </p>
            <table border="1" cellpadding=10>
               <thead>
                  <tr>
                     <th scope="col">Nome</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data['professores'] as $user) { ?>
                     <tr>
                        <td><?= $user['nome'] ?></td>
                        <td>
                           <a href='/professor/editForm/<?= $user['ID'] ?>'>Editar</a>
                        </td>
                        <td>
                           <a href='/professor/delete/<?= $user['ID'] ?>'>Excluir</a><br>
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