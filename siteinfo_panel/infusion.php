<?php

/* ---------------------------------------------------+
  | PHP-Fusion 7 Content Management System
  +----------------------------------------------------+
  | Copyright © 2002 - 2013 Nick Jones
  | http://www.php-fusion.co.uk/
  |----------------------------------------------------+
  | Infusion: SiteInfo_Panel
  | Author: globeFrEak (http://www.cwclan.de)
  +----------------------------------------------------+
  | This program is released as free software under the
  | Affero GPL license. You can redistribute it and/or
  | modify it under the terms of this license which you
  | can read by viewing the included agpl.txt or online
  | at www.gnu.org/licenses/agpl.html. Removal of this
  | copyright header is strictly prohibited without
  | written permission from the original author(s).
  +---------------------------------------------------- */
if (!defined("IN_FUSION")) {
    die("Access Denied");
}
if (file_exists(INFUSIONS . "siteinfo_panel/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "siteinfo_panel/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "siteinfo_panel/locale/English.php";
}

// Infusion general information
$inf_title = $locale['siptit'];
$inf_version = $locale['sipver'];
$inf_developer = "globefreak";
$inf_weburl = "https://github.com/globeFrEak/PHPF_SiteInfo_Panel";
$inf_email = "globefreak@cwclan.de";
$inf_folder = "siteinfo_panel";
$inf_description = $locale['sipdesc'];

$inf_adminpanel[1] = array(
    "title" => $locale['ccptit'],
    "image" => "../infusions/clancash_panel/images/admin.gif",
    "panel" => "sip_settings_panel.php",
    "rights" => "SIP"
);
?>
