<?php


namespace BasisData\Project\App;


class View
{
    public static function show(string $view, $model)
    {
        require __DIR__ . '/../View/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/footer.php';
    }

    public static function redirect(string $url)
    {
        header("Location: $url");
    }
}