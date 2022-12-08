<?php

namespace query;


use \model\SweatwaterTest;

class SweatwaterTestQuery
{

    public static function getCommentList(): array
    {

        $query = 'SELECT
                    orderid,
                    comments,
                    shipdate_expected 
                    FROM
                        sweetwater_test';

        $result = \DatabaseAccessManager::getInstance()->getConnection()->query($query);

        /** @var \SweatwaterTest $outputArray */
        $outputArray = [];

        while ($row = $result->fetch()) {
            $sweatwaterTestRow = new SweatwaterTest();
            $sweatwaterTestRow->setOrderId($row['orderid']);
            $sweatwaterTestRow->setComments($row['comments']);
            $sweatwaterTestRow->setShipdateExpected($row['shipdate_expected']);
            $outputArray[] = $sweatwaterTestRow;
        }

        return $outputArray;
    }

}