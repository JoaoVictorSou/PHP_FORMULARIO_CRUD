<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Arquivos em PHP</title>
    <link rel="stylesheet" type="text/css" href="estilo/style.css">
  </head>

  <body>
    <h1>Arquivos em PHP</h1>

    <main>

      <?php
        $permissaoAlterar = false;
        $usuarios = file('bd/usuario.bd');


        if(isset($_GET["alterar"])){
          $permissaoAlterar = true;
          $usuarioAlterar = explode(',', $usuarios[$_GET["alterar"]]);
        }
      ?>

    	<section>

    		<h2>Cadastro</h2>

        <?php
          if ($permissaoAlterar) {
            echo '<form action="bd/alterar.php?id=' . $_GET["alterar"] . '"  method="post">';

          } else {
            echo '<form action="bd/salvar-usuario.php" method="post">';
          }
        ?>



    			<div>
    				<label for="txtNome">Nome: </label>
            <?php
    				    echo '<input type="text" id="txtNome" name="nome" value="' . $usuarioAlterar[0] . '">';
            ?>
    			</div>
    			<div>
    				<label for="txtEmail">E-mail: </label>
            <?php
    				    echo '<input type="email" id="txtEmail" name="email" value="' . $usuarioAlterar[1] . '">';
            ?>
    			</div>

    			<div>
    				<label for="txtSenha">Senha: </label>
            <?php
    				    echo '<input type="password" id="txtSenha" name="senha" value="' . $usuarioAlterar[2] . '">';
            ?>
    			</div>

    			<div>
            <?php
              if ($permissaoAlterar) {
                echo '<input type="submit" value="Alterar" name="altbtn">';

              } else {
                echo '<input type="submit" value="Cadastrar">';
              }
            ?>
            
    			</div>

    		</form>

    	</section>

      <section>
    		<h2>Itens</h2>

        <ol>
          <?php
            include_once('bd/listar-usuario.php');
            $usuarios = getUsuarios();

            foreach ($usuarios as $key => $usuario){
                echo "<li>" . $usuario;
                echo "<a href='bd/remover.php?remover=$key'>Remover</a>";
                echo "<a href='index.php?alterar=$key'>Alterar</a>";
                echo "</li>";
            }


          ?>
        </ol>

    	</section>
    </main>

    <footer>
    	<p>Elaborado por @mimjoao</p>
    	<p>Todos os direitos concedidos</p>
    </footer>
    <?php

    ?>
  </body>
</html>
