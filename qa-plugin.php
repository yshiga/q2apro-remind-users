<?php
/*
	Plugin Name: Remind Users after Registration
	Plugin URI: http://www.q2apro.com/plugins/remind-users
	Plugin Description: Remind users to complete their profile and upload an avatar within x hours after registration
	Plugin Version: 0.1
	Plugin Date: 2015-04-16
	Plugin Author: q2apro.com
	Plugin Author URI: http://www.q2apro.com/
	Plugin License: GPLv3
	Plugin Minimum Question2Answer Version: 1.6
	Plugin Update Check URI: https://raw.githubusercontent.com/q2apro/q2apro-remind-users/master/qa-plugin.php
	
	This program is free software. You can redistribute and modify it 
	under the terms of the GNU General Public License.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.gnu.org/licenses/gpl.html

*/

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}
	
	// language file
	qa_register_plugin_phrases('q2apro-remindusers-lang-*.php', 'q2apro_remindusers_lang');
	
	// layer to show notice
    qa_register_plugin_layer('q2apro-remindusers-layer.php', 'q2apro RemindUsers Layer');
	
	// admin options
	qa_register_plugin_module('module', 'q2apro-remindusers-admin.php', 'q2apro_remindusers_admin', 'q2apro RemindUsers Admin');


/*                              
    Omit PHP closing tag to help avoid accidental output
*/