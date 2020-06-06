<?php 

include 'autoload.ins.php';

// This is for create
if (isset($_GET['user'])) {
    ?>
    <link rel="stylesheet" href="../plugins/css/bootstrap.css">
        <div class="container">
            <h1 class='text-center mt-5'>Create data</h1>
            <div class="row mt-3 mx-auto">
                <div class="col-6 offset-3">
                    <form method="POST">
                        <input type="text" name="c_name" class="form-control my-2" placeholder="Name">
                        <input type="text" name="c_age" class="form-control my-2" placeholder="Age">
                        <input type="text" name="c_gender" class="form-control my-2" placeholder="Gender">
                        <input type="text" name="c_address" class="form-control my-2" placeholder="Address">
                        <button name="create" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
}

// For storing data
if (isset($_POST['create'])) {
    $name = $_POST['c_name'];
    $age = $_POST['c_age'];
    $gender = $_POST['c_gender'];
    $address = $_POST['c_address'];

    $create = new Crud();
    $create->storeUser($name, $age, $gender, $address);
    try {
        header("Location: ../index.php");
    } catch (TypeError $error) {
        echo $error;
    }
}

// Reading data
if (isset($_POST['viewId'])) {
    $id = $_POST['viewId'];
    
    $getUser = new Crud();
    $user = $getUser->getUser($id);
    if (!empty($user)) { ?>
        <link rel="stylesheet" href="../plugins/css/bootstrap.css">
            <div class="container">
                <h1 class='text-center mt-5'>View data</h1>
                <div class="row mt-3 mx-auto">
                    <div class="col-6 offset-3">
                        <form method="POST">
                            <input type="hidden" name="r_id" value="<?php echo $user['id']; ?>" class="form-control my-2" readonly>
                            <input type="text" name="r_name" value="<?php echo $user['name']; ?>" class="form-control my-2" readonly>
                            <input type="text" name="r_age" value="<?php echo $user['age']; ?>" class="form-control my-2" readonly>
                            <input type="text" name="r_gender" value="<?php echo $user['gender']; ?>" class="form-control my-2" readonly>
                            <input type="text" name="r_address" value="<?php echo $user['address']; ?>" class="form-control my-2" readonly>
                        </form>
                    </div>
                </div>
            </div>
    <?php }

}

// This is for the update
if (isset($_POST['updateId'])) {
    $id = $_POST['updateId'];
    
    $getUser = new Crud();
    $user = $getUser->getUser($id);
    if (!empty($user)) {
        ?>
        <link rel="stylesheet" href="../plugins/css/bootstrap.css">
            <div class="container">
                <h1 class='text-center mt-5'>Edit data</h1>
                <div class="row mt-3 mx-auto">
                    <div class="col-6 offset-3">
                        <form method="POST">
                            <input type="hidden" name="u_id" value="<?php echo $user['id']; ?>" class="form-control my-2">
                            <input type="text" name="u_name" value="<?php echo $user['name']; ?>" class="form-control my-2">
                            <input type="text" name="u_age" value="<?php echo $user['age']; ?>" class="form-control my-2">
                            <input type="text" name="u_gender" value="<?php echo $user['gender']; ?>" class="form-control my-2">
                            <input type="text" name="u_address" value="<?php echo $user['address']; ?>" class="form-control my-2">
                            <input type="submit" value="Update" name="update" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        <?php

    }
}

// This is when the update button was clicked
if (isset($_POST['update'])) {
    $id = $_POST['u_id'];
    $name = $_POST['u_name'];
    $age = $_POST['u_age'];
    $gender = $_POST['u_gender'];
    $address = $_POST['u_address'];

    $update = new Crud();
    $updateStatus = $update->updateUser($id, $name, $age, $gender, $address);

    try {
        header("Location: ../index.php");
    } catch (TypeError $error) {
        echo $error;
    }
}

// This is for delete
if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    
    $destroy = new Crud();
    $user = $destroy->destroyUser($id);
    try {
        header("Location: ../index.php");
    } catch (TypeError $error) {
        echo $error;
    }
}

