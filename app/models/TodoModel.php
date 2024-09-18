<?php
class TodoModel {
    private $conn;
    private $table = 'todos';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTodos() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTodo($task) {
        $query = 'INSERT INTO ' . $this->table . ' (task) VALUES (:task)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':task', $task);
        return $stmt->execute();
    }

    public function updateTodoStatus($id, $status) {
        $query = 'UPDATE ' . $this->table . ' SET status = :status WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteTodo($id) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
