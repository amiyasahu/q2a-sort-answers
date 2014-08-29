<?php

/*
        Plugin Name: Q2A Sort Answers
        Plugin URI: https://github.com/amiyasahu/q2a-sort-answers
        Plugin Update Check URI: https://raw.github.com/amiyasahu/q2a-sort-answers/master/qa-plugin.php
        Plugin Description: Enables the answer sorting for q2a sites for current page
        Plugin Version: 1.0
        Plugin Date: 2014-08-27
        Plugin Author: Amiya Sahu
        Plugin Author URI: http://amiyasahu.com
        Plugin License: GPLv2
        Plugin Minimum Question2Answer Version: 1.6
*/


        if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
        	header('Location: ../../');
        	exit;
        }

        if (!defined('AMI_SA_DIR')) {
                define('AMI_SA_DIR', dirname(__FILE__));
        }

        if (!defined('AMI_SA_DIR_NAME')) {
                define('AMI_SA_DIR_NAME', basename(dirname(__FILE__)));
        }

        require_once AMI_SA_DIR.'/qa-sa-admin.php';

        qa_register_plugin_module('module', 'qa-sa-admin.php', 'qa_sa_admin', 'Sort Answers Admin');
        qa_register_plugin_layer('qa-sa-layer.php', 'Sort Answers Layer');
        qa_register_plugin_phrases('qa-sa-lang-*.php', 'ami_sa');

/*
	Omit PHP closing tag to help avoid accidental output
*/
