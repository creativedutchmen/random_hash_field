<?php

	Class extension_random_hash_field extends Extension{

		public function about(){
			return array(
				'name' => 'Random Hash Field',
				'version' => '1.0beta',
				'release-date' => '2011-06-10',
				'author' => array(
					'name' => 'Huib Keemink',
					'website' => 'http://www.creativedutchmen.com',
					'email' => 'huib.keemink@creativedutchmen.com'
				)
			);
		}
		
		public function install(){
			Symphony::Database()->query("CREATE TABLE IF NOT EXISTS `tbl_fields_random_hash_field` (
				`id` int(11) unsigned NOT NULL auto_increment,
				`field_id` int(11) unsigned NOT NULL,
				`validator` varchar(255), 
				PRIMARY KEY  (`id`),
				KEY `field_id` (`field_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
		}
	}