<?php

/*
  Question2Answer (c) Gideon Greenspan
  Q2A Sort Answers (c) Amiya Sahu (developer.amiya@outlook.com)
  German Language by Martin Staffhorst
  
  http://www.question2answer.org/
  
  File: qa-plugin/q2a-sort-answers/qa-sa-lang-sp.php
  Version: See define()s at top of qa-include/qa-base.php

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
  
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  More about this license: http://www.question2answer.org/license.php
  
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

return array(
	/*languages for admin panel*/
    'enable_plugin'       => 'Plugin aktivieren' ,
    'order_answers_by'    => 'Antworten sortieren nach' ,
    'oldest'              => 'Älteste' ,
    'oldest_title'        => 'Älteste Anworten werden zuerst auf dieser Seite angezeigt' ,
    'latest'              => 'Neueste' ,
    'latest_title'        => 'Neueste Anworten werden zuerst auf dieser Seite angezeigt' ,
    'highest_votes'       => 'Punktzahl' ,
    'highest_votes_title' => 'Anworten mit höchster Punktzahl werden zuerst auf dieser Seite angezeigt' ,
);

/*
	Omit PHP closing tag to help avoid accidental output
*/