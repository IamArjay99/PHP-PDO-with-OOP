<?php
    include 'includes/autoload.ins.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP and PDO</title>
    <link rel="stylesheet" href="plugins/css/bootstrap.css">
</head>
<body>

    <div class="container">
        <h1 class="text-center text-danger">ALL USERS</h1>
        <div class="row">
            <div class="col-8 offset-2">
            <a href="includes/formaction.ins.php?user=create" class="btn btn-primary float-right my-3">Create</a>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        // Getting the Crud class
                        $getAllUsers = new Crud();

                        // Getting the getAllusers() functions
                        $results = $getAllUsers->getAllUsers();

                        // Checks if empty
                        if (!empty($results)) { ?>
                        <?php foreach ($results as $result) { ?>
                        <tr class="text-center">
                            <td><?php echo $result['id'] ?></td>
                            <td><?php echo $result['name'] ?></td>
                            <td><?php echo $result['age'] ?></td>
                            <td><?php echo $result['gender'] ?></td>
                            <td><?php echo $result['address'] ?></td>
                            <td><button class="btn btn-info mx-1" name="view" id="view" onclick="viewUser(<?php echo $result['id'] ?>)">View</button><button class="btn btn-warning mx-1" name="update" id="update" onclick="updateUser(<?php echo $result['id'] ?>)">Update</button><button class="btn btn-danger mx-1" name="delete" id="delete" onclick="deleteUser(<?php echo $result['id'] ?>)">Delete</button></td>
                        </tr>
                        <?php } 
                        } else {
                            echo "There's no data found";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- For viewing the specific data -->
    <form action="includes/formaction.ins.php" method="POST" id="form-view">
        <input type="hidden" name="viewId" id="viewId">
    </form>

    <!-- For editing and updating data -->
    <form action="includes/formaction.ins.php" method="POST" id="form-update">
        <input type="hidden" name="updateId" id="updateId">
    </form>

    <!-- For deleting data -->
    <form action="includes/formaction.ins.php" method="POST" id="form-delete">
        <input type="hidden" name="deleteId" id="deleteId">
    </form>

    <script src="plugins/js/jquery-3.3.1.min.js"></script>
    <script src="plugins/js/bootstrap.js"></script>
    <script src="plugins/js/proper.js"></script>

    <script>
        // For viewing the specific data
        const formView = document.querySelector('#form-view');
        function viewUser(id) {
            $('#viewId').val(id);
            formView.submit();
        }
        // For editing and updating data
        const formUpdate = document.querySelector('#form-update');
        function updateUser(id) {
            $('#updateId').val(id);
            formUpdate.submit();
        }
        // For deleting data
        const formDelete = document.querySelector('#form-delete');
        function deleteUser(id) {
            $('#deleteId').val(id);
            formDelete.submit();
        }
    </script>

</body>
</html>