# Dockerfile para Rifa Premium no Railway
FROM php:8.1-apache

# Instalar extensões necessárias e utilitários
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    unzip \
    wget \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql zip mbstring

# Instalar IonCube Loader
RUN wget -q https://downloads.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz \
    && tar -xzf ioncube_loaders_lin_x86-64.tar.gz \
    && mkdir -p /usr/local/lib/php/extensions/no-debug-non-zts-20210902 \
    && cp ioncube/ioncube_loader_lin_8.1.so /usr/local/lib/php/extensions/no-debug-non-zts-20210902/ \
    && rm -rf ioncube ioncube_loaders_lin_x86-64.tar.gz \
    && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20210902/ioncube_loader_lin_8.1.so" > /usr/local/etc/php/conf.d/00-ioncube.ini

# Configurar PHP
RUN echo "display_errors=On" >> /usr/local/etc/php/conf.d/error.ini \
    && echo "display_startup_errors=On" >> /usr/local/etc/php/conf.d/error.ini \
    && echo "error_reporting=E_ALL" >> /usr/local/etc/php/conf.d/error.ini

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite headers

# Configurar Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Configurar virtual host
RUN echo '<VirtualHost *:80>\n    DocumentRoot /var/www/html\n    <Directory /var/www/html>\n        Options Indexes FollowSymLinks\n        AllowOverride All\n        Require all granted\n    </Directory>\n    ErrorLog ${APACHE_LOG_DIR}/error.log\n    CustomLog ${APACHE_LOG_DIR}/access.log combined\n</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Copiar arquivos do projeto
COPY . /var/www/html/

# Copiar script de inicialização
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/uploads 2>/dev/null || true

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD curl -f http://localhost/health.php || exit 1

# Expor porta
EXPOSE 80

# Comando de inicialização
CMD ["/start.sh"]
