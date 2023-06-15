<?php

function showAlert($message)
{
  $html = "<script type='text/javascript'>\n";
  $html .= 'alert("' . $message . '");' . "\n";
  $html .= "</script>\n";
  echo $html;
}
