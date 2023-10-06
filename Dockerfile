# Use uma imagem oficial do PHP com Composer
FROM php:8.1-fpm

# Instale as extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Instale o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Defina o diretório de trabalho para o aplicativo Laravel
WORKDIR /var/www/html

# Instale as ferramentas de descompactação
RUN apt-get update && apt-get install -y unzip

# Copie os arquivos do projeto para o contêiner
COPY ./ /var/www/html

# Exponha a porta 8000 (ou a porta que você desejar)
EXPOSE 8000

# Inicie o servidor Laravel (ou outros comandos Laravel, se necessário)
CMD php artisan serve --host=0.0.0.0 --port=8000