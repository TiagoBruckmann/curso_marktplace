Desenvolvendo um projeto de markplace feito totalmente em laravel 7


porém sendo atualizado para a versão 8 do laravel ao final do curso

<h1><b>caso de pau dnv rode os comandos abaixo</b></h1>

composer global require laravel/installer
composer install

<h1><b>e apos remover todas as tabelas do banco rode novamente as migrations com o comando </b></h1>

php artisan migrate

<h1>Instalar o sdk do PagSeguro</h1>

<p>composer require pagseguro/pagseguro-php-sdk</p>

toda a documentação do PagSeguro esta em <a href="https://github.com/pagseguro/pagseguro-sdk-php">github do PagSeguro</a>

nesse projeto usamos a configuração <a href="https://github.com/pagseguro/pagseguro-sdk-php/blob/master/public/Configuration/README.md"> environment</a>

usando os demais codigos no arquivo .ENV:

PAGSEGURO_ENV = sandbox or production <br>
PAGSEGURO_EMAIL = tiago@saintec.com.br <br>
PAGSEGURO_TOKEN_SANDBOX = A06BEA23D28E4DCDBD3E9A14644C9598 <br>
PAGSEGURO_CHARSET = UTF-8
