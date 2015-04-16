<?php
/*
	Plugin Name: Remind Users after Registration
	Plugin URI: http://www.q2apro.com/plugins/remind-users
*/

	class qa_html_theme_layer extends qa_html_theme_base {

		function notices(){
			
			$userid = qa_get_logged_in_userid();
			
			// show notification for registered users only
			if(isset($userid)) {
			
				// check age of user account
				$accountage = strtotime('now') - qa_get_logged_in_user_field('created');
				
				// show notice only within specified hours
				if($accountage < (int)(qa_opt('q2apro_remindusers_timer'))*60*60) {
				
					// by default there are 4 userfields (name, location, website, about)
					$userfields_total = qa_db_read_one_value(
						qa_db_query_sub('SELECT COUNT(DISTINCT fieldid) FROM ^userfields'
						),
						true
					);
					
					$userprofile_count = qa_db_read_one_value(
						qa_db_query_sub('SELECT COUNT(*) FROM ^userprofile
							WHERE userid = #
							AND content != ""
							',
							$userid
						),
						true
					);
					
					$profilecompletion = round(100*$userprofile_count/$userfields_total);
					
					$avataruploaded = (qa_get_logged_in_flags() & QA_USER_FLAGS_SHOW_AVATAR) || (qa_get_logged_in_flags() & QA_USER_FLAGS_SHOW_GRAVATAR);
					
					$notifypages = explode(',', str_replace(' ', '', qa_opt('q2apro_remindusers_pages')));

					if(in_array($this->template, $notifypages)) {
					
						// init
						$noticetext = '';
						
						// get username
						$handle = qa_get_logged_in_handle();
						
						if($profilecompletion<100) {
							$noticetext .= str_replace('$username$', $handle, qa_lang('q2apro_remindusers_lang/message_profile'));
							// link username to public user profile
							$noticetext = strtr($noticetext, array(
											'^1' => '<a href="'.qa_path('user').'/'.$handle.'">',
											'^2' => '</a>',
										));
							// set percentage of profile completion
							$noticetext = str_replace('$percentage$', $profilecompletion, $noticetext);
						}
						
						// add avatar notice
						if(!$avataruploaded) {
							$noticetext .= '<br />'.qa_lang('q2apro_remindusers_lang/message_avatar');
						}
						
						if(!empty($noticetext)) {
							$noticetext .= '<br />'.qa_lang('q2apro_remindusers_lang/message_account');
							
							// link account page
							$noticetext = strtr($noticetext, array(
											'^3' => '<a href="'.qa_path('account').'">',
											'^4' => '</a>',
										));
						}

						// in case the admin specified custom text
						$customtext = qa_opt('q2apro_remindusers_customtext');
						if(!empty($customtext)) {
							$noticetext .= '<br />'.$customtext;
						}

						if(!empty($noticetext)) {
							// add notice frontend - qa_notice_form($noticeid, $content, $rawnotice=null)
							$this->content['notices'][] = qa_notice_form('remind-avatar', $noticetext);
						}
						
					} // end in_array
				} // end $accountage
			} // end isset($userid)
			
			// execute default function
			qa_html_theme_base::notices();
			
		} // end function notices()
		
	} // end layer

/*
	Omit PHP closing tag to help avoid accidental output
*/