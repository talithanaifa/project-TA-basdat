<?php


function getDatabaseConfig(): array
{
    return [
        "database" => [
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=db_voucher",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}