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
if (!defined("IN_FUSION") || !IN_FUSION)
    die("Access denied!");

include INFUSIONS . "siteinfo_panel/include/locale.php";

//add_to_head("<script type='text/javascript' src='" . INFUSIONS . "siteinfo_panel/js/freewall.js'></script>");
add_to_head("<link rel='stylesheet' href='" . INFUSIONS . "siteinfo_panel/css/sipstyles.css' type='text/css' media='Screen' />");

if ($userdata['user_lastvisit']) {
    opentable($locale['sip001']);
    echo "<div id='freewall'>";
    //$resultnews = dbquery("SELECT news_id,news_news,news_subject FROM " . DB_NEWS . " WHERE news_datestamp > " . $userdata['user_lastvisit'] . " AND news_visibility = 0 ORDER BY news_datestamp");
    $resultnews = dbquery("SELECT news_id FROM " . DB_NEWS . " WHERE news_visibility = 0 ORDER BY news_datestamp");
    $rows = dbrows($resultnews);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/newspaper--plus.png' alt='News'>";
            echo $rows;
            echo "<span>die neuesten News</span>";
        echo "</a>";
        echo "</div>";
    }

    //$resultarticles = dbquery("SELECT article_id,article_subject,article_snippet FROM " . DB_ARTICLES . " WHERE article_datestamp > " . $userdata['user_lastvisit'] . " ORDER BY article_datestamp");
    $resultarticles = dbquery("SELECT article_id FROM " . DB_ARTICLES . " ORDER BY article_datestamp");
    $rows = dbrows($resultarticles);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/blog--plus.png' alt='Article'>";
            echo $rows;
            echo "<span>die neuesten Artikel</span>";
        echo "</a>";
        echo "</div>";
    }

    //$resultcomments = dbquery("SELECT comment_id,comment_item_id,comment_type,comment_message FROM " . DB_COMMENTS . " WHERE comment_datestamp > " . $userdata['user_lastvisit'] . " ORDER BY comment_datestamp");
    $resultcomments = dbquery("SELECT comment_id FROM " . DB_COMMENTS . " ORDER BY comment_datestamp");
    $rows = dbrows($resultcomments);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/balloon--plus.png' alt='Comments'>";
            echo $rows;
            echo "<span>die neuesten Kommentare</span>";
        echo "</a>";
        echo "</div>";
    }

    //$resultphotos = dbquery("SELECT photo_id,photo_title,photo_thumb1 FROM " . DB_PHOTOS . " WHERE photo_datestamp > " . $userdata['user_lastvisit'] . " ORDER BY photo_datestamp");
    $resultphotos = dbquery("SELECT photo_id FROM " . DB_PHOTOS . " ORDER BY photo_datestamp");
    $rows = dbrows($resultphotos);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/photo-album--plus.png' alt='News'>";
            echo $rows;
            echo "<span>die neuesten Fotos</span>";
        echo "</a>";
        echo "</div>";
    }

    //$resultpolls = dbquery("SELECT poll_id,poll_title FROM " . DB_POLLS . " WHERE poll_started > " . $userdata['user_lastvisit'] . " AND poll_ended < " . $userdata['user_lastvisit'] . " ORDER BY poll_started");
    $resultpolls = dbquery("SELECT poll_id FROM " . DB_POLLS . " ORDER BY poll_started");
    $rows = dbrows($resultpolls);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/chart--plus.png' alt='News'>";
            echo $rows;
            echo "<span>die neuesten Umfragen</span>";
        echo "</a>";
        echo "</div>";
    }

    //$resultshout = dbquery("SELECT shout_id,shout_name,shout_message FROM " . DB_PREFIX . "shoutbox WHERE shout_datestamp > " . $userdata['user_lastvisit'] . " AND shout_hidden = 0 ORDER BY shout_datestamp");
    $resultshout = dbquery("SELECT shout_id FROM " . DB_PREFIX . "shoutbox WHERE shout_hidden = 0 ORDER BY shout_datestamp");
    $rows = dbrows($resultshout);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/sticky-note--plus.png' alt='News'>";
            echo $rows;
            echo "<span>die neuesten Shoutbox Posts</span>";
        echo "</a>";
        echo "</div>";
    }

    //$resultuser = dbquery("SELECT user_id,user_name,user_avatar FROM " . DB_USERS . " WHERE user_joined > " . $userdata['user_lastvisit'] . " ORDER BY user_joined");
    $resultuser = dbquery("SELECT user_id FROM " . DB_USERS . " ORDER BY user_joined");
    $rows = dbrows($resultuser);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/user--plus.png' alt='News'>";
            echo $rows;
            echo "<span>die neuesten Mitlieder</span>";
        echo "</a>";
        echo "</div>";
    }

    //$resultdownload = dbquery("SELECT download_id,download_title,download_description_short FROM " . DB_DOWNLOADS . " WHERE download_datestamp > " . $userdata['user_lastvisit'] . " ORDER BY download_datestamp");
    $resultdownload = dbquery("SELECT download_id FROM " . DB_DOWNLOADS . " ORDER BY download_datestamp");
    $rows = dbrows($resultdownload);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/box--plus.png' alt='News'>";
            echo $rows;
            echo "<span>die neuesten Downloads</span>";
        echo "</a>";
        echo "</div>";
    }


    $result = dbquery("SELECT p.forum_id FROM " . DB_POSTS . " AS p," . DB_THREADS . " AS t," . DB_FORUMS . " AS f WHERE p.forum_id=f.forum_id AND p.thread_id=t.thread_id AND post_hidden = 0 ORDER BY post_datestamp");
    $rows = dbrows($result);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/folder--plus.png' alt='News'>";
            echo $rows;
            echo "<span>die neuesten Forumposts</span>";
        echo "</a>";
        echo "</div>";
    }
    
    $result = dbquery("SELECT weblink_id FROM " . DB_WEBLINKS . " ORDER BY weblink_datestamp");
    $rows = dbrows($result);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/globe--plus.png' alt='News'>";
            echo $rows;
            echo "<span>die neuesten Weblinks</span>";
        echo "</a>";
        echo "</div>";
    }
    
    $result = dbquery("SELECT message_id FROM " . DB_MESSAGES . " WHERE message_to = ".$userdata['user_id']." ORDER BY message_datestamp");
    $rows = dbrows($result);
    if ($rows > 0) {
        echo "<div class='brick'>";
        echo "<a href='#' class='infotip'>";
            echo "<img src='" . INFUSIONS . "siteinfo_panel/images/inbox--plus.png' alt='News'>";            
            echo $rows;
            echo "<span>die neuesten Nachrichten</span>";        
        echo "</a>";
        echo "</div>";
    }
    echo "</div>";
    closetable();   
}
?>
