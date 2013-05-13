<?php
	require_once('inc/Install.class.php');
	require_once('inc/StatusColor.class.php');
	session_start();
	Install::CheckDbTables();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="icon" type="image/x-icon" href="img/favicon.ico"/>
	<title>Árvore de Serviços de TI</title>
	<style type="text/css">
		html,body { height:100%; margin:0; overflow:hidden; }
		body,table,input,select { font:10pt Arial; color:#181818; }
		a { color:#1853AD; }
		a:hover { color:#FE5E00; }
		hr { height:1px; border:0; color:#CCC; background-color:#CCC; }
		div#theBigOne { width:100%; height:100%; background:url('img/serpro.png') no-repeat bottom right; }
		#treeLoading { position:fixed; top:50%; left:50%; margin-top:-75px; margin-left:-75px; }
		/*canvas#treePlot { width:100%; height:100%; }*/
		div#topLeftOne { background:rgba(250,250,250,0.5); border:1px solid #EEE; padding:4px; position:fixed; top:8px; left:8px; font:bold 13pt Arial; color:#BBB; }
		div#topRiteOne { background:rgba(230,230,230,0.5); border:1px solid #D4D4D4; padding:6px; position:fixed; top:10px; right:10px; }
		div#toolbox { position:fixed; left:10px; bottom:10px; border:1px solid #CCC; background:rgba(230,230,230,0.5); padding:1px 6px; }
		.numStatus { border:1px solid #CCC; padding:0px 4px; }
		#statusTxt { font-size:8pt; }
	</style>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.dateFormat-1.0.js"></script>
	<script type="text/javascript" src="js/jquery.modalForm.js"></script>
	<script type="text/javascript" src="js/TreeGraph.js"></script>
	<script type="text/javascript" src="index.js"></script>
</head>
<body>
	<div id="theBigOne">
		<canvas id="treePlot"></canvas>
		<img id="treeLoading" src="img/loadingbig.gif"/>
	</div>
	<div id="topLeftOne">ÁRVORE DE SERVIÇOS DE TI<br/>
		<span id="statusTxt">Última atualização em <span id="lastUpdate">yyyy-MM-dd HH:mm:ss</span>.</div>
	<div id="topRiteOne">
		Atualização <select id="refreshTime" title="Tempo de atualização da árvore, em segundos">
			<option value="60">1 min</option>
			<option value="120">2 min</option>
			<option value="180">3 min</option>
			<option value="300">5 min</option>
			</select> &nbsp;
		Serviço <select id="serviceName" title="Serviço de TI a ser exibido na árvore">
			<option class="" value="">--- selecione ---</option>
			</select> &nbsp;
		<span id="loginMenu"></span>
	</div>
	<div id="toolbox"><span id="numNodes">0</span> nós
		<? for($i = 0; $i <= count(StatusColor::$VALUES); ++$i) { ?>
		<span class="numStatus" id="numStatus<?=$i?>" style="background:<?=StatusColor::$VALUES[$i]?>;">0</span>
		<? } ?>
		<a id="collapse" href="#" title="Recolhe todos os nós da árvore">recolher tudo</a></span>
	</div>
	<? include('dialogLogin.php'); ?>
	<? include('dialogEditService.php'); ?>
	<? include('dialogChooseTrigger.php'); ?>
</body>
</html>