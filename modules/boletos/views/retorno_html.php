<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="entrada">

<div id="cabecalho"><h2><i class="icon-external-link-sign  iconmd"></i> Baixa automática</h2></div>
<div id="forms">
<h3>Observações Importantes</h3>
<p><span class="avisos">
» Desbloquei pop-up para o sistema;<br/>
<strong>
» Selecione um arquivo com extensão .RET com padrão CNAB400.</strong><br/>
» SALVE O ARQUIVO PDF GERADO APÓS PROCESSAR A BAIXA, ELE NÃO ESTARÁ MAIS DISPONÍVEL QUANDO FECHAR A JANELA.

</span></p><br/>
<form action="<?=base_url();?>boletos/retornobanco/processar" method="post" enctype="multipart/form-data">
	<input name="arquivo" type="file" /><br/><br/>

    <div class="controlsa">
<button type="submit" class="btn btn-success ewButton" id="btnsubmit" >
<i class="icon-thumbs-up icon-white"></i> processar arquivo</button>
</div>
</form>
</div>
</div>