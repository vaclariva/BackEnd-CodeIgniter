<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <h1>Data Products</h1>
    <table class="table table-bordered table-striped" cellpadding="10">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Product</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $p): ?>
            <tr>
                <td><?=$p->id?></td>
                <td><?=$p->nama_product?></td>
                <td><?=$p->description?></td>
                <td>
                    <a href="<?=base_url('edit-product/' . $p->id)?>" class="btn btn-primary">Edit</a>
                    <a href="<?=base_url('delete-product/'.$p->id)?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

    <!-- Add Bootstrap JS script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
