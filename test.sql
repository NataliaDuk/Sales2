--формирует отчет о продажах продукции с группировкой по дате, странам и продукции
SELECT
    `sale`.`data`,
    `countries`.`name` AS countries_id,
    `produkt`.`name` AS `produkt_id1`,
    SUM(`cost`),
    SUM(`weight`)
FROM
    `sale`,
    `countries`,
    `produkt`
WHERE
        `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id`
GROUP BY
    `sale`.`data`,
    `countries`.`name`,
    `produkt`.`name`
ORDER BY `sale`.`data`  ASC

    AND $this->startReportData<`sale`.`data`<=$this->endReportData



(
    SELECT
        `countries`.`name` AS `countries_id`,
        `produkt`.`name` AS `produkt_id1`,
        `sale`.`weight` AS `weight`,
        `sale`.`cost` AS `cost`
    FROM
        `sale`,
        `countries`,
        `produkt`
    WHERE
        `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id`
)
UNION
(
SELECT
    'ИТОГО' AS `countries_id`,
    'ИТОГО' AS `produkt_id1`,
    '-' AS `weight`,
    SUM(`cost`) AS `cost`
FROM
    `sale`,
    `countries`,
    `produkt`
WHERE
    `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id`
GROUP BY
    `countries_id`
    )
UNION
(
SELECT
    'ИТОГО' AS `countries_id`,
    'ИТОГО' AS `produkt_id1`,
    '-' AS weight,
    SUM(`cost`) AS `cost`
FROM
    `sale`,
    `countries`,
    `produkt`
WHERE
    `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id`
    )
ORDER BY
    `countries_id`,
    `produkt_id1`

--правильный запрос без итогов
    //SELECT
          //    `countries`.`name` AS countries_id,
          //    `produkt`.`name` AS `produkt_id1`,
          //    SUM(`weight`) AS weight,
          //    SUM(`cost`) AS cost
          //
          //FROM
          //    `sale`,
          //    `countries`,
          //    `produkt`
          //WHERE
          //    `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id`
          //    AND
          //      `data` >= '$startData' AND `data` <= '$endData'
          //GROUP BY
          //--     `sale`.`data`,
          //    `countries`.`name`,
          //    `produkt`.`name`
          //ORDER BY
          //     `countries`.`name` ASC, `produkt`.`name` ASC

SELECT
    `countries`.`name` AS countries_id,
    `produkt`.`name` AS `produkt_id1`,
    SUM(`weight`) AS weight,
    SUM(`cost`) AS cost
FROM
    `sale`,
    `countries`,
    `produkt`
WHERE
        `sale`.`countries_id` = `countries`.`id` AND `sale`.`produkt_id1` = `produkt`.`id` AND `data` >= '2021-08-01' AND `data` <= '2021-08-21' AND `countries`.`name` = 'Россия'
GROUP BY
    `countries`.`name`,
    `produkt`.`name`
ORDER BY
    `countries`.`name` ASC,
    `produkt`.`name` ASC

SELECT
    YEAR(`sale`.`data`) AS 'YEAR',
    `countries`.`name` AS countries_id,
    SUM(`cost`) AS cost
FROM
    `sale`,
    `countries`
WHERE
    `sale`.`countries_id` = `countries`.`id` AND YEAR(`sale`.`data`) >= 2020 AND YEAR(`sale`.`data`) <= 2021
GROUP BY
    YEAR(`sale`.`data`),
    `countries`.`name`