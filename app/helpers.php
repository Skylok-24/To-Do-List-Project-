<?php


function home()
{
    return trim(\app\App::get('config')['app']['home_url'],'/');
}

function redirect($to)
{
    header("Location: {$to}");
}

function redirect_home()
{
    redirect(home());
}

function back()
{
    redirect($_SERVER['HTTP_REFERER'] ?? home());
}

function view($name,$data = null)
{
    if ($data != null)
        extract($data);
    require_once "ressources/{$name}.view.php";
}