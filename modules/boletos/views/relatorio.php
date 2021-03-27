<!DOCTYPE HTML>
<html>
<head>

<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Relatório de faturas baixadas.</title>
<style type="text/css">
	body {
			font-family: sans-serif; font-size:11px;
			}
	.titulo{
		font-size: 18px;
		font-family:Verdana, Geneva, sans-serif;
		font-weight:bold;
	}
	th{background:#E6E6E6;}
	table.bordasimples {border-collapse: collapse;}

	table.bordasimples tr td {border:1px solid #CCC; font-size:10px;}

	h2{text-align:center;}
	.rodape{float:right; width:50%;}
</style>
</head>

<body>
Data: <?php echo date("d/m/Y"); ?>
<h2> Faturas referêntes ao retorno</h2>
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="bordasimples">
  <tr>
  <th width="4%" align="left" >número</th>
    <th width="24%" align="left" ><strong>Data</strong></th>
    <th width="31%" align="left" ><strong>Resultado</strong></th>
    <th width="13%" align="center" ><strong>Vencimento</strong></th>
    <th width="13%" align="center" ><strong>Valor Boleto</strong></th>
    <th width="15%" align="center" ><strong>Valor Recebido</strong></th>
  </tr>

  <?php

  	foreach ( $dados as $row) { 
    
    ?>

    <tr>
		<td><?= $row['detalhe']->getNossoNumero() ?></td>
	    <td><?= $row['detalhe']->getDataOcorrencia()->format('d/m/Y') ?></td>
	    <td><strong><?= $row['detalhe']->getDescricaoLiquidacao() ?></strong></td>
	    <td><strong><?= $row['detalhe']->getDataVencimento()->format('d/m/Y') ?></strong></td>
	    <td>R$ <?= number_format( $row['detalhe']->getValorTitulo(), 2, ',', '.')  ?></td>
	    <td>R$ <?= number_format( $row['detalhe']->getValorRecebido(), 2, ',', '.')  ?></td>
	</tr>

  
  <?php } ?>   

</table>

</body>

</html>
