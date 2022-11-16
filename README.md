# Idea del servicio

La idea de la API es que se puedan gestionar las comidas existentes.

# Endpoints estándar que soporta el servicio

## GET (todas las comidas): localhost/web2/Trabajo_Practico_Especial2/foods

    Un GET general (toda la tabla).

## GET (/:ID):

    Hay 1 GET por ID :
    localhost/web2/Trabajo_Practico_Especial2/foods/:ID : trae la comida con cierto :ID
    
        localhost/web2/Trabajo_Practico_Especial2/foods/21
        

## POST: localhost/web2/Trabajo_Practico_Especial2/foods

    La información a insertarse va en formato JSON, vía raw (de ser incompleta o errónea, devuelvo un 400). De ser exitoso, se devuelve la comida que se acaba de añadir (pudiendo constatar así el usuario que la operación fue exitosa).

## PUT (/:ID): localhost/web2/Trabajo_Practico_Especial2/foods:ID

    Se provee el ID de la comida a editar y se comprueba que toda la información esté en orden (errónea? Devuelvo un 400).

## DELETE (/:ID): localhost/web2/Trabajo_Practico_Especial2/foods:ID

    Se borra una comida con el id (de la comida) provisto.

# ADICIONALES

## Ordenar por un campo a elección (ordenarPor,tipoDeOrden)

    Se puede elegir por qué campo ordenar y en qué orden:
        localhost/web2/Trabajo_Practico_Especial2/foods?ordenarPor=[nombre de algún campo]&tipoDeOrden=[ASC/DESC]


