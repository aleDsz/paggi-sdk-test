# Paggamentos Cartões

Instalação
-------------

Para que seja possível realizar o teste da aplicação é estritamente necessário instalar a versão mais recente do angular.
Além disso, é necessário instalar o driver do SQLite e liberar o uso dele no `php.ini`

Linux/OS X:
```
sudo apt-get install php-sqlite3
cd api && composer install && composer dump-autoload -o
npm install
```

Teste
-------------

Para testar a aplicação, é necessário rodar 2 processos (ou 2 terminais) em simultâneo, pois precisa-se rodar a API e o projeto do Angular 7.


```
npm run server
ng serve
```