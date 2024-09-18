<?php
require_once '../config/database.php';
require_once '../config/constants.php';
require_once '../app/controllers/TodoController.php';

$database = new Database();
$db = $database->connect();
$controller = new TodosController($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        $controller->addTodo();
        break;
    case 'update':
        $controller->updateTodoStatus($_GET['id']);
        break;
    case 'delete':
        $controller->deleteTodo($_GET['id']);
        break;
    default:
        $controller->listTodos();
        break;
}
?>
