<?php
class TodosController {
    private $model;

    public function __construct($db) {
        require_once '../app/models/TodoModel.php';
        $this->model = new TodoModel($db);
    }

    public function listTodos() {
        $todos = $this->model->getTodos();
        require '../app/views/todos/list.php';
    }

    public function addTodo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = $_POST['task'];
            $this->model->addTodo($task);
            header('Location: ' . BASEURL);
        } else {
            require '../app/views/todos/add.php';
        }
    }

    public function updateTodoStatus($id) {
        $status = $_POST['status'];
        $this->model->updateTodoStatus($id, $status);
        header('Location: ' . BASEURL);
    }

    public function deleteTodo($id) {
        $this->model->deleteTodo($id);
        header('Location: ' . BASEURL);
    }
}
?>
