<?php

namespace App\Model;

use W1020\Table as ORMTable;

class UsersModel extends ORMTable
{
    /**
     * @param int $page
     * @return array<array>
     * @throws \Exception
     */
    public function getPage(int $page = 1): array
    {
        $sql = <<<SQL
SELECT
    `users`.`id`,
    `users`.`login`,
    `users`.`pass`,
    `users`.`name`,
    `user_groups`.`name` AS 'users_id'
FROM
    `users`,
    `user_groups`
WHERE
    `users`.`users_id` = `user_groups`.`id`
SQL;

        return $this->query(
            "$sql LIMIT " . (($page - 1) * $this->pageSize) . ",$this->pageSize;"
        );
    }

    /**
     * @return array <int|string, array>
     * @throws \Exception
     */
    public function getGroupList() : array
    {
        $data = $this->query("SELECT `id`,`name` FROM `user_groups`");
        $arr = [];
        foreach ($data as $row) {
            $arr[$row['id']] = $row['name'];
        }
        return $arr;
    }

}