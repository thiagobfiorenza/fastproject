<?php 
	ob_start();
	session_start();
	if(isset($_GET['q'])){
		$par = preg_split('[/]', $_GET['q'], -1, PREG_SPLIT_NO_EMPTY);
	}
	require_once('configuracoes/dados.php');
	include('funcoes/comuns.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>FastProject</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo url.'estilo/index.css'; ?>" media="screen" />
	</head>
	<body>
<?php
	if(!isset($_SESSION['fp']['codigo_pessoa'])){
		include(dir.'visoes/login/index.php');
	}else{
?>
		<p>Bem vindo <strong><?php echo $_SESSION['fp']['nome_pessoa']; ?></strong></p>
		<div id="menu">
			<ul>
				<li><a href="<?php echo url.'necessidade'; ?>">Necessidades</a></li>
				<li><a href="<?php echo url.'historia'; ?>">Histórias</a></li>
			</ul>
		</div>
<?php
		include('configuracoes/conexao.php');
		
		if(isset($_GET['q'])){
			
			if(isset($par[1])){
				$arquivo_trabalho = $par[1];
			}elseif(isset($par[0])){
				$arquivo_trabalho = $par[0];
			}

			if((!isset($par[1])) || ($par[1] == "") || (intval($par[1]) != 0)){
				$arquivo_trabalho = "consulta";
			}

			if(isset($par[0])){
					$arquivo = 'visoes/'.$par[0]."/".$arquivo_trabalho.".php";
			}else{
				$arquivo = '';
				header("Location: ".url);
			}
		}

		if (file_exists($arquivo)){
			require_once($arquivo);
		}
	}
?>
	</body>
</html>
<?php
	$con->disconnect();
	ob_flush();
?>
