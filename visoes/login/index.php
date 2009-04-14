<?php
	if(!empty($_POST)){
		$sql = ('
			SELECT
				codigo,
				nome
			FROM
				pessoa
			WHERE
				usuario = ? AND
				senha = ?
		');
		$dados = array(
			$_POST['usuario'],
			$_POST['senha']
		);
		$pre = $con->prepare($sql);
		erro($pre);
		$exe = $pre->execute($dados);
		erro($exe);

		$tabela = $exe->fetchRow();
		$_SESSION['fp']['codigo_pessoa'] = $tabela->codigo;
		$_SESSION['fp']['nome_pessoa'] = $tabela->nome;
		header('Location: '.url);
		die();
	}
?>
		<form method="post">
			<p>
				<label name="usuario">Usuário</label>
				<input size="60" type="text" name="usuario" id="usuario" /> 
			</p>
			<p>
				<label name="senha">Senha</label>
				<input size="60" type="password" name="senha" id="senha" /> 
			</p>
			<p>
				<button type="submit">Entrar</button>
			</p>
		</form>

