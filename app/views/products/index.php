<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

    <h1>Product Management</h1>

    <a href="/products/create">Add Product</a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id']; ?></td>
                        <td><?= $product['product_name']; ?></td>
                        <td><?= $product['description']; ?></td>
                        <td><?= $product['price']; ?></td>
                        <td><?= $product['quantity']; ?></td>
                        <td><?= $product['created_at']; ?></td>
                        <td>
                            <a href="/products/edit/<?= $product['id']; ?>">Edit</a>
                            |
                            <a href="/products/delete/<?= $product['id']; ?>"
                               onclick="return confirm('Are you sure you want to delete this product?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No products found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>