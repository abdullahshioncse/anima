<?php
/**
 * Anima Theme Installation Script
 * OpenCart 4.1.0.3 Compatible
 * 
 * This script is called by OpenCart's extension installer
 * to register the theme extension in the database
 */

// Register theme extension
$db->query("INSERT INTO `" . DB_PREFIX . "extension` SET `extension` = 'Anima Theme', `type` = 'theme', `code` = 'anima'");

// Set default theme settings
$db->query("INSERT INTO `" . DB_PREFIX . "setting` SET `store_id` = '0', `code` = 'theme_anima', `key` = 'theme_anima_status', `value` = '1'");
$db->query("INSERT INTO `" . DB_PREFIX . "setting` SET `store_id` = '0', `code` = 'theme_anima', `key` = 'theme_anima_phone', `value` = '965-22091914'");
$db->query("INSERT INTO `" . DB_PREFIX . "setting` SET `store_id` = '0', `code` = 'theme_anima', `key` = 'theme_anima_sale_banner', `value` = 'حصل على خصم 20٪ قبل نهاية نوفمبر!'");
