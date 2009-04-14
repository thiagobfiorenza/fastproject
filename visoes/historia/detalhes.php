<?php
	$codigo = $par[2];
	
	$sql = ('
		SELECT
			h.nome,
			h.descricao,
			h.prioridade,
			h.andamento,
			h.observacao,
			h.inclusao,
			h.atualizacao
		FROM
			historia h
		WHERE
			h.codigo = ?
	');
	$dados = array($codigo);
	$pre = $con->prepare($sql);
	erro($pre);
	$exe = $pre->execute($dados);
	erro($exe);

	$tabela = $exe->fetchRow();
?>
				<h1>Detalhes da história #<?php echo $codigo; ?></h1>

				<h2>Nome:</h4>
				<p><?php echo $tabela->nome; ?></p>
				<hr />
				<h2>Descrição:</h4>
				<p><?php echo $tabela->descricao; ?></p>
				<hr />
				<h2>Prioridade:</h4>
				<p><?php echo $tabela->prioridade; ?></p>
				<hr />
				<h2>Andamento:</h4>
				<p><?php echo $tabela->prioridade; ?></p>
				<hr />
<?php
	if(!empty($tabela->observacao)){
?>
				<h2>Observações:</h4>
				<p><?php echo $tabela->observacao; ?></p>
				<hr />
<?php
	}
	if(!empty($tabela->inclusao)){
?>
				<h2>Data de inclusão:</h4>
				<p><?php echo data($tabela->inclusao); ?></p>
				<hr />
<?php
	}
	if(!empty($tabela->atualizacao)){
?>
				<h2>Data de atualização:</h4>
				<p><?php echo data($tabela->atualizacao); ?></p>
				<hr />
<?php
	}
?>
