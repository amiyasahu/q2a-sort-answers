<?php

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

return array(
	/*languages for admin panel*/
	'enable_plugin'       => 'Enable this plugin ' ,
	'order_answers_by'    => 'Order answers by' ,
	'oldest'              => 'Oldest ' ,
	'oldest_title'        => 'Sort by Oldest answer on the current page' ,
	'latest'              => 'Latest ' ,
	'latest_title'        => 'Sort by Latest answer on the current page' ,
	'highest_votes'       => 'Highest Votes' ,
	'highest_votes_title' => 'Sort by Highest Voted answers on current page ' ,
);

/*
	Omit PHP closing tag to help avoid accidental output
*/