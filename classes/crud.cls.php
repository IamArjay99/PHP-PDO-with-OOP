<?php

class Crud extends Database {

    // Fetch all users
    public function getAllUsers() {
        // Make query
        $sql = "SELECT * FROM tbl_users";
        $results = $this->connect()->query($sql);
        return $results;
    }

    // Create new user
    public function storeUser($name, $age, $gender, $address) {
        $sql = "INSERT INTO tbl_users (name, age, gender, address) VALUES (?,?,?,?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $age, $gender, $address]);
        return $query->fetch();
    }

    // Read specific user
    public function getUser($id) {
        $sql = "SELECT * FROM tbl_users WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        return $query->fetch();
    }

    // Update user
    public function updateUser($id, $name, $age, $gender, $address) {
        $sql = "UPDATE tbl_users SET name=:name, age=:age, gender=:gender, address=:address WHERE id=:id";
        $query = $this->connect()->prepare($sql);
        $query->execute(['name' => $name, 'age' => $age, 'gender' => $gender, 'address' => $address, 'id' => $id]);
        return $query->fetch();
    }

    // Destroy user
    public function destroyUser($id) {
        $sql = "DELETE FROM tbl_users WHERE id=:id";
        $query = $this->connect()->prepare($sql);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

}