<?php


// namespace Functions;


function setHead($title, $description)
{
    $html = "<!DOCTYPE html>\n";
    $html .= "<html lang='pt-br'>\n";
    $html .= "<head>\n";
    $html .= "<meta charset='UTF-8'>\n";
    $html .= "<meta name='viewport' content='width=device-width, initial-scale='>\n";
    $html .= "<meta name='author' content='Matheus'>\n";
    $html .= "<meta name='format-detection' content='telephone=no'>\n";
    $html .= "<meta name='description' content='$description'>\n";
    $html .= "<title>$title</title>\n";

    $html .= "<link rel='stylesheet' href='" . CSS_PATH . "/styles.css'>\n";
    $html .= "<link rel='apple-touch-icon' sizes='180x180' href='" . ASSETS_PATH . "/apple-touch-icon.png'>\n";
    $html .= "<link rel='icon' type='image/png' sizes='32x32' href='" . ASSETS_PATH . "/favicon-32x32.png'>\n";
    $html .= "<link rel='icon' type='image/png' sizes='16x16' href='" . ASSETS_PATH . "/favicon-16x16.png'>\n";
    $html .= "<link rel='manifest' href='" . ASSETS_PATH . "/site.webmanifest'>\n";
    $html .= "<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>\n";
    $html .= "</head>\n";
    $html .= "<body>\n";

    echo $html;
}
