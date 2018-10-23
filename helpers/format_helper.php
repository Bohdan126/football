<?php
/**
 * Format The Date
 */
function formatDate($date){
  return date('F j, Y, G:i ', strtotime($date));
}

/**
 * Make text Shorter
 */
function shortenText($text, $chars =450){
  $text = $text. " ";
  $text = substr($text,0, $chars);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text. "...";
  return $text;
}
