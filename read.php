<?php
     require 'db.php';
     $id = $_GET['id'];
     $sql = 'SELECT * FROM inventory WHERE id=:id';
     $statement = $connection->prepare($sql);
     $statement->execute([':id' => $id]);
     $product = $statement->fetch(PDO::FETCH_OBJ);
?>

<?php require 'header.php';?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Read Product</h1>
        </div>
        <div class="card-body">
            <table class='table table-bordered table-hover'>
                <tr>
                    <th>Name</th>
                    <td><?=$product->name?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?=$product->description?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><?='$'.$product->price?></td>
                </tr>
                <tr>
                    <th></th>
                    <td><a href="/" class="btn btn-danger">Back to read products</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
