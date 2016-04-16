<?php

class UserMapper extends Mapper
{
    public function getUsers() {
        $sql = "SELECT * from user";
        $stmt = $this->db->query($sql);

        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new UserEntity($row);
        }
        return $results;
    }

   

    public function getUserById($id_new) {
        $sql = "SELECT * from user where id = :id_new";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id_new" => $id_new]);

        return new UserEntity($stmt->fetch());

    }

    public function save(UserEntity $user) {
        $sql = "insert into user
            (username, age, location) values
            (:username, :age,:location)";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "username" => $user->getUsername(),
            "age" => $user->getAge(),
            "location" => $user->getLocation(),

        ]);

        if(!$result) {
            throw new Exception("could not save record");
        }
    }
}

