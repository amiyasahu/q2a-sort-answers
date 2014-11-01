<?php
/*
  Question2Answer (c) Gideon Greenspan
  Q2A Sort Answers (c) Amiya Sahu (developer.amiya@outlook.com)
  http://www.question2answer.org/
  
  File: qa-plugin/q2a-sort-answers/qa-sa-admin.php
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
	class qa_sa_admin {

		const SAVE_BTN          = 'ami_sa_save_button' ;
		const PLUGIN_ENABLED    = 'ami_sa_enabled' ;

		function option_default($option) {
			switch ($option) {
				case self::PLUGIN_ENABLED:
					return 1 ;
						break;
				default:
					return null ;
					break;
			}
		}

		function admin_form(&$qa_content)
		{

		//	Process form input

			$ok = null;
			if (qa_clicked(self::SAVE_BTN)) {
				qa_opt(self::PLUGIN_ENABLED ,    (bool)qa_post_text(self::PLUGIN_ENABLED));
				$ok = qa_lang('admin/options_saved');
			}

			$fields[self::PLUGIN_ENABLED] = array(
				'label' => qa_lang('ami_sa/enable_plugin'),
				'tags'  => 'NAME="'.self::PLUGIN_ENABLED.'" id="'.self::PLUGIN_ENABLED.'"',
				'value' => qa_opt(self::PLUGIN_ENABLED),
				'type'  => 'checkbox',
			);
			
			return array(
				'ok' => ($ok) ? $ok : null,
				
				'fields' => $fields,
				
				'buttons' => array(
					array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'NAME="'.self::SAVE_BTN.'"',
					),
				),
			);
		}
	}

