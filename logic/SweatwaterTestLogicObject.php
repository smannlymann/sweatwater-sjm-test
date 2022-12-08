<?php

namespace logic;

use model\SweatwaterTest;
use query\SweatwaterTestQuery;

class SweatwaterTestLogicObject
{

    public function fixExpectedShipDates(): int
    {
        $commentArray = SweatwaterTestQuery::getCommentListWithShipDatesToFix();

        $numberFixed = 0;

        /** @var SweatwaterTest $comment */
        foreach ($commentArray as $comment) {
            preg_match('/ship date: (\d+\/\d+\/\d+)\D+/i', $comment->getComments(), $output_array);
            $rawShipDate = $output_array[1];
            $cleanShipDate = $this->getCleanDate($rawShipDate);
            if ($cleanShipDate === null) {
                continue;
            }
            SweatwaterTestQuery::updateCommentExpectedShipDateByOrderId($comment->orderId, $cleanShipDate);
            $numberFixed++;
        }

        return $numberFixed;
    }

    private function getCleanDate(string $rawDate): ?string
    {
        $time = strtotime($rawDate);
        $cleanDate = date('Y-m-d', $time);

        if ($cleanDate !== false) {
            return $cleanDate;
        }

        return null;
    }

}