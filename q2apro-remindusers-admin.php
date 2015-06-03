<?php
/*
	Plugin Name: Remind Users after Registration
	Plugin URI: http://www.q2apro.com/plugins/remind-users
*/

	class q2apro_remindusers_admin {

		function init_queries($tableslc) {
			return null;
		}

		// option's value is requested but the option has not yet been set
		function option_default($option) {
			switch($option) {
				case 'q2apro_remindusers_enabled':
					return 1; // true
				case 'q2apro_remindusers_timer':
					return 2; // 2 hours
				case 'q2apro_remindusers_customtext':
					return null; // 2 hours
				case 'q2apro_remindusers_pages':
					return 'qa,question,questions'; // default pages
				case 'q2apro_remindusers_avator_required':
					return 1; // true
				case 'q2apro_remindusers_goal':
					return 100;
				default:
					return null;
			}
		}
			
		function allow_template($template) {
			return ($template!='admin');
		}       
			
		function admin_form(&$qa_content){                       

			// process the admin form if admin hit Save-Changes-button
			$ok = null;
			if (qa_clicked('q2apro_remindusers_save')) {
				qa_opt('q2apro_remindusers_enabled', (bool)qa_post_text('q2apro_remindusers_enabled')); // empty or 1
				qa_opt('q2apro_remindusers_timer', (int)qa_post_text('q2apro_remindusers_timer')); // hours
				qa_opt('q2apro_remindusers_customtext', (String)qa_post_text('q2apro_remindusers_customtext')); // custom text
				qa_opt('q2apro_remindusers_pages', str_replace(' ', '', (String)qa_post_text('q2apro_remindusers_pages'))); // pages
				qa_opt('q2apro_remindusers_avator_required', (bool)qa_post_text('q2apro_remindusers_avator_required')); 
				qa_opt('q2apro_remindusers_goal', (int)qa_post_text('q2apro_remindusers_goal')); 
				$ok = qa_lang('admin/options_saved');
			}
			
			// form fields to display frontend for admin
			$fields = array();
			
			$fields[] = array(
				'type' => 'checkbox',
				'label' => qa_lang('q2apro_remindusers_lang/enable_plugin'),
				'tags' => 'name="q2apro_remindusers_enabled"',
				'value' => qa_opt('q2apro_remindusers_enabled'),
			);
			
			$fields[] = array(
				'type' => 'number',
				'label' => qa_lang('q2apro_remindusers_lang/admin_remindusers_goal'),
				'tags' => 'name="q2apro_remindusers_goal"',
				'value' => qa_opt('q2apro_remindusers_goal'),
			);

			$fields[] = array(
				'type' => 'checkbox',
				'label' => qa_lang('q2apro_remindusers_lang/admin_avator_required'), 
				'tags' => 'name="q2apro_remindusers_avator_required"',
				'value' => qa_opt('q2apro_remindusers_avator_required'),
			);

			$fields[] = array(
				'type' => 'number',
				'label' => qa_lang('q2apro_remindusers_lang/admin_remindusers_timer'),
				'tags' => 'name="q2apro_remindusers_timer"',
				'value' => qa_opt('q2apro_remindusers_timer'),
			);
			
			$fields[] = array(
				'type' => 'text',
				'label' => qa_lang('q2apro_remindusers_lang/admin_remindusers_customtext'),
				'tags' => 'name="q2apro_remindusers_customtext"',
				'value' => qa_opt('q2apro_remindusers_customtext'),
			);

			$fields[] = array(
				'type' => 'text',
				'label' => qa_lang('q2apro_remindusers_lang/admin_remindusers_pages'),
				'tags' => 'name="q2apro_remindusers_pages"',
				'value' => qa_opt('q2apro_remindusers_pages'),
			);

			return array(     
				'ok' => ($ok && !isset($error)) ? $ok : null,
				'fields' => $fields,
				'buttons' => array(
					array(
						'label' => qa_lang_html('main/save_button'),
						'tags' => 'name="q2apro_remindusers_save"',
					),
				),
			);
		}
	}


/*
	Omit PHP closing tag to help avoid accidental output
*/
