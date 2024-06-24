<p align="center"><a href="" target="_blank"><img src="public/assets/img/logo-libloop.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/DevPatri/LibLoop"><img src="https://img.shields.io/github/license/DevPatri/LibLoop?style=social&logo=github&logoColor=red
" alt="License"></a>
</p>

# Libloop

LibLoop es una plataforma web diseñada para facilitar el intercambio de libros entre usuarios de forma gratuita. El sistema se basa en un sistema de puntos: al dejar un libro, el usuario suma +3 puntos, y al solicitar un libro, se restan -3 puntos. Este mecanismo permite una mayor flexibilidad en los intercambios, ya que no es necesario un intercambio directo entre dos usuarios.

Los usuarios pueden registrarse, subir información sobre los libros que desean intercambiar, buscar, filtrar por ubicación para asegurar que el intercambio está en su zona, marcar libros como favoritos, gestionar solicitudes de intercambio, y enviar mensajes entre ellos para coordinar puntos de encuentro para el intercambio. La aplicación está diseñada para mejorar la experiencia del usuario en el intercambio de libros usados, ofreciendo una interfaz intuitiva para la gestión de libros y solicitudes.

LibLoop también se enfoca en promover la lectura al facilitar el acceso a una amplia variedad de libros sin coste alguno. Al ser un sistema gratuito, elimina las barreras económicas que podrían impedir a algunos usuarios acceder a nuevos libros.

## Instalación

1. Instalar PHP.

    Se recomienda instalar algún servidor web tipo XAMPP para obtener el paquete de PHP y MySql. 
    https://www.apachefriends.org/es/index.html

2. Instalar Composer.
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php
php -r "unlink('composer-setup.php');"
```

3. Clonar proyecto de GitHub 
```
https://github.com/DevPatri/LibLoop.git
```

4. Posicionarse en el directorio del proyecto y ejecutar 
```
composer install
```

5. Ejecutar instalación de librerias npm.
```
npm install
```
6. Ejecutar en phpMyAdmin script libloop.sql

7. Configurar credenciales de la base de datos en el .env

8. Levantar servidor web y acceder.

## Licencia

<p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><a property="dct:title" rel="cc:attributionURL" href="https://github.com/DevPatri/LibLoop">LibLoop</a> by <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="https://github.com/DevPatri/LibLoop">Patricio Egea y Marina Casaus</a> is licensed under <a href="https://creativecommons.org/licenses/by-sa/4.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC BY-SA 4.0<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1" alt=""></a></p>

<strong>Usted es libre de:</strong>

<strong>Compartir</strong> — copiar y redistribuir el material en cualquier medio o formato para cualquier propósito, incluso comercialmente.

<strong>Adaptar</strong> — remezclar, transformar y construir a partir del material para cualquier propósito, incluso comercialmente.
La licenciante no puede revocar estas libertades en tanto usted siga los términos de la licencia.

<strong>Bajo los siguientes términos:</strong>
<strong>Atribución</strong> — Usted debe dar crédito de manera adecuada , brindar un enlace a la licencia, e indicar si se han realizado cambios . Puede hacerlo en cualquier forma razonable, pero no de forma tal que sugiera que usted o su uso tienen el apoyo de la licenciante.
No hay restricciones adicionales — No puede aplicar términos legales ni medidas tecnológicas que restrinjan legalmente a otras a hacer cualquier uso permitido por la licencia.
