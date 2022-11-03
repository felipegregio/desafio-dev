<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Desafio ByCodersTec</title>
	<!--LINK DO CSS   -->
	<link rel="stylesheet" href="css/style.css">
	<!--FIM DO CSS   -->
</head>

<body id="body" style="background-color: #F5F5F5">

	<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="https://unpkg.com/scrollreveal"></script>

	<h2 style="text-align: center">Importando os dados do arquivo</h2>

	<form method="POST" action="trataArquivo.php" enctype="multipart/form-data" style="text-align: center">
		<input type="file" name="arquivo"><br><br><br>
		<input type="submit" value="Importar arquivo">
	</form>

	<?php
		if(isset($_SESSION['msg'])){
			echo($_SESSION['msg']);
		}
	?>
	
	<br><br><br>
	
	<?php

		include_once("conexaodb.php");

		if(isset($_SESSION['msg'])){

			$query2 = "SELECT Tipo, 
			sum(case
				when tipo = 1 then valor
				when tipo = 2 then -valor
				when tipo = 3 then -valor
				when tipo = 4 then valor
				when tipo = 5 then valor
				when tipo = 6 then valor
				when tipo = 7 then valor
				when tipo = 8 then valor
				when tipo = 9 then -valor
				else valor
			end) as 'valor' 
			from cnab";

			$executa_query2 = mysqli_query($conn, $query2);
			
			$linhasSoma = mysqli_num_rows($executa_query2);

			if($linhasSoma > 0){
				while ($linhasSoma = mysqli_fetch_array($executa_query2, MYSQLI_ASSOC)) {
					$valorSomaConvertido = number_format($linhasSoma['valor'], 2, ',', '.');
				}
			}

			$query3 = "SELECT Tipo,Valor,Nome_loja, 
			(CASE
			WHEN Tipo = 1 THEN 'Débito'
			WHEN Tipo = 2 THEN 'Boleto'
			WHEN Tipo = 3 THEN 'Financiamento'
			WHEN Tipo = 4 THEN 'Crédito'
			WHEN Tipo = 5 THEN 'Recebimento Empréstimo'
			WHEN Tipo = 6 THEN 'Vendas'
			WHEN Tipo = 7 THEN 'Recebimento TED'
			WHEN Tipo = 8 THEN 'Recebimento DOC'
			WHEN Tipo = 9 THEN 'Aluguel'
			END) AS Tipo FROM cnab";
			$executa_query3 = mysqli_query($conn, $query3);

			$linhas=mysqli_num_rows($executa_query3);

			if( $linhas > 0 ) {
			    $_SESSION['linhas_encontradas'] = "<p style='text-align: center'> ".$linhas." registros encontrados</p>";

				echo $_SESSION['linhas_encontradas'];
				if($valorSomaConvertido < 0){
					echo "<p style='text-align: center'>O valor total do saldo em conta, baseado no arquivo é: R$"."<span style='background-color:red'>".$valorSomaConvertido."</p>";
				} else {
					echo "<p style='text-align: center'>O valor total do saldo em conta, baseado no arquivo é: R$"."<span style='background-color:green'>".$valorSomaConvertido."</p>";
				}
				echo "<p style='text-align: center'>Veja abaixo todo o histórico de transações, de acordo com o arquivo:</p>";
				echo "<table style='margin-left:auto; margin-right: auto;'>";
				echo "<tr>";
				echo "  <th>Tipo</th>";
				echo "  <th>Valor</th>";
				echo "	<th>Local</th>";
				echo "</tr>";
				while ($linhas = mysqli_fetch_array($executa_query3, MYSQLI_ASSOC)) {
					  echo "<tr>";
					echo "<td style='text-align: center; margin-left:auto'>". $linhas['Tipo'] ."</td> ";
				    echo "<td style='text-align: center'>". $linhas['Valor'] ."</td> ";
				    echo "<td style='text-align: center'>". $linhas['Nome_loja'] ."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}else{
			    $_SESSION['linhas_encontradas'] = "Ainda não existem registros !";
			}
			
			unset($_SESSION['msg']);
		}
		
	?>

</body>
</html>

<script>

// ####### SCRIPT DE SCROLL SUAVE #########
	
ScrollReveal().reveal('#body', {
			duration:2000,
			origin:'left',
			distance:'500px'
});
// ####### SCRIPT DE SCROLL SUAVE #########
</script>