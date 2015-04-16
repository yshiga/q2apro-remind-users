<?php
/*
	Plugin Name: Remind Users after Registration
	Plugin URI: http://www.q2apro.com/plugins/remind-users
*/
	
	return array(
		// default
		'enable_plugin' => 'Plugin aktivieren', // Enable Plugin (checkbox)
		'minimum_level' => 'Auf Seite zugreifen und Posts bearbeiten können:', // Level to access this page and edit posts:
		'plugin_disabled' => 'Dieses Plugin wurde deaktiviert.', // Plugin has been disabled.
		'access_forbidden' => 'Zugriff nicht erlaubt.', // Access forbidden.
		'plugin_page_url' => 'Seite im Forum öffnen:', // Open page in forum:
		'contact' => 'Bei Fragen bitte ^1q2apro.com^2 besuchen.', // For questions please visit ^1q2apro.com^2
		
		// plugin
		'message_profile' => 'Hallo ^1$username$^2, dein Profil ist nur zu $percentage$ % ausgefüllt.',
		'message_profile_empty' => 'Hi ^1$username$^2, dein Profil ist noch leer.',
		'message_avatar' => 'Dein Profilbild fehlt noch. Bitte lade es hoch.',
		'message_account' => 'Du kannst dein ^3Profil hier bearbeiten^4.',
		'admin_remindusers_timer' => 'Anzeigedauer des Hinweises nach der Registrierung (in Stunden):',
		'admin_remindusers_customtext' => 'Optionaler Text unterhalb des Hinweises:',
		'admin_remindusers_pages' => 'Auf diesen Seiten soll der Hinweis angezeigt werden (mit Komma trennen):',
	);
	

/*
	Omit PHP closing tag to help avoid accidental output
*/