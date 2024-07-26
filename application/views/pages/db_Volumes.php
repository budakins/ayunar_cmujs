<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Volumes</title>
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
        .btn-status {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">List of Volumes</h1>
    <div class="mb-3 text-end">
        <a href="<?php echo base_url('volume/db_createVolumes'); ?>" class="btn btn-custom">Create New Volume</a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Volume ID</th>
            <th>Status</th>
            <th>Volume Name</th>
            <th>Description</th>
            <!-- <th>Date Created</th>
            <th>Date Published</th> -->
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($volumes as $volume): ?>
            <tr>
                <td><?php echo html_escape($volume->volumeid); ?></td>
                <td>
                    <form action="<?php echo base_url('volume/toggle_published/' . html_escape($volume->volumeid)); ?>" method="post">
                        <select name="published" onchange="this.form.submit()" class="form-control form-control-sm">
                            <option value="1" <?php echo $volume->published ? 'selected' : ''; ?>>Published</option>
                            <option value="0" <?php echo !$volume->published ? 'selected' : ''; ?>>Unpublished</option>
                        </select>
                    </form>
                </td>
                <td><?php echo html_escape($volume->vol_name); ?></td>
                <td><?php echo html_escape($volume->description); ?></td>
                <!-- <td><?php echo html_escape($volume->date_at); ?></td>
                <td><?php echo html_escape($volume->date_published); ?></td> -->
                <td>
                    <a href="<?php echo site_url('volume/toggle_archive/'.$volume->volumeid); ?>" class="btn btn-status btn-sm <?php echo ($volume->archived == 1) ? 'btn-danger-custom' : 'btn-custom'; ?>">
                        <?php echo ($volume->archived == 1) ? 'Unarchive' : 'Archive'; ?>
                    </a>
                    <a href="<?php echo base_url('volume/db_editVolume/' . html_escape($volume->volumeid)); ?>" class="btn btn-edit btn-sm">Edit</a>
                    <a href="<?php echo base_url('volume/delete/' . html_escape($volume->volumeid)); ?>" class="btn btn-danger-custom btn-sm" onclick="return confirm('Are you sure you want to delete this volume?')">Delete</a>
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
