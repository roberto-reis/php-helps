<?php
	session_start();
	require_once "class/Usuario.php";

    if(empty($_SESSION["logado"])) {
        header("Location: login.php");
        exit;
    } else {
		$usuario = new Usuario();

		if(isset($_POST["btn_atualizar"])) {
			if(!empty($_POST["nome"]) && !empty($_POST["email"])) {
				$usuario->setNome($_POST["nome"]);
				$usuario->setEmail($_POST["email"]);
				$usuario->update($_POST["id"]);
			} else {
				$usuario->alert("alert-danger", "Preencha todos os campos!");
			}
		}

		if(isset($_POST["btn_delete"])) {
			if(!empty($_POST["id"])) {
				$id = $_POST["id"];

				if($usuario->delete($id)) {
					$usuario->alert("alert-success", "Deletado com sucesso!");
				} else {
					$usuario->alert("alert-danger", "Erro ao deletar!");
				}		
		
			}
		}

		if(isset($_POST["btn_cadastrar"])) {

			if(!empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["senha"])) {
				$usuario->setNome($_POST["nome"]);
				$usuario->setEmail($_POST["email"]);
				$usuario->setSenha($_POST["senha"]);

				$usuario->insert();
				
			} else {
				$usuario->alert("alert-danger", "Preencha todos os campos!");
			}
		}

	}

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
	<h1 class="text-center">Olá, <?php echo $usuario->find($_SESSION["logado"])["nome"]; ?></h1> <a href="sair.php">sair</a>
	<br><br>
	
	

	<div class="container">

	<a href="#" data-toggle="modal" data-target="#modalAdicionar">Adicionar</a>

		<div class="row">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nome</th>
						<th scope="col">email</th>
						<th scope="col">Ação</th>

					</tr>
				</thead>
				<tbody>
				<?php foreach($usuario->findAll() as $users): ?>
					<tr>
						<td><?php echo $users["nome"]; ?></td>
						<td><?php echo $users["email"]; ?></td>
						<td>
							<a href="#" data-toggle="modal" data-target="#exampleModal" onclick="load_modal('<?php echo $users['nome']; ?>', '<?php echo $users['email']; ?>', '<?php echo $users['id']; ?>' )">Editar</a> | 
							<form method="post" class="form_delete">
								<input type="hidden" name="id" value="<?php echo $users['id']; ?>">
								<button type="submit" name="btn_delete" onclick="conf_del()">Excluir</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

<!-- Modal Adicionar -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="modalAdicionar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<form method="POST" class="col-md-5">
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" id="nomeCadastrar" name="nome" placeholder="Digite seu nome">
			</div>

			<div class="form-group">
				<label for="email">E-maill:</label>
				<input type="text" class="form-control" id="emailCadastrar" name="email" placeholder="Digite seu e-mail">
			</div>

			<div class="form-group">
				<label for="email">Senha:</label>
				<input type="password" class="form-control" id="senhaCadastrar" name="senha" placeholder="Digite sua senha">
			</div>

			<button type="submit" class="btn btn-primary" name="btn_cadastrar">Cadastrar</button>

		</form>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="POST" class="col-md-5">
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" name="nome" class="form-control" id="nome">
			</div>

			<div class="form-group">
				<label for="email">E-maill:</label>
				<input type="text" name="email" class="form-control" id="email">
			</div>
			<input type="hidden" name="id" id="id">

			<button type="submit" class="btn btn-primary" name="btn_atualizar">Atualizar</button>

		</form>
      </div>
    </div>
  </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/funcoes.js"></script>
  </body>
</html>