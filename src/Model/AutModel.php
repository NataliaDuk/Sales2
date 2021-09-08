<?php


namespace App\Model;


use W1020\Table as ORMTable;

class AutModel extends ORMTable
{
    /**
     * @param string $login
     * @param string $pass
     * @return array<array>
     * @throws \Exception
     */
    public function checkUser(string $login, string $pass): array
    {
        $sql = <<<SQL
SELECT
    `users`.`id`,
    `users`.`login`,
    `users`.`pass`,
    `users`.`name`,
    `user_groups`.`name` AS 'group_name',
    `user_groups`.`code`
FROM
    `users`,
    `user_groups`
WHERE
    `users`.`users_id` = `user_groups`.`id`
    AND 
    `users`.`login`='$login' AND `users`.`pass`='$pass'
SQL;

//        return $this->query("SELECT * FROM `$this->tableName` WHERE login='$login' AND pass='$pass'");
        return $this->query($sql);
//        if (empty($row)) {
//            return false;
//        } else {
//            return $row[0]['user_group'];
//        }
        //print_r($this->query("SELECT * FROM `users` WHERE login='$login' AND pass='$pass'")[0]['user_group']);
    }

    /**
     * @param string $login
     * @return bool
     * @throws \Exception
     */
    public function checkUserExists(string $login): bool
    {
        return $this->query("SELECT COUNT(*) AS 'C' FROM `$this->tableName` WHERE `login`='$login'")[0]['C'];
    }

    /**
     * @throws \Exception
     */
    public function addNewUser(string $login, string $pass, string $name): void
    {
        $guestId = $this->query("SELECT `id` FROM `user_groups` WHERE `code` = 'user'")[0]['id'];
//        echo $sql = "INSERT INTO `users`(`login`, `pass`, `name`, `user_group`) " .
//            "VALUES ('$login','$pass','$name','$guestId')";
        $this->runSQL("INSERT INTO `users`(`login`, `pass`, `name`, `users_id`) " .
            "VALUES ('$login','$pass','$name','$guestId')");
    }
}