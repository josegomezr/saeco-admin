SAEPLUS Admin API 
=================

API HTTP para la base de datos de SAEPLUS.

Instalación
-----------

```bash
# Clonar el repo
git clone https://github.com/josegomezr/saeco-admin.git
# Entra en la carpeta
cd saeco-admin
# Copiar la configuración de ejemplo
cp .env.example .env
# Llenar las config
nano .env 
# Instalar las migraciones
php artisan migrate:install
# Migrar el esquema (agregar datos de prueba [--seed])
php artisan migrate --seed
# Ejecutar servidor (puerto 8000)
./serve.sh
```

Para instalar con Apache/nginx revisar la documentación de Laravel.