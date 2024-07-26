<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font-family: 'Roboto', sans-serif; margin: 0; padding: 0; background-color: #f0f0f0; }
        .container { padding-top: 20px; margin: auto; max-width: 1400px; }
        h1.title { text-align: center; color: #4CAF50; margin-bottom: 20px; text-transform: uppercase; font-size: 28px; border-bottom: 2px solid #4CAF50; padding-bottom: 10px; }
        .table { background-color: #ffffff; border-radius: 5px; overflow: hidden; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }
        .table thead { background-color: #343a40; color: #ffffff; }
        .table thead th { border: none; }
        .table tbody tr { transition: background-color 0.2s ease-in-out; }
        .table tbody tr:hover { background-color: #f1f1f1; }
        .btn-custom { background-color: #28a745; color: #fff; transition: background-color 0.3s ease; }
        .btn-custom:hover { background-color: #218838; }
        .btn-edit { background-color: #007bff; color: #ffffff; }
        .btn-edit:hover { background-color: #0056b3; }
        .btn-danger-custom { background-color: #dc3545; color: #ffffff; }
        .btn-danger-custom:hover { background-color: #c82333; }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">Manage Articles</h1>
    <div class="mb-3 text-end">
        <a href="<?php echo site_url('pages/db_authSubmission2'); ?>" class="btn btn-custom">Add Article</a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Volume</th>
            <th>File</th>
            <th>Publishing Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($submittedArticles as $article): ?>
            <tr>
                <td><?= html_escape($article->title); ?></td>
                <td><?= html_escape($article->authors); ?></td>
                <!-- <td><?= html_escape($article->volume_name); ?></td> -->
                <td>
                    <?php if ($article->filename): ?>
                        <a href="<?= base_url('files/' . html_escape($article->filename)); ?>" class="file-link">View</a>
                    <?php else: ?>
                        No file uploaded
                    <?php endif; ?>
                </td>
                <!-- <td><?= $article->published ? 'Published' : 'Unpublished'; ?></td> -->
                <td class="text-center">
                    <a href="<?= site_url('pages/db_AdminUpdate/' . html_escape($article->slug)); ?>" class="btn btn-edit btn-sm">Edit</a>
                    <a href="<?= site_url('pages/editArticle/' . html_escape($article->articleid)); ?>" class="btn btn-custom btn-sm">Update</a>
                    <a href="<?= site_url('pages/deleteArticle/' . html_escape($article->articleid)); ?>" class="btn btn-danger-custom btn-sm" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
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
