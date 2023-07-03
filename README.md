# ApiMispelis

## Descripcion
Mis pelis brinda distintos servicios de gestion para una pagina de peliculas online

## Interactuar con la api
Si quieres probar nuestra API de una manera rápida te recomendamos el uso de PostMan. Postman es una extensión de Google Chrome que permite interactuar con HTTP API's de forma sencilla a través de una interfaz amigable para construir peticiones y obtener respuestas.

## Codigos de estado de respuesta HTTP (codigos de error)
La api utiliza  los siguientes codigos para reportar los distintos errores que pueden surgir.

- 200 -> "OK" *Peticion realizada con exito*
- 201 -> "Create OK" *Elemento creado exitosamente*
- 400 -> "Bad Request" *asdasdasd*
- 404 -> "Not Found" *Elemento no encontrado*
- 500 -> "Internal Server Error" *Error en el sistema, contacte al dev:  alumno@tudai.web*

## Como realizar peticiones
A continuacion se detalla las distintas rutas (endpoint) para realizar las distintas peticiones, algunas de ellas llevan parametros tanto obligatorios como opcionales.
Tenga en cuenta que al realizar una peticion recibira un Json (de ser requerido) y un codigo de error notificando el estado de la peticion.

### Obtener coleccion de peliculas
Obtiene el listado de peliculas ordenadas por ID de manera descendente.

**GET**  https://localhost/Api/movies  

codigo de respuesta: 200 - "OK"

Ejemplo de respuesta
| Vervo  | End-point  |codigo de error   | Ejemplo  |
| --------| ------------ | ------------ | ------------ | 
| GET | Api/movies    | 200 "OK"  | https://localhost/Api/movies |


respuesta: 
```json
[
    {
        "id_movie": 3,
        "movie_name": "Guardianes de la Galaxia",
        "movie_image": "http://gnula.nu/wp-content/uploads/2014/08/guardianes_de_la_galaxia.jpg",
        "synopsis": "Se trata de una aventura espacial de proporciones épicas y llena de acción...",
        "id_gender": 5,
}
]

```
##### Query params aceptados
| Parametro  | Descripcion  | Tipo  | Ejemplo  | De caracter  |
| ------------ | ------------ | ------------ | ------------ | ------------ |
| Id_gender  |  Envia un ID de genero de peliculas para filtrar los resultados por los diferentes generos disponibles |  Integer |  https://localhost/Api/movies?id_gender=1 |  Opcional |
| sort  | Envía este parámetro para ordenar las películas por diferentes atributos  -id_movie: Ordena por id  -movie_name: ordena por nombre de pelicula| string  | https://localhost/Api/movies?sort=id_movie  | Opcional  |
| order  | Envía este parámetro para especificar el sentido del orden de las películas, | string  |   https://localhost/Api/movies?sort=id_movie&&order=asc | opcional  |
|  page |  integer |  Envia este parametro para obtener la lista de películas paginadas obtenidas de a 5 |  https://localhost/Api/movies?page=1 |  opcional |
|   |   |   |   |   |
|   |   |   |   |   |





