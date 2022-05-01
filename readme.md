# Backend Ricky and Morty - Laravel
App about Ricky and Morty Backend, made on Laravel v 5.8

                                        INSTALACION

1. Clone git desde el reporsitorio
2. Ejecutar php artisan install sobre la carpeta
3. Ejecutar php artisan serve sobre la carpeta
- Pd: La db que manipulara esta sobre database/rickandmorty_v1.db

                                        ENDPOINTS
    Characters : http://localhost:8000/characters
1. Endpoint de creación de nuevas personajes:
 * __URL:__ http://localhost:8000/characters
 * __Method:__ POST
 * Retorna mensaje de creacion
2. Endpoint para la obtencion de personajes
 * __URL:__ http://localhost:8000/characters/?page={value}
 * __Method:__ GET
 * __Parametro:__ page (valor 1 por defecto)
 * Retorna mensaje de creacion
3. Endpoint para la obtencion de un personaje
 * __URL:__ http://localhost:8000/characters/?id={value}
 * __Method:__ GET
 * __Parametro:__ id , identidicacion del personaje
 * Retorna mensaje de creacion
4. Endpoint para la actualizacion de un personaje
 * __URL:__ http://localhost:8000/characters/
 * __Method:__ PATCH
 * __Parametros por body:__ {"id","name","status","species","type","gender","origin","location","image","episode","url","created"}
 * Retorna mensaje de creacion
5. Endpoint para la eliminacion de un personaje
 * __URL:__ http://localhost:8000/characters/{id}
 * __Method:__ DELETE
 * __Parametros:__ id
 * Retorna mensaje de eliminacion