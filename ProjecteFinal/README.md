# GymTracker — Projecte Final Laravel (2ºDAW 2026)

Aplicació web de seguiment d'entrenaments gimnàstics.

## Requisits
- PHP 8.2.12 (XAMPP)
- Composer
- MySQL / MariaDB
- Node.js + npm

## Instal·lació

```bash
# 1. Copiar fitxer d'entorn
cp .env.example .env

# 2. Configurar la base de dades al .env
#    DB_CONNECTION=mysql
#    DB_DATABASE=gymtracker
#    DB_USERNAME=root
#    DB_PASSWORD=

# 3. Instal·lar dependències PHP (important: cal l'opció --ignore-platform-req)
composer install --ignore-platform-req=php

# 4. Generar clau
php artisan key:generate

# 5. Crear la base de dades i executar seeders
php artisan migrate --seed

# 6. Instal·lar i compilar assets
npm install
npm run build

# 7. Arrancar el servidor
php artisan serve
```

## Usuari de demo
- **Email:** demo@gymtracker.test  
- **Contrasenya:** password

## Notes
El projecte usa Laravel 13 amb PHP 8.2. Per instal·lar les dependències
cal usar `--ignore-platform-req=php` ja que algunes dependències de
desenvolupament (phpunit 12, etc.) declaren ^8.3, però l'aplicació
en si funciona perfectament amb PHP 8.2.
