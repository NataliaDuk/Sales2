<?php

namespace App\Model;

use W1020\Table as ORMTable;

class ReportUserModel extends ORMTable
{
    protected int $userId;

    /**
     * @param string $startData
     * @param string $endData
     * @return array<array>
     * @throws \Exception
     */
    public function getFilter(string $startData, string $endData): array
    {
        $sql = <<<SQL
SELECT
    `countries`.`name` AS countries_id,
    `produkt`.`name` AS `produkt_id1`,
    SUM(`weight`) AS weight,
    SUM(`cost`) AS cost,
    ROUND(SUM(`cost`) / SUM(`weight`),
    2) AS price
FROM
    `sale`,
    `countries`,
    `produkt`,
     `users`
WHERE
     `users`.`id` = `sale`.`users_id` AND `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id` AND `users`.`id` = '$this->userId'
    AND 
      `data` >= '$startData' AND `data` <= '$endData'
GROUP BY
   
    `countries`.`name`,
    `produkt`.`name`

SQL;

        return $this->query($sql);
    }

    public function getFilter1(string $startData, string $endData): array
    {
        $sql = <<<SQL
SELECT
    DATE_FORMAT(`sale`.`data`, '%m_%Y') AS MONTH_YEAR,
    SUM(`cost`) AS cost
FROM
    `sale`,
    `users`
WHERE
    `sale`.`users_id` = `users`.`id` AND `users`.`id` = '$this->userId'
    AND 
      `data` >= '$startData' AND `data` <= '$endData'
GROUP BY
DATE_FORMAT(`sale`.`data`, '%m_%Y'),
    `users`.`name`
ORDER BY
         MONTH_YEAR ASC
SQL;
        return $this->query($sql);
    }


    public function getFilter2(string $startData, string $endData, string $countries): array
    {
        $sql = <<<SQL
SELECT
    `countries`.`name` AS countries_id,
    `produkt`.`name` AS `produkt_id1`,
    SUM(`weight`) AS weight,
    SUM(`cost`) AS cost,
    ROUND(SUM(`cost`) / SUM(`weight`),
    2) AS price
FROM
    `sale`,
    `countries`,
    `produkt`,
     `users`
WHERE
     `users`.`id` = `sale`.`users_id` AND `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id` AND `users`.`id` = '$this->userId'
    AND 
      `data` >= '$startData' AND `data` <= '$endData'
AND 
     `countries_id` = '$countries'
GROUP BY
    `countries`.`name`,
    `produkt`.`name`

ORDER BY
     `countries`.`name` ASC, `produkt`.`name` ASC

SQL;
//echo $sql;
        return $this->query($sql);
    }
    public function getFilter3(string $startData, string $endData, string $produkt): array
    {
        $sql = <<<SQL
SELECT
    `produkt`.`name` AS `produkt_id1`,   
    `countries`.`name` AS countries_id,
    SUM(`weight`) AS weight,
    SUM(`cost`) AS cost,
    ROUND(SUM(`cost`) / SUM(`weight`),
    2) AS price
FROM
    `sale`,
    `countries`,
    `produkt`,
     `users`
WHERE
     `users`.`id` = `sale`.`users_id` AND `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id` AND `users`.`id` = '$this->userId'
    AND 
      `data` >= '$startData' AND `data` <= '$endData'
AND 
     `produkt_id1` = '$produkt'
GROUP BY
    `countries`.`name`,
    `produkt`.`name`

ORDER BY
     `countries`.`name` ASC, `produkt`.`name` ASC

SQL;
//echo $sql;
        return $this->query($sql);
    }

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId(int $userId): static
    {
        $this->userId = $userId;
        return $this;
    }

    public function getGroupListCountries(): array
    {
        $data = $this->query("SELECT `id`,`name` FROM `countries`");
        $arr = [];
        foreach ($data as $row) {
            $arr[$row['id']] = $row['name'];
        }
        return $arr;
    }

    public function getGroupListProdukt(): array
    {
        $data = $this->query("SELECT `id`,`name` FROM `produkt`");
        $arr = [];
        foreach ($data as $row) {
            $arr[$row['id']] = $row['name'];
        }
        return $arr;
    }
}