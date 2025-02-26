<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<STYLE TYPE="text/css">
	<!--
		@page { margin: 2cm }
		P { margin-bottom: 0.21cm }
		P.western { so-language: pt-BR }
	-->
	</STYLE>
</HEAD>
<BODY LANG="pt-BR" DIR="LTR">
<P CLASS="western" STYLE="margin-bottom: 0cm"><h1>Ajuda – Content Resize</h1></P>
<P CLASS="western" STYLE="margin-bottom: 0cm"><BR></P>
<P CLASS="western" STYLE="margin-bottom: 0cm"> Descrição - plugin recebe texto e apresenta resumo baseado no número de palavras na tela.</P>
<P CLASS="western" STYLE="margin-bottom: 0cm"><BR></P>
<P CLASS="western" STYLE="margin-bottom: 0cm"><b>Modo de usar:</b>
</P>
<P CLASS="western" STYLE="margin-bottom: 0cm"></P>
<P CLASS="western" STYLE="margin-bottom: 0cm">Insira em seu tema a seguinte função :&nbsp;<b>content-resize($text,$size,$option);</b></P>
<P CLASS="western" STYLE="margin-bottom: 0cm">onde:</P>
<P CLASS="western" STYLE="margin-bottom: 0cm"><b>$text</b> - É o texto que deseja que apareça.</P>
<P CLASS="western" STYLE="margin-bottom: 0cm"><b>$size</b> - O numero de palavras fo texto.</P>
<P CLASS="western" STYLE="margin-bottom: 0cm"><b>$option</b> – Opção de icone.</P>
<P CLASS="western" STYLE="margin-bottom: 0cm"></P>
<P CLASS="western" STYLE="margin-bottom: 0cm">opções:</P>
<P CLASS="western" STYLE="margin-bottom: 0cm">list - apresenta o conteúdo como lista ordenada
(string)</P>
<P CLASS="western" STYLE="margin-bottom: 0cm">flag - Apresenta uma seta (<img style="width:10px;height:10px" src='<?php echo plugin_dir_url( __FILE__ ) ?>images/flag.png'>)</P>

<P CLASS="western" STYLE="margin-bottom: 0cm"><b>Exemplo de uso</b>
contentResize(get_the_content(),50,'flag');
</P>
<P CLASS="western" STYLE="margin-bottom: 0cm"><b>Exemplo de uso</b><sup>2</sup>
contentResize('Help me help help please',200,'flag');
</P>
</BODY>
</HTML>
