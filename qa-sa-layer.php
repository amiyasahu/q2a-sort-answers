<?php

/*
  Question2Answer (c) Gideon Greenspan
  Q2A Sort Answers (c) Amiya Sahu (developer.amiya@outlook.com)
  http://www.question2answer.org/
  
  File: qa-plugin/q2a-sort-answers/qa-sa-layer.php
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

	require_once QA_INCLUDE_DIR.'qa-theme-base.php';
	require_once QA_INCLUDE_DIR.'qa-app-blobs.php';
	require_once QA_INCLUDE_DIR.'qa-app-users.php';

	class qa_html_theme_layer extends qa_html_theme_base {
		
		function head_css() {
			qa_html_theme_base::head_css();
		}

		function head_script()
		{
			if (qa_opt(qa_sa_admin::PLUGIN_ENABLED) && $this->template == 'question') {
			    $js_url = qa_opt('site_url').'qa-plugin/'.AMI_SA_DIR_NAME.'/js/sort-answers.js' ;
				if (!isset($this->content['script']['sa_script'])) {
					$this->content['script']['sa_script'] = '<script src="'.$js_url.'" type="text/javascript"></script>' ;
				}
			}
			qa_html_theme_base::head_script();
		}
		function body_script()
		{
			qa_html_theme_base::body_script();
		}
		
		function attribution()
		{
			
			qa_html_theme_base::attribution();

			if(qa_opt(qa_sa_admin::PLUGIN_ENABLED)){
				$this->output('<div id="qa-sa-all-ans" style="display:none;">');
				$this->output('<div id="ami-sort-util-data" style="display:none;">');
				$this->output('<div id="sorting-btns">');
				$this->output('<span style="font-weight:bold;"> '.qa_lang('ami_sa/order_answers_by').' </span> '.
							'<button class="a_sort_oldest" title="'.qa_lang('ami_sa/oldest_title').'">'.qa_lang('ami_sa/oldest').'</button>'.
							'<button class="a_sort_newest" title="'.qa_lang('ami_sa/latest_title').'">'.qa_lang('ami_sa/latest').'</button>'.
							'<button class="a_sort_highest_vote" title="'.qa_lang('ami_sa/highest_votes_title').'">'.qa_lang('ami_sa/highest_votes').'</button>');
				$this->output('</div>');

				// $this->output('<span id="ans-sort-data" data-page-size="'.qa_opt('page_size_q_as').'"></span>');

				$this->output('</div>');
				$this->output('</div>');
			}
		}

	}
	/*
		Omit PHP closing tag to help avoid accidental output
	*/