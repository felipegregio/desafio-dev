<?php
session_start();

include_once("conexaodb.php");

$arquivo = $_FILES['arquivo']['tmp_name'];
if(!$arquivo){
	$_SESSION['msg'] = "<p style='color: red; text-align: center'>Você precisa fazer o upload de um arquivo!!!</p>";
	header("Location: index.php");
} else {
	$dados = file($arquivo);
}

foreach($dados as $dado){
	
$tipo = substr($dado, 0, 1);
$data = substr($dado, 1, 8);
$dtformatada = substr($data,0,4).'-'.substr($data,4,2).'-'.substr($data,6,2);
$dataFormatada = date("d/m/Y", strtotime($dtformatada));
$valor = substr($dado, 9, 10);
$valornormal = $valor / 100;
$cpf = substr($dado, 19, 11);
$cartao = substr($dado, 30, 12);
$hora = substr($dado, 42, 6);
$horaFormatada = substr($hora,0,2).':'.substr($hora,2,2).':'.substr($hora,4,2);
$donoloja = substr($dado, 48, 14);
$nomeloja = substr($dado, 62, 19);

$query = "INSERT INTO cnab (Tipo, Data, Valor, CPF, Cartao, Hora, Dono_loja, Nome_loja) VALUES ('$tipo', '$dataFormatada', '$valornormal', '$cpf', '$cartao', '$horaFormatada', '$donoloja', '$nomeloja')";
$executa_query = mysqli_query($conn, $query);	

}

if($arquivo){
	$_SESSION['msg'] = "<p style='color: green; text-align: center'>Dados inseridos com sucesso!</p>";
}
header("Location: index.php");