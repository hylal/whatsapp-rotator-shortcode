<?php
/*
Plugin Name: WhatsApp Shortcode Rotator
Description: Adds a shortcode to display a rotating WhatsApp button
Version: 1.0
Author: Hilaludin Wahid

*/

function whatsapp_shortcode_rotator($atts) {
  $whatsapp_accounts = array(
    '621234567890', 
    '622345678901', 
    '623456789012'
  );

  // get the current index from a cookie, or set it to 0
  $current_index = isset($_COOKIE['whatsapp_shortcode_index']) ? intval($_COOKIE['whatsapp_shortcode_index']) : 0;

  // increment the index, and wrap it around if it goes past the end of the array
  $current_index = ($current_index + 1) % count($whatsapp_accounts);

  // store the updated index in a cookie
  setcookie('whatsapp_shortcode_index', $current_index, time() + 3600, '/');

  // return the HTML for the WhatsApp button
  return '<a href="https://wa.me/' . $whatsapp_accounts[$current_index] . '">Contact Us via WhatsApp</a>';
}

add_shortcode('whatsapp_rotator', 'whatsapp_shortcode_rotator');
