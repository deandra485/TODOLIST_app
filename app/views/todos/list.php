<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">To-Do List</h1>
        <a href="<?= BASEURL; ?>/index.php?action=add" class="btn btn-primary mb-3">Add New Name</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todos as $todo): ?>
                    <tr>
                        <td><?= $todo['task']; ?></td>
                        <td><?= $todo['status']; ?></td>
                        <td>
                            <form method="POST" action="<?= BASEURL; ?>/index.php?action=update&id=<?= $todo['id']; ?>" class="d-inline-block">
                                <select name="status" class="form-select">
                                    <option value="Pending" <?= ($todo['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="Completed" <?= ($todo['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                </select>
                                <button type="submit" class="btn btn-warning mt-2">Update</button>
                            </form>
                            <form method="POST" action="<?= BASEURL; ?>/index.php?action=delete&id=<?= $todo['id']; ?>" class="d-inline-block">
                                <button type="submit" class="btn btn-danger mt-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
