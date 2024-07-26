<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authors List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            padding-top: 20px;
            margin: auto;
            max-width: 1400px;
        }

        h1.title {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 28px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #343a40;
            color: #ffffff;
        }

        .table thead th {
            border: none;
        }

        .table tbody tr {
            transition: background-color 0.2s ease-in-out;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .btn-edit {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-danger-custom {
            background-color: #dc3545;
            color: #ffffff;
        }

        .btn-danger-custom:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">Authors List</h1>
    <div class="mb-3 text-end">
        <a href="<?php echo site_url('pages/add_author'); ?>" class="btn btn-custom">Add New Author</a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Author Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($authors as $author): ?>
            <tr>
                <td><p><?php echo $author['author_name']; ?></p>
                </td>
                <td><p><?php echo $author['email']; ?></p>
                </td>
                <td><p><?php echo $author['contact_num']; ?></p>
                </td>
                <td><p><?php echo $author['title']; ?></p>
                </td>
                <td>
                <a href="<?php echo site_url('pages/edit_author/' . $author['audid']); ?>" class="btn btn-edit btn-sm">Edit</a>
<a href="<?php echo site_url('author/delete/' . $author['audid']); ?>" class="btn btn-danger-custom btn-sm" onclick="return confirm('Are you sure you want to delete this author?')">Delete</a>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
