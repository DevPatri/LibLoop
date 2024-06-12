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

Este proyecto tiene una licencia CreativeCommons [CC BY SA](https://creativecommons.org/licenses/by-sa/4.0/deed.es). <a href="https://creativecommons.org/licenses/by-sa/4.0/deed.es"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/CC_BY-SA_icon.svg" width="70" alt="Laravel Logo"></a>
