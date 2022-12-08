<?php

include_once "DatabaseAccess.php";

class DatabaseAccessManager
{
    private static ?DatabaseAccess $instance = null;

    public static function getInstance() : DatabaseAccess
    {
        if (static::$instance === null) {
            static::$instance = new DatabaseAccess();
        }

        return static::$instance;
    }

}