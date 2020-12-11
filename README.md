# Farmacias Dinamita

El proyecto fue elaborado en base a los requerimientos adquiridos de una de las actividades de mi clase de 'Ingeniería de software'. Se trata de un software para una farmacia(física) donde se hace el manejo de empleados, productos y facturas. En esta farmacia es estrictamente necesario hacerte una cuenta para poder comprar. La cuenta de un cliente no tiene mucha utilidad para el cliente más allá de que la farmacia siga sus registros y te permita comprar.

Enseguida algunas cosas relevantes para los roles
1. Todos se registran donde mismo (a excepción del 'admin'), lo que hagan posteriormente hace que cambie su rol(a excepción del 'admin').
2. Cualquiera se puede registrar, lo que te hace 'invitado'.
3. Comprar algo con tu cuenta de 'invitado' te hace 'cliente'. 
4. Un 'empleado' no se puede hacer 'cliente'.
5. Sólo el admin puede contratar a un ‘invitado’ para que sea  ‘usuario’(empleado). 
6. Un cliente no se puede hacer empleado.

Roles:
1. Invitado: Sólo puede llegar a ver una pantalla de bienvenida y cambiar su información.
2. Cliente: Sólo puede llegar a ver una pantalla de bienvenida y cambiar su información.
3. Usuario(empleado): Lo anterior además de que que puede ver los registros de empleados, clientes, productos y facturas. Dispone de facturas en su totalidad(su trabajo);
4. Admin: Lo anterior además de que dispone de la totalidad de funciones de empleados, clientes, productos y facturas.

## Integrantes

-Daniel Michel
-No one else :(

## Instalación

1. Clonar proyecto `git clone git@github.com:Emulator-Dnl/Dinamita.git` y cambiarse a directorio `cd Dinamita`
2. Instalar dependiencias mediante composer: `composer install`
3. Crear archivo de variables de entorno: `cp .env.example .env`
4. Crear llave: `php artisan key:generate`
5. Configurar nombre de base de datos en _.env_ y ejecutar migraciones: `php artisan migrate`
6. Cargue los catálogos (Véase la nota).

## Licencia

[MIT license](https://opensource.org/licenses/MIT).

## NOTA
-Al terminar de instalar haga 'php artisan migrate:fresh --seed' **es necesario cargar catálogos**. También se hace el registro en algunas tablas para comprobar el funcionamiento de las factories.