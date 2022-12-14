<?php

namespace model;

class SweatwaterTest
{
    public int $orderId;
    public string $comments;
    public string $shipdateExpected;

    public string $classification = '';

    //PHPStorm autogen getters + setters
    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     */
    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return string
     */
    public function getShipdateExpected(): string
    {
        return $this->shipdateExpected;
    }

    /**
     * @param string $shipdateExpected
     */
    public function setShipdateExpected(string $shipdateExpected): void
    {
        $this->shipdateExpected = $shipdateExpected;
    }

    /**
     * @return string
     */
    public function getClassification(): string
    {
        return $this->classification;
    }

    /**
     * @param string $classification
     */
    public function setClassification(string $classification): void
    {
        $this->classification = $classification;
    }




}