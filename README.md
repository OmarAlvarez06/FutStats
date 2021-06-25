## **Proyecto FUTSTATS**

<p align="center"><img src="https://lh3.googleusercontent.com/Z1MQC6q09OmwdTU03gPb0r35q5k6ILUs_DrVL893eKH4f7nLcoXGvCA4DWt99aqlnkE4hUnZYbL7YgEXdHL0=w798-h667"></p>

## **Descripción del objetivo del proyecto**

La idea principal de esta página web es desarrollar esta página para el uso de una liga de futbol rápido, futbol 7 y futbol 11. Además, esta página tiene como propósito de contar con un menú en el que los jugadores, visitantes y demás quienes visiten la página puedan conocer información relevante. Esta página web cuenta con registros de jugadores, partidos, equipos, administradores y personas. Estas estarán almacenadas en una base de datos local para el correcto funcionamiento de la misma. Existirán registros para que, como persona, equipo y demás, puedan registrarse en una liga en específico, con ciertos jugadores y tipos de futbol que se tendrán disponibles en ciertas épocas y temporadas. Esto con el objetivo de que tanto los mismos equipos y las mismas personas, puedan conocer a los jugadores de los demás equipos y tener conocimiento previo sobre los mejores equipos, mejores jugadores. De esta manera, se mantendrá cada una de las estadísticas de los partidos y de cada uno de los jugadores. Para controlar esta página web pues se necesitarán ciertas APPS y ciertos programas como Laragon, PHP, HTML y algunos otros lenguajes de programación que serán necesarios para llevar a cabo correctamente el funcionamiento de la página. Así mismo, conforme aprenda a desarrollar tecnologías y ponerlas en la nube o en internet, aprender a desarrollar algunas otras características que vuelvan a la aplicación hábil y mejor para no solo tener esa idea de ver futbol, si no proveer algo mas saludable y con mejores rendimientos que solo el futbol.

## **Integrantes**
- Brian Gaytan
- Omar Alvarez

## **Instrucciones de instalación**

1. *Ejecutar la clonación (dependiendo de su gusto):*
    ```properties
    git clone https://github.com/OmarAlvarez06/FutStats.git
    git clone git@github.com:OmarAlvarez06/FutStats.git
    ```
2. *Instalar las dependencias necesarias:*
    ```properties
    composer install
    ```
3. *Generar el archivo .env:*
    ```properties
    cp .env.example .env
    ```
4. *Generar llave en el archivo .env:*
    ```properties
    php artisan key:generate
    ```
5. *Acceder a la carpeta storage/app:*
    ```properties
    cd storage/app
     ```
6. *Crear la carpeta public:*
    ```properties
    mkdir public
     ```
7. *Acceder a la carpeta public:*
    ```properties
    cd public
     ```
8. *Crear las carpetas necesarias para almacenar y obtener archivos subidos al servidor:*
    ```properties
    mkdir archivos && mkdir equipos && mkdir personas && mkdir sedes && mkdir profile-photos
     ```
9. *Regresar a la carpeta principal:*
    ```properties
    cd .. && cd .. && cd ..
     ```
10. *Generar un enlace simbólico de storage/app/public con la carpeta public:*
    ```properties
    php artisan storage:link
    ```
11. *Acceder a mysql:*
    ```properties
    mysql -u usuario -p password
    ```
12. *Dentro de mysql, crear la base de datos futstats:*
    ```properties
    CREATE DATABASE futstats;
    ```
13. *Salir de mysql:*
    ```properties
    exit;
    ```
14. *Generar las migraciones y correr todos los seeders (Este proceso suele tardar tiempo):*
    ```properties
    php artisan migrate --seed
    ```
15. Modificar el archivo .env a su gusto, pero específicamente en estas partes lo siguiente:
    ```properties
    De APP_URL=http://localhost
    A APP_URL=http://127.0.0.1

    De MAIL_FROM_ADDRESS=null
    A MAIL_FROM_ADDRESS=Contacto@futstats.com
    ```

### Notas

- Al acceder al sistema puede cambiar su foto de perfil accediendo en donde se encuentra su nombre de usuario, dentro de la barra de navegación, y en la opción de perfil. De lo contrario, siempre le aparecerá una imagen vacia tanto en inicio como en la misma barra de navegación.

- Al exportar un archivo pdf de alguna tabla de la base de datos le pedimos que tenga bastante paciencia, ya que el proceso es demasiado lento.

