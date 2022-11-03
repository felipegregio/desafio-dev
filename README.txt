DESAFIO BYCODERSTEC

Documentação da aplicação desenvolvida.

Da maneira de utilização:

A aplicação é simples, e consiste na conversão de dados de um arquivo .txt, que traz informações referente a transações ocorridas;
Para realizar o download do projeto, podemos tentar da seguinte forma: Caso você possua o GitHub Desktop, abra no canto superior esquerdo a aba 'FILE', e clicar na opção 'Clone a repository'. Assim, você poderia rodar o projeto localmente. Depois que você tiver o projeto na sua máquina, utilizando um emulador local (Exemplo: XAMPP/WAMPP), podemos subir o projeto dentro da pasta 'htdocs', e acessar atraves da URL "http://localhost/desafio/index.php" (o nome "desafio" foi como eu nomeei o meu projeto, você pode alterar, mas lembre-se de se certificar que a URL está apontando para o arquivo correto);
A aplicação não permite que tente importar o arquivo sem ter realizado o upload;
Após o upload do arquivo .txt, a aplicação faz o tratamento dos dados, conversão de alguns valores como (Valor do Pagamento, Data, Hora);
A aplicação também calcula o saldo total, de acordo com as informações do arquivo, e apresenta uma tabelinha com o tipo, o saldo e o estabelecimento em que ocorreu a transação;
De modo geral, está é a forma de utilização da aplicação.

Da parte técnica:

A aplicação possui tratamento para impedir que o usuário passe sem fazer o upload do arquivo txt;
A aplicação possui mensagens que são apresentadas de acordo com as ações, sejam mensagens de sucesso ou erro;
A aplicação possui, desenvolvida em javascript, uma forma sútil de trazer as informações na tela, vindo da esquerda para o centro (isso pode ser modificado);
A aplicação trata os dados do arquivo e fazer o tratamento dos dados, além de converter o formato de data, hora e do valor da moeda, tudo isso em PHP;
A aplicação realiza a conexão com a base de dados em MySQL, e a query para criação da tabela, caso seja necessário, se encontra ao fim desta documentação;
A aplicação também retorna se os dados foram inseridos na base dedados, o total de registros encontrados na base de dados, o saldo total (aparece com fundo vermelho se for saldo negativo, e com fundo verde se for saldo positivo);
O CSS foi feito sem ajuda de framework;

