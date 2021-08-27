<h2>Edição de estudante</h2>
<form name="edicaoEstudante" action="/estudante/edit" method="POST">
    <input type="hidden" name="id" value="<?=$data->ID?>">
      <p>
        <label>Nome</label>
        <input type="text" name="nome" value="<?=$data->nome?>">
      </p>  
      <p>
        <label>Telefone</label>
        <input type="text" name="telefone" value="<?=$data->telefone?>">
      </p>
      <p>
        <label>Email</label>
        <input type="text" name="email" value="<?=$data->email?>">
      </p>
      <p>
        <label>Data de nascimento</label>
        <input type="text" name="data_nascimento" value="<?=$data->data_nascimento?>">
      </p>
      <p>
        <label>Matrícula</label>
        <input type="text" name="matricula" value="<?=$data->matricula?>">
      </p>
      <p>
        <input type="submit" name="editarEstudante" value="Salvar">
      </p>      
</form>
<br>
<a href="/estudante">Voltar</a>