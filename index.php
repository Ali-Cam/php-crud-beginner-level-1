<?php
    require 'db.php';
    $sql = 'SELECT * FROM inventory';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_OBJ);

?>
<?php require 'header.php'; ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Read products</h1>
        </div>
        <div class="card-body">
        <a href="create.php" class="btn btn-primary mb-3">create new product</a>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php foreach($products as $product): ?>
                <tr>
                    <td><?php echo $product->id;?></td>
                    <td><?php echo $product->name;?></td>
                    <td><?php echo $product->description;?></td>
                    <td><?php echo '$'.$product->price;?></td>
                    <td style="text-align:center">
                        <a href="read.php?id=<?php echo $product->id; ?>" class="btn btn-info">Read</a>
                        <a href="edite.php?id=<?php echo $product->id; ?>" class="btn btn-primary">Edite</a>
                        <a onclick="return confirm('Are you to delete it?')" href="delete.php?id=<?php echo $product->id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>
    
<?php require 'footer.php'; ?>