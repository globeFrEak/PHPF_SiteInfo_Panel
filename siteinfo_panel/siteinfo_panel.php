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

if (file_exists(INFUSIONS . "siteinfo_panel/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "siteinfo_panel/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "siteinfo_panel/locale/English.php";
}

add_to_head("<link rel='stylesheet' href='" . INFUSIONS . "siteinfo_panel/css/sipstyles.css' type='text/css' media='Screen' />");

//News
$resultnews = dbquery("SELECT news_id,news_news,news_subject FROM " . DB_NEWS . " WHERE news_datestamp > " . $lastvisited . " AND news_visibility = 0 ORDER BY news_datestamp");
//$resultnews = dbquery("SELECT news_id FROM " . DB_NEWS . " WHERE news_visibility = 0 ORDER BY news_datestamp");
$rowsnews = dbrows($resultnews);
//Comments
$resultcomments = dbquery("SELECT comment_id,comment_item_id,comment_type,comment_message FROM " . DB_COMMENTS . " WHERE comment_datestamp > " . $lastvisited . " ORDER BY comment_datestamp");
//$resultcomments = dbquery("SELECT comment_id FROM " . DB_COMMENTS . " ORDER BY comment_datestamp");
$rowscomments = dbrows($resultcomments);
//Photos
$resultphotos = dbquery("SELECT photo_id,photo_title,photo_thumb1 FROM " . DB_PHOTOS . " WHERE photo_datestamp > " . $lastvisited . " ORDER BY photo_datestamp");
//$resultphotos = dbquery("SELECT photo_id FROM " . DB_PHOTOS . " ORDER BY photo_datestamp");
$rowsphotos = dbrows($resultphotos);
//Shouts
$resultshout = dbquery("SELECT shout_id,shout_name,shout_message FROM " . DB_PREFIX . "shoutbox WHERE shout_datestamp > " . $lastvisited . " AND shout_hidden = 0 ORDER BY shout_datestamp");
//$resultshout = dbquery("SELECT shout_id FROM " . DB_PREFIX . "shoutbox WHERE shout_hidden = 0 ORDER BY shout_datestamp");
$rowsshout = dbrows($resultshout);
//Forum
$resultforum = dbquery("SELECT p.forum_id FROM " . DB_POSTS . " AS p," . DB_THREADS . " AS t," . DB_FORUMS . " AS f WHERE p.forum_id=f.forum_id AND p.thread_id=t.thread_id AND post_hidden = 0 AND post_datestamp > " . $lastvisited . " ORDER BY post_datestamp");
//$resultforum = dbquery("SELECT p.forum_id FROM " . DB_POSTS . " AS p," . DB_THREADS . " AS t," . DB_FORUMS . " AS f WHERE p.forum_id=f.forum_id AND p.thread_id=t.thread_id AND post_hidden = 0 ORDER BY post_datestamp");
$rowsforum = dbrows($resultforum);
//PMs
$resultmessage = dbquery("SELECT message_id FROM " . DB_MESSAGES . " WHERE message_to = " . $userdata['user_id'] . " AND message_datestamp > " . $lastvisited . " ORDER BY message_datestamp");
//$resultmessage = dbquery("SELECT message_id FROM " . DB_MESSAGES . " WHERE message_to = " . $userdata['user_id'] . " ORDER BY message_datestamp");
$rowsmessage = dbrows($resultmessage);

$rows = $rowsnews + $rowscomments + $rowsphotos + $rowsshout + $rowsforum + $rowsmessage;


if ($rows > 0) {
    opentable($rows == 1 ? $rows . $locale['sip001'] : $rows . $locale['sip002']);
    //News
    if ($rowsnews > 0) {
        echo "<a href='" . BASEDIR . "'news.php?readmore' class='btn cwtooltip' data-original-title='neue News'>";
        echo "<span class='icon-newspaper mid sipicon'></span>";
        echo $rowsnews;
        echo "</a>";
    }    
    //Comments
    if ($rowscomments > 0) {
        echo "<a href='" . BASEDIR . "cw_comments_archive.php' class='btn cwtooltip' data-original-title='neue Kommentare'>";
        echo "<span class='icon-bubbles mid sipicon'></span>";
        echo $rowscomments;
        echo "</a>";
    }
    //Photos
    if ($rowsphotos > 0) {
        echo "<a href='" . BASEDIR . "cw_latestsphotos.php' class='btn cwtooltip' data-original-title='neue Fotos'>";
        echo "<span class='icon-image2 mid sipicon'></span>";
        echo $rowsphotos;
        echo "</a>";
    }
    //Shoutbox    
    if ($rowsshout > 0) {
        echo "<a href='" . INFUSIONS . "shoutbox_panel/shoutbox_archive.php' class='btn cwtooltip' data-original-title='neue Shouts'>";
        echo "<span class='icon-bubble2 mid sipicon'></span>";
        echo $rowsshout;
        echo "</a>";
    }
    //Forum
    if ($rowsforum > 0) {
        echo "<a href='" . INFUSIONS . "forum_threads_list_panel/newposts.php' class='btn cwtooltip' data-original-title='neue Forenbeitr&auml;ge'>";
        echo "<span class='icon-folder-open mid sipicon'></span>";
        echo $rowsforum;
        echo "</a>";
    }
    //PMs    
    if ($rowsmessage > 0) {
        echo "<a href='" . BASEDIR . "cw_messages.php' class='btn cwtooltip' data-original-title='neue private Nachrichten'>";
        echo "<span class='icon-envelop mid sipicon'></span>";
        echo $rowsmessage;
        echo "</a>";
    }
    //Article
    //$resultarticles = dbquery("SELECT article_id,article_subject,article_snippet FROM " . DB_ARTICLES . " WHERE article_datestamp > " . $userdata['user_lastvisit'] . " ORDER BY article_datestamp");
    //$resultarticles = dbquery("SELECT article_id FROM " . DB_ARTICLES . " ORDER BY article_datestamp");
    //$rowsarticles = dbrows($resultarticles);
    /**
    if ($rowsarticles > 0) {
        echo "<a href='" . BASEDIR . "articles.php' class='btn cwtooltip' data-original-title='neue Artikel'>";
        echo "<span class='icon-file mid sipicon'></span>";
        echo $rowsarticles;
        echo "</a>";
    }
    **/
    //Umfragen    
    //$resultpolls = dbquery("SELECT poll_id,poll_title FROM " . DB_POLLS . " WHERE poll_started > " . $userdata['user_lastvisit'] . " AND poll_ended < " . $userdata['user_lastvisit'] . " ORDER BY poll_started");
    /**
      $resultpolls = dbquery("SELECT poll_id FROM " . DB_POLLS . " ORDER BY poll_started");
      $rows = dbrows($resultpolls);
      if ($rows > 0) {
      echo "<div class='brick'>";
      echo "<a href='" . BASEDIR . "cw_comments_archive.php'>";
      echo "<img src='" . INFUSIONS . "siteinfo_panel/images/chart--plus.png' alt='News'>";
      echo $rows;
      echo "<span>die neuesten Umfragen</span>";
      echo "</a>";
      echo "</div>";
      }
     * */
    //Weblink
    /**
      $result = dbquery("SELECT weblink_id FROM " . DB_WEBLINKS . " ORDER BY weblink_datestamp");
      $rows = dbrows($result);
      if ($rows > 0) {
      echo "<div class='brick'>";
      echo "<a href='" . BASEDIR . "cw_comments_archive.php'>";
      echo "<img src='" . INFUSIONS . "siteinfo_panel/images/globe--plus.png' alt='News'>";
      echo $rows;
      echo "<span>die neuesten Weblinks</span>";
      echo "</a>";
      echo "</div>";
      }
     * */
    //User
    //$resultuser = dbquery("SELECT user_id,user_name,user_avatar FROM " . DB_USERS . " WHERE user_joined > " . $userdata['user_lastvisit'] . " ORDER BY user_joined");
    /**
      $resultuser = dbquery("SELECT user_id FROM " . DB_USERS . " ORDER BY user_joined");
      $rows = dbrows($resultuser);
      if ($rows > 0) {
      echo "<div class='brick'>";
      echo "<a href='" . BASEDIR . "cw_comments_archive.php'>";
      echo "<img src='" . INFUSIONS . "siteinfo_panel/images/user--plus.png' alt='News'>";
      echo $rows;
      echo "<span>die neuesten Mitlieder</span>";
      echo "</a>";
      echo "</div>";
      }
     * */
    //Download
    //$resultdownload = dbquery("SELECT download_id,download_title,download_description_short FROM " . DB_DOWNLOADS . " WHERE download_datestamp > " . $userdata['user_lastvisit'] . " ORDER BY download_datestamp");
    /**
      $resultdownload = dbquery("SELECT download_id FROM " . DB_DOWNLOADS . " ORDER BY download_datestamp");
      $rows = dbrows($resultdownload);
      if ($rows > 0) {
      echo "<div class='brick'>";
      echo "<a href='" . BASEDIR . "cw_comments_archive.php'>";
      echo "<img src='" . INFUSIONS . "siteinfo_panel/images/box--plus.png' alt='News'>";
      echo $rows;
      echo "<span>die neuesten Downloads</span>";
      echo "</a>";
      echo "</div>";
      }
     * */
    closetable();
}
?>
