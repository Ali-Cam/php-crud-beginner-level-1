<?php
    require 'db.php';
    $message ='';
    if( isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $sql = 'INSERT INTO inventory(name, description, price) VALUES(:name, :description, :price)';
        $statement = $connection->prepare($sql);
        if($statement->execute(['name'=> $name, 'description'=>$description, 'price'=>$price]))
        {
            $message = 'data is insert successfully!';
        }
    }
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1>Create Product</h1>
        </div>
        <div class="card-body">
        <?php if(!empty($message)): ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
            <form method="post" class="needs-validation" novalidate>
            <table class="table table-bordered table-hover">
                    <tr>
                        <th>Name</th>
                        <td>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <textarea class="form-control" type="text" name="description" id="description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>
                            <input class="form-control" type="text" name="price" id="price" required>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button type="submit" class="btn btn-info">Save</button>
                            <a href="/" class="btn btn-danger">Back to read products</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>