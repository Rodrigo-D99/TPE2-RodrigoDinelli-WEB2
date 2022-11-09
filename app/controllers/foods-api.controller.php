<?php
require_once './app/models/foods.model.php';
require_once './app/views/api.view.php';

class FoodsApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new FoodsModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getFoods($params = null) {
        $foods = $this->model->getAll();
        var_dump($foods);
        $this->view->response($foods);
    }

    public function getFood($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $food = $this->model->get($id);

        // si no existe devuelvo 404
        if ($food)
            $this->view->response($food);
        else 
            $this->view->response("La tarea con el id=$id no existe", 404);
    }

    public function deleteFoods($params = null) {
        $id = $params[':ID'];

        $food = $this->model->get($id);
        if ($food) {
            $this->model->delete($id);
            $this->view->response($food);
        } else 
            $this->view->response("La tarea con el id=$id no existe", 404);
    }

    public function insertFoods($params = null) {
        $food = $this->getData();

        if (empty($food->names) || empty($food->descriptions) || empty($food->descriptions)|| empty($food->id_category_fk)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insert($food->names, $food->price, $food->descriptions,$food->id_category_fk);
            $food = $this->model->get($id);
            $this->view->response($food, 201);
        }
    }

}