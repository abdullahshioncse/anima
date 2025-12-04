<?php
/**
 * Anima Theme Uninstallation Script
 * OpenCart 4.1.0.3 Compatible
 * 
 * This script is called by OpenCart's extension installer
 * to remove the theme extension from the database
 */

// Remove theme extension registration
$db->query("DELETE FROM `" . DB_PREFIX . "extension` WHERE `type` = 'theme' AND `code` = 'anima'");

// Remove theme settings
$db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `code` = 'theme_anima'");
