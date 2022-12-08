<?php

namespace query;


use \model\SweatwaterTest;

class SweatwaterTestQuery
{

    public static function getCommentList(): array
    {

        $query = "SELECT
                    orderid,
                    comments,
                    shipdate_expected 
                    FROM
                        sweetwater_test";

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

    public static function getClassifiedCommentList(): array
    {

        $query = "SELECT
                        orderid,
                        comments,
                        shipdate_expected,
                        (CASE
                            WHEN comments LIKE '%candy%' THEN 'Candy'
                            WHEN comments LIKE '%call me%' THEN 'Call Needed'
                            WHEN comments LIKE '%refer%' THEN 'Referred By'
                            WHEN comments LIKE '%signature%' THEN 'Signature'
                            ELSE 'Miscellaneous' 
                        END) AS classification
                    
                    FROM
                        sweetwater_test
                        
                    ORDER BY classification";

        $result = \DatabaseAccessManager::getInstance()->getConnection()->query($query);

        /** @var \SweatwaterTest $outputArray */
        $outputArray = [];

        while ($row = $result->fetch()) {
            $sweatwaterTestRow = new SweatwaterTest();
            $sweatwaterTestRow->setOrderId($row['orderid']);
            $sweatwaterTestRow->setComments($row['comments']);
            $sweatwaterTestRow->setShipdateExpected($row['shipdate_expected']);
            $sweatwaterTestRow->setClassification($row['classification']);
            $outputArray[] = $sweatwaterTestRow;
        }

        return $outputArray;
    }

    public static function getCommentListWithShipDatesToFix(): array
    {

        $query = "SELECT
                        orderid,
                        comments,
                        shipdate_expected 
                    FROM
                        sweetwater_test
                    WHERE shipdate_expected = '0000-00-00 00:00:00'
                    AND comments LIKE '%ship date%';";

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

    public static function updateCommentExpectedShipDateByOrderId(int $orderId, string $shipdateExpected): bool
    {
        $parameters = [
            'order_id' => $orderId,
            'shipdate_expected' => $shipdateExpected
        ];

        $query = "UPDATE
                    sweetwater_test
                    SET
                    shipdate_expected = :shipdate_expected
                    WHERE orderid = :order_id";

        $sth = \DatabaseAccessManager::getInstance()->getConnection()->prepare($query);
        $sth->execute($parameters);

        return $sth->rowCount() > 0;
    }

}