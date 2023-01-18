# Entrega 3 Bases de Datos: Proyecto Final Grupos 1 y 2 :sparkles:

La página opera mediante una vista principal 'index.php' desde la cual se pueden acceder a distintas funcionalidades dependiendo del tipo de usuario que se encuentre iniciado sesión, optando por ser artista, productora, o invitado (sin iniciar sesión).

## Importar usuarios

Esta funcionalidad se realizó mediante una función creada en un procedimiento almacenado que está en la carpeta 'sql' como importar.sql, la cual en su interior posee la función importar_usuarios(). La función primero revisa si es que la tabla está creada o no. En caso de que lo esté, las variables 'artista' y 'productora' toman el valor TRUE, lo que hará que no se inserte ningún valor a la tabla, porque esta ya tendrá todos los valores ingresados. En caso de que no exista la tabla, las variables tomarán el valor NULL y se creará la tabla, con lo que se ingresará a cada bloque IF y se insertarán todos los valores necesarios en la tabla. En cuanto a las contraseñas, estas serán un número entero aleatorio entre 100 y 1000000, tanto para artistas como para productoras.

## Crear evento

Las productoras al momento de crear eventos les es posible dar entradas de cortesía negativas (a pesar de que lógicamente no debería ser así) pero por temas de tiempo decidimos dejarlo así.

## Estado evento

Por temas de tiempo también decidimos no implementar los eventos con más de un artista, lo que conlleva a que solamente pueden haber eventos con un artista, y al momento que este acepte o rechace el evento, el estado del mismo cambiará inmediatamente.

