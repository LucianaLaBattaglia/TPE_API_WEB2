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


| Verbo  | End-point    | Ejemplo  |
| --------| ------------| ------------ | 
| GET | Api/movies     | https://localhost/Api/movies |


ejemplo de respuesta: 
200 - "OK"
```json
[
    {
        "id_movie": 3,
        "movie_name": "Guardianes de la Galaxia",
        "movie_image": "http://gnula.nu/wp-content/uploads/2014/08/guardianes_de_la_galaxia.jpg",
        "synopsis": "Se trata de una aventura espacial de proporciones épicas y llena de acción...",
        "name_gender": "Comedia",
        "movie_date": "2010"

}
]

```
##### Query params aceptados
| Parametro  | Descripcion  | Tipo  | Ejemplo  | caracter  |
| ------------ | ------------ | ------------ | ------------ | ------------ |
| Id_gender  |  Envia un ID de genero de peliculas para filtrar los resultados por los diferentes generos disponibles |  Integer |  https://localhost/Api/movies?id_gender=1 |  Opcional |
| sort  | Envía este parámetro para ordenar las películas por diferentes atributos. valores posibles: 1)*id_movie*: Ordena por id  2)*movie_name*: ordena por orden nombre de película 3)*movie_date*: ordena por año de estreno 4)*movie_id_gender*: ordena por el ID del genero -movie_name: ordena por nombre de pelicula| string  | https://localhost/Api/movies?sort=id_movie  | Opcional  |
| order  | Envía este parámetro para especificar el sentido del orden de las películas, | string  |   https://localhost/Api/movies?sort=id_movie&&order=asc | opcional  |
|  page |   Envia este parametro para obtener la lista de películas paginadas obtenidas de a 5  | integer |  https://localhost/Api/movies?page=1 |  opcional |

### Obtener una pelicula en particular


| Verbo  | End-point    | Ejemplo  |
| --------| ------------| ------------ | 
| GET | Api/movies/:ID     | https://localhost/Api/movies/:ID |

| Parametro  | Descripcion  | Tipo  | Ejemplo  | caracter  |
| ------------ | ------------ | ------------ | ------------ | ------------ |
| id|ID del contacto a obtener |Integer |https://localhost/Api/movies/2  | Obligatorio |

respuesta: 200 "OK"

```json
{
    "id_movie": 3,
    "movie_name": "Guardianes de la Galaxia",
    "movie_image": "http://gnula.nu/wp-content/uploads/2014/08/guardianes_de_la_galaxia.jpg",
    "synopsis": "Se trata de una aventura espacial de proporciones épicas y llena de acción...",
    "name_gender": "Comedia",
    "movie_date": "2010"
}

```

### Agregar pelicula
permite agregar una pelicula a la base de datos

| Verbo  | End-point    | Ejemplo  |
| --------| ------------| ------------ | 
| POST| Api/movies    | https://localhost/Api/movies |

| Parametro  | Descripcion  | Tipo  |  caracter  | Ejemplo |
| ------------ | ------------ | ------------ | ------------ | ------------ |
| movie_name | Nombre de la película que se quiere agregar. |string |Obligatorio  |  El oso panda|
|movie_image |url a la imagen de la pelicula | string | Obligatorio| http://galeria/imagen.jpg |
| synopsis | Breve descripción de la película que quiere agregar |string |Obligatorio  |  Las increibles aventuras de el oso panda|
| id_gender | ID del genero al cual pertenece la película que se desea agregar |integer |Obligatorio  |  5|
| movie_date | Año de estreno de la película que se quiere agregar|integer|Obligatorio  | 2020|

ejemplo de body:

```json
{
   
    "movie_name": "Guardianes de la Galaxia",
    "movie_image": "http://gnula.nu/wp-content/uploads/2014/08/guardianes_de_la_galaxia.jpg",
    "synopsis": "Se trata de una aventura espacial de proporciones épicas y llena de acción...",
    "id_gender": "5",
    "movie_date": "2010"
}

```
respuesta: 201 "Create OK"


### Agregar pelicula
permite agregar una pelicula a la base de datos

| Verbo  | End-point    | Ejemplo  |
| --------| ------------| ------------ | 
| POST| Api/movies    | https://localhost/Api/movies |

| Parametro  | Descripcion  | Tipo  |  caracter  | Ejemplo |
| ------------ | ------------ | ------------ | ------------ | ------------ |
| movie_name | Nombre de la película que se quiere agregar. |string |Obligatorio  |  El oso panda|
|movie_image |url a la imagen de la pelicula | string | Obligatorio| http://galeria/imagen.jpg |
| synopsis | Breve descripción de la película que quiere agregar |string |Obligatorio  |  Las increibles aventuras de el oso panda|
| id_gender | ID del genero al cual pertenece la película que se desea agregar |integer |Obligatorio  |  5|
| movie_date | Año de estreno de la película que se quiere agregar|integer|Obligatorio  | 2020|

ejemplo de body:

```json
{
    "id_movie": 3,
    "movie_name": "Guardianes de la Galaxia",
    "movie_image": "http://gnula.nu/wp-content/uploads/2014/08/guardianes_de_la_galaxia.jpg",
    "synopsis": "Se trata de una aventura espacial de proporciones épicas y llena de acción...",
    "id_gender": "5",
    "movie_date": "2010"
}

```
respuesta: 201 "Create OK"



