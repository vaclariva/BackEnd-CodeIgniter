<!DOCTYPE html>
<html>
<head>
    <title>Form Insert Product</title>
</head>
<body>
    <h2>Insert Product</h2>
    <form method="post" action="<?php echo base_url('insertproducts'); ?>">
        <label for="nama_product">Nama Product:</label>
        <input type="text" id="nama_product" name="nama_product" required>
        <br><br>
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required></textarea>
        <br><br>
        <input type="submit" value="Insert">
    </form>
</body>
</html>
