## Instalación

1. Clonar proyecto `git clone git@github.com:Emulator-Dnl/Dinamita.git` y cambiarse a directorio `cd Dinamita`
2. Instalar dependiencias mediante composer: `composer install`
3. Crear archivo de variables de entorno: `cp .env.example .env`
4. Crear llave: `php artisan key:generate`
5. Configurar nombre de base de datos en _.env_ y ejecutar migraciones: `php artisan migrate`

## Licencia

[MIT license](https://opensource.org/licenses/MIT).

