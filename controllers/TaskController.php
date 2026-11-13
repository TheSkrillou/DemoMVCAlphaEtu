<?php
class TaskController {
    public function index() {
        $taskModel = new Task();
        $tasks = $taskModel->getAllTasks();

        require_once 'views/tasks.php';
    }

    public function show($id) {
        $taskModel = new Task();
        $task = $taskModel->getTaskById($id);

        if ($task) {
            require_once 'views/task_detail.php';
        } else {
            http_response_code(404);
            require_once 'views/404.php';
        }
    }
}
