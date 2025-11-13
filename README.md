# Quitamos la promo de Laravel que a nadie le interesa 

# A ver; para instalar esto he seguido estos pasos
# Al trabajar en otro pc hay que hacer los pasos 
# 1,3,4,5 (6 recomiendo)
# El archivo .env no se sube a GitHub pero es fundamental

<ol>
<li>Tener php, composer, y dependencias como "Xampp"</li>
<li>-composer create-project laravel/laravel nombredemiproyecto</li>
<li>-composer install</li>
<li>-php artisan key:generate</li>
<li>-php artisan migrate</li>
<li>Cambiar el .env.example a .env y modificar las variables de la DB</li>
<li>Configuración de GitHub, clear repo y subir commits...</li>
</ol>

# Para arrancar el LocalHost (Apartado Laravel)

-php artisan serve

# Para arrancar vite (Poder aplicar CSS)

-npm run dev

# Archivo .env.example por si pasa algo terrible
# APP_NAME=Laravel
# APP_ENV=local
# APP_KEY=
# APP_DEBUG=true
# APP_URL=http://127.0.0.1:8000
# 
# LOG_CHANNEL=stack
# LOG_DEPRECATIONS_CHANNEL=null
# LOG_LEVEL=debug
# 
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
# 
# BROADCAST_DRIVER=log
# CACHE_DRIVER=file
# FILESYSTEM_DISK=local
# QUEUE_CONNECTION=sync
# SESSION_DRIVER=file
# SESSION_LIFETIME=120
# 
# MEMCACHED_HOST=127.0.0.1
# 
# REDIS_HOST=127.0.0.1
# REDIS_PASSWORD=null
# REDIS_PORT=6379
# 
# MAIL_MAILER=smtp
# MAIL_HOST=mailpit
# MAIL_PORT=1025
# MAIL_USERNAME=null
# MAIL_PASSWORD=null
# MAIL_ENCRYPTION=null
# MAIL_FROM_ADDRESS="hello@example.com"
# MAIL_FROM_NAME="${APP_NAME}"
# 
# AWS_ACCESS_KEY_ID=
# AWS_SECRET_ACCESS_KEY=
# AWS_DEFAULT_REGION=us-east-1
# AWS_BUCKET=
# 
# VITE_APP_NAME="${APP_NAME}"  
