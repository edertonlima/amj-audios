<?php

	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$telefone = $_GET['telefone'];
	$mensagem = $_GET['mensagem'];

	$nome_site = 'Áudios Motivacionais';
	$para = 'edertton@gmail.com';

	$email_remetente = 'site@ederton.com.br';


	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: $nome_site <$para>\n";
	$headers .= "Return-Path: $nome_site <$para>\n";
	$headers .= "Reply-To: $nome <$email>\n";

	$conteudo = '
	<h2>Uma nova solicitação de áudio foi enviada através do site.</h2>';

	$conteudo .= '<p>';
	$conteudo .= '<strong>Nome:</strong> '.$nome;
	$conteudo .= '<br><strong>E-mail:</strong> '.$email;
	$conteudo .= '<br><strong>Telefone:</strong> '.$telefone;
	$conteudo .= '<br><strong>Mensagem:</strong> '.$mensagem;
	$conteudo .= '</p>';
	if(mail($para, $nome_site, $conteudo, $headers, "-f$email_remetente")){
		//mail('edertton@gmail.com', "Contato, Fale Conosco", $conteudo, $headers, "-f$email_remetente");
		//mail('pablo@di20.com.br', "Contato, Fale Conosco", $conteudo, $headers, "-f$email_remetente");
		echo(json_encode('ok'));
	}else{
		echo(json_encode("Desculpe, não foi possível enviar a sua solicitação. <br>Por favor, tente novamente mais tarde."));
	}
?>