<?php
    require 'db.php';
    $id = $_GET['id'];
    $sql = 'SELECT * FROM inventory WHERE id=:id';
    $statement = $connection->prepare($sql);
    $statement->execute([':id' => $id]);
    $product = $statement->fetch(PDO::FETCH_OBJ);
    if( isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $sql = 'UPDATE inventory SET name=:name, description=:description, price=:price WHERE id=:id';
        $statement = $connection->prepare($sql);
        if($statement->execute(['name'=> $name, 'description'=>$description, 'price'=>$price, 'id'=>$id]))
        {
            header("location:/");
        }
    }
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1>Update Product</h1>
        </div>
        <div class="card-body">
            <form method="post">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Name</th>
                        <td>
                            <input class="form-control" type="text" value="<?=$product->name;?>" name="name" id="name">
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <textarea class="form-control" type="text" name="description" id="description"><?=$product->description;?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>
                            <input class="form-control" type="text" value="<?=$product->price;?>" name="price" id="price">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button onclick="return confirm('Are you sure to edite this?')" type="submit" class="btn btn-info">Save Change</button>
                            <a href="/" class="btn btn-danger">Back to read products</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>