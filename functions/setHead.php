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

    //FAVICON

    $html .= "<link rel='stylesheet' href='" . CSS_PATH . "/styles.css'>\n";
    $html .= "</head>\n";
    $html .= "<body>\n";

    echo $html;
}
