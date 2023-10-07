# Use uma imagem oficial do PHP com Composer como base
FROM php:8.1-fpm

# Instale as extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Instale o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instale as ferramentas de descompactação
RUN apt-get update && apt-get install -y unzip

# Instale o Supervisor e suas dependências (exemplo com Debian/Ubuntu)
RUN apt-get update && apt-get install -y supervisor

# Copie os arquivos do projeto para o contêiner
COPY ./ /var/www/html

# Copie o arquivo de configuração do Supervisor para o diretório apropriado
COPY laravel-worker.conf /etc/supervisor/conf.d/

# Defina o diretório de trabalho para o aplicativo Laravel
WORKDIR /var/www/html

# Inicie o Supervisor para gerenciar o Laravel worker e o servidor Laravel
CMD ["sh", "-c", "supervisord -n & php artisan serve --host=0.0.0.0 --port=8000"]
