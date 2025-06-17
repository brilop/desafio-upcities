# Desafio Backend UpCities

## Passo a passo para a execução
### A aplicação é executada em ambiente Docker com **Laravel Sail**

1. Faça instalação do Docker
2. No **Windows**, é necessário instalar e configurar o **WSL2** junto ao Docker.
3. Utilize os comandos abaixo para clonar o projeto, no Windows utilize o terminal WSL (Ubuntu).
```
git clone <URL_DO_REPOSITORIO>
cd nome-da-pasta
```

4. Copie o arquivo `.env.example` com o nome `.env` utilizando o comando abaixo:
```
cp .env.example .env
```

5. Faça instalação das dependencias com o comando abaixo, ele utiliza um pequeno container Docker com PHP e Composer para instalar as dependências da aplicação.
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

6. Inicie os containers da aplicação:
```
./vendor/bin/sail up -d
```

7. Gere a chave para criptografia interna da aplicação 
```
./vendor/bin/sail artisan key:generate
```

8. Execute as migrações e seeders
```
./vendor/bin/sail artisan migrate:fresh --seed
```

9. O  projeto pode ser acessado na url: `http://localhost:8000/people`

