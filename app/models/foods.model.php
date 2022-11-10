<?php

class FoodsModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAllFoods($ordenarPor = null, $tipoDeOrden = null) {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        if((isset($ordenarPor))&&(isset($tipoDeOrden))){
            $query = $this->db->prepare("SELECT * FROM foods ORDER BY $ordenarPor $tipoDeOrden");
            $query->execute();
        }
        else{
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM foods");
        $query->execute();
        }
        // 3. obtengo los resultados
        return $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
    }

    public function getFood($id) {
        $query = $this->db->prepare("SELECT * FROM foods WHERE id = ?");
        $query->execute([$id]);
        $food = $query->fetch(PDO::FETCH_OBJ);
        
        return $food;
    }

    /**
     * Inserta una tarea en la base de datos.
     */
    public function insert($names, $price, $descriptions,$id_category_fk) {
        $query = $this->db->prepare("INSERT INTO foods (names, price, descriptions, id_category_fk) VALUES (?, ?, ?, ?)");
        $query->execute([$names, $price, $descriptions, $id_category_fk]);

        return $this->db->lastInsertId();
    }
    
    public function update($names, $price, $descriptions,$id_category_fk,$id) {
        $query = $this->db->prepare("UPDATE  foods SET names = ?, price=? ,descriptions=?,id_category_fk=? WHERE id=?");
        $query->execute([$names, $price, $descriptions, $id_category_fk,$id]);

        return $this->db->lastInsertId();
    }
    /**
     * Elimina una tarea dado su id.
     */
    public function delete($id) {
        $query = $this->db->prepare('DELETE FROM foods WHERE id = ?');
        $query->execute([$id]);
    }


   
}
