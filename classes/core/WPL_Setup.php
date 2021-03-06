<?php

class WPL_Setup extends WPL_Core {
	
	// check if setup is incomplete and display next step
	public function checkSetup( $page = false ) {
		global $pagenow;

		// check if safe mode is enabled
		$this->isPhpSafeMode();

		// check if incomatible plugins are active
		$this->checkPlugins();

		// check if a recent version of WooCommerce is installed
		$this->checkWooCommerce();

		// check if cURL is loaded
		if ( ! $this->isCurlLoaded() ) return false;

		// check for windows server
		// if ( $this->isWindowsServer() ) return false;
		$this->isWindowsServer( $page );

		// create folders if neccessary
		if ( $this->checkFolders() ) return false;

		// check for updates
		$this->checkForUpdates();

		// check if cron is working properly
		$this->checkCron();

		// check database after migration
		// $this->checkDatabase();

		// check for multisite installation
		// if ( $this->checkMultisite() ) return false;

		// setup wizard
		// if ( self::getOption('ebay_token') == '' ) {
		if ( ( '1' == self::getOption('setup_next_step') ) && ( $page != 'settings') ) {
		
			$msg1 = __('You have not linked WP-Lister to your eBay account yet.','wplister');
			$msg2 = __('To complete the setup procedure go to %s and follow the instructions.','wplister');
			$link = '<a href="admin.php?page=wplister-settings">'.__('Settings','wplister').'</a>';
			$msg2 = sprintf($msg2, $link);
			$msg = "<p><b>$msg1</b></p><p>$msg2</p>";
			$this->showMessage($msg,0,1);
		
		} elseif ( '2' == self::getOption('setup_next_step') ) {
		
			$title = $this->app_name .' '. __('Setup - Step 2','wplister');
			$msg1  = __('Before creating your first profile, we need to download certain information which are specific to the eBay site you selected.','wplister');
			$msg2  = __('This includes shipping options, payment methods, your custom store categories as well as the whole eBay category tree, which might take a while.','wplister');
			$url   = $pagenow . '?page=' . $_GET['page'];
			// $hidden  = '<input type="hidden" name="action" value="update_ebay_details_setup" />';
			$button  = '<a href="#" id="btn_update_ebay_data" onclick="return false;" class="button-primary">'.__('Update eBay details','wplister').'</a>';
			#$msg2  = sprintf($msg2, $link);
			$msg   = "<p><b>$title</b></p><p>$msg1</p><p>$msg2</p>";
			// $msg  .= "<form method='post' action='$url'>$hidden".wp_nonce_field( 'e2e_tools_page',"_wpnonce", true, false )."$button</form>";
			$msg  .= $button;
			$this->showMessage($msg,0,1);

			// remember when WP-Lister was connected to an eBay account for the first time
			update_option( 'ignore_orders_before_ts', time() );
		
		} elseif ( '3' == self::getOption('setup_next_step') ) {
		
			$tm = new TemplatesModel();
			$templates = $tm->getAll();
			if ( sizeof($templates) > 0 ) {
				self::updateOption('setup_next_step', '4');
			} else {
				$title = $this->app_name .' '. __('Setup - Step 3','wplister');
				$msg1 = __('Create a default listing template.','wplister');
				$msg2 = __('To create your first listing template click on %s.','wplister').'<br>';
				if ( @$_GET['action'] == 'add_new_template' )
					$msg2 = __('Replace the default text according to your requirements and save your template to continue.','wplister');
				$link = '<a href="admin.php?page=wplister-templates&action=add_new_template">'.__('New Template', 'wplister').'</a>';
				$msg2 = sprintf($msg2, $link);
				$msg = "<p><b>$title</b></p><p><b>$msg1</b></p><p>$msg2</p>";
				$this->showMessage($msg,0,1);			
			}
		
		} elseif ( '4' == self::getOption('setup_next_step') ) {
		
			$pm = new ProfilesModel();
			$profiles = $pm->getAll();
			if ( sizeof($profiles) > 0 ) {
				self::updateOption('setup_next_step', '0');
			} else {
				$title = $this->app_name .' '. __('Setup - Step 4','wplister');
				$msg1  = __('The final step: create your first listing profile.', 'wplister');
				$msg2  = __('Click on %s and start defining your listing options.<br>After saving your profile, visit your Products page and select the products to list on eBay.','wplister');
				$link  = '<a href="admin.php?page=wplister-profiles&action=add_new_profile">'.__('New Profile', 'wplister').'</a>';
				$msg2  = sprintf($msg2, $link);
				$msg   = "<p><b>$msg1</b></p><p>$msg2</p>";
				$this->showMessage($msg,0,1);
			}
		
		} elseif ( '5' == self::getOption('setup_next_step') ) {
		
			$title = $this->app_name .' '. __('Setup is complete.','wplister');
			$msg1  = __('You are ready now to list your first items.', 'wplister');
			$msg2  = __('Visit your Products page, select a few items and select "List on eBay" from the bulk actions menu.','wplister');
			$msg   = "<p><b>$msg1</b></p><p>$msg2</p>";
			$this->showMessage($msg,0,1);
			update_option('wplister_setup_next_step', '0');
		
		}

		// warn about invalid token
		if ( self::getOption('ebay_token_is_invalid') ) {
		
			// $title = __('Your eBay token has been marked as invalid.','wplister');
			$msg1  = __('Your eBay token seems to be invalid.', 'wplister');
			$msg2  = __('To re-authenticate WP-Lister visit the Settings page, click on "Change Account" and follow the instructions.','wplister');
			$msg   = "<p><b>$msg1</b></p><p>$msg2</p>";
			$this->showMessage($msg,0,1);
		
		}
		
		// db upgrade
		self::upgradeDB();

		// clean db
		self::cleanDB();

		// fetch user details if not done yet
		if ( ( self::getOption('ebay_token') != '' ) && ( ! self::getOption('ebay_user') ) ) {
			$this->initEC();
			$UserID = $this->EC->GetUser();
			$this->EC->closeEbay();
			// $this->showMessage( __('Account details were updated.','wplister') . $UserID );
			// $this->showMessage( __('Your UserID is','wplister') . $UserID );
		}
		
		// fetch user details if not done yet
		if ( ( self::getOption('ebay_token') != '' ) && ( ! self::getOption('ebay_seller_profiles_enabled') ) ) {
			$this->initEC();
			$this->EC->GetUserPreferences();
			$this->EC->closeEbay();
		}

		// fetch token expiration date if not done yet
		if ( ( self::getOption('ebay_token') != '' ) && ( ! self::getOption('ebay_token_expirationtime') ) ) {
			$this->initEC();
			$expdate = $this->EC->GetTokenStatus();
			$this->EC->closeEbay();
			// $msg = __('Your token will expire on','wplister') . ' ' . $expdate; 
			// $msg .= ' (' . human_time_diff( strtotime($expdate) ) . ' from now)';
			// $this->showMessage( $msg );
		}
				
		// check token expiration date
		self::checkToken();

	}


	// clean database of old log records
	// TODO: hook this into daily cron schedule
	public function cleanDB() {
		global $wpdb;

		if ( isset( $_GET['page'] ) && ( $_GET['page'] == 'wplister-settings' ) && ( self::getOption('log_to_db') == '1' ) ) {
			$days_to_keep = self::getOption( 'log_days_limit', 30 );		
			// $delete_count = $wpdb->get_var('SELECT count(id) FROM '.$wpdb->prefix.'ebay_log WHERE timestamp < DATE_SUB(NOW(), INTERVAL 1 MONTH )');
			$delete_count = $wpdb->get_var('SELECT count(id) FROM '.$wpdb->prefix.'ebay_log WHERE timestamp < DATE_SUB(NOW(), INTERVAL '.$days_to_keep.' DAY )');
			if ( $delete_count ) {
				$wpdb->query('DELETE FROM '.$wpdb->prefix.'ebay_log WHERE timestamp < DATE_SUB(NOW(), INTERVAL '.$days_to_keep.' DAY )');
				// $this->showMessage( __('Log entries cleaned: ','wplister') . $delete_count );
			}
		}
	}


	// update permissions
	public function updatePermissions() {

		$roles = array('administrator', 'shop_manager', 'super_admin');
		foreach ($roles as $role) {
			$role =& get_role($role);
			if ( empty($role) )
				continue;
	 
			$role->add_cap('manage_ebay_listings');
			$role->add_cap('manage_ebay_options');
			$role->add_cap('prepare_ebay_listings');
			$role->add_cap('publish_ebay_listings');

		}

	}


	// upgrade db
	public function upgradeDB() {
		global $wpdb;

		$db_version = get_option('wplister_db_version', 0);
		$hide_message = $db_version == 0 ? true : false;
		$msg = false;

		// initialize db with version 4
		if ( 4 > $db_version ) {
			$new_db_version = 4;
		

			// create table: ebay_auctions
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_auctions` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `ebay_id` bigint(255) DEFAULT NULL,
			  `auction_title` varchar(255) DEFAULT NULL,
			  `auction_type` varchar(255) DEFAULT NULL,
			  `listing_duration` varchar(255) DEFAULT NULL,
			  `date_created` datetime DEFAULT NULL,
			  `date_published` datetime DEFAULT NULL,
			  `date_finished` datetime DEFAULT NULL,
			  `end_date` datetime DEFAULT NULL,
			  `price` float DEFAULT NULL,
			  `quantity` int(11) DEFAULT NULL,
			  `quantity_sold` int(11) DEFAULT NULL,
			  `status` varchar(50) DEFAULT NULL,
			  `details` text,
			  `ViewItemURL` varchar(255) DEFAULT NULL,
			  `GalleryURL` varchar(255) DEFAULT NULL,
			  `post_content` text,
			  `post_id` int(11) DEFAULT NULL,
			  `profile_id` int(11) DEFAULT NULL,
			  `profile_data` text,
			  `template` varchar(255) DEFAULT '',
			  `fees` float DEFAULT NULL,
			  PRIMARY KEY  (`id`)
			);";
			#dbDelta($sql);
			$wpdb->query($sql);	echo $wpdb->last_error;
						
			// create table: ebay_categories
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_categories` (
			  `cat_id` bigint(16) DEFAULT NULL,
			  `parent_cat_id` bigint(11) DEFAULT NULL,
			  `level` int(11) DEFAULT NULL,
			  `leaf` tinyint(4) DEFAULT NULL,
			  `version` int(11) DEFAULT NULL,
			  `cat_name` varchar(255) DEFAULT NULL,
			  `wp_term_id` int(11) DEFAULT NULL,
			  KEY `cat_id` (`cat_id`),
			  KEY `parent_cat_id` (`parent_cat_id`)		
			);";
			$wpdb->query($sql);	echo $wpdb->last_error;
						
			// create table: ebay_store_categories
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_store_categories` (
			  `cat_id` bigint(20) DEFAULT NULL,
			  `parent_cat_id` bigint(20) DEFAULT NULL,
			  `level` int(11) DEFAULT NULL,
			  `leaf` tinyint(4) DEFAULT NULL,
			  `version` int(11) DEFAULT NULL,
			  `cat_name` varchar(255) DEFAULT NULL,
			  `order` int(11) DEFAULT NULL,
			  `wp_term_id` int(11) DEFAULT NULL,
			  KEY `cat_id` (`cat_id`),
			  KEY `parent_cat_id` (`parent_cat_id`)		
			);";
			$wpdb->query($sql);			
			
			// create table: ebay_payment
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_payment` (
			  `payment_name` varchar(255) DEFAULT NULL,
			  `payment_description` varchar(255) DEFAULT NULL,
			  `version` int(11) DEFAULT NULL	
			);";
			$wpdb->query($sql);	echo $wpdb->last_error;
						
			// create table: ebay_profiles
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_profiles` (
			  `profile_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `profile_name` varchar(255) DEFAULT NULL,
			  `profile_description` varchar(255) DEFAULT NULL,
			  `listing_duration` varchar(255) DEFAULT NULL,
			  `type` varchar(255) DEFAULT NULL,
			  `details` text,
			  `conditions` text,
			  PRIMARY KEY  (`profile_id`)	
			);";
			$wpdb->query($sql);	echo $wpdb->last_error;
						
			// create table: ebay_shipping
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_shipping` (
			  `service_id` int(11) DEFAULT NULL,
			  `service_name` varchar(255) DEFAULT NULL,
			  `service_description` varchar(255) DEFAULT NULL,
			  `carrier` varchar(255) DEFAULT NULL,
			  `international` tinyint(4) DEFAULT NULL,
			  `version` int(11) DEFAULT NULL	
			);";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			// create table: ebay_transactions
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_transactions` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `item_id` bigint(255) DEFAULT NULL,
			  `transaction_id` bigint(255) DEFAULT NULL,
			  `date_created` datetime DEFAULT NULL,
			  `item_title` varchar(255) DEFAULT NULL,
			  `price` float DEFAULT NULL,
			  `quantity` int(11) DEFAULT NULL,
			  `status` varchar(50) DEFAULT NULL,
			  `details` text,
			  `post_id` int(11) DEFAULT NULL,
			  `buyer_userid` varchar(255) DEFAULT NULL,
			  `buyer_name` varchar(255) DEFAULT NULL,
			  `buyer_email` varchar(255) DEFAULT NULL,
			  `eBayPaymentStatus` varchar(50) DEFAULT NULL,
			  `CheckoutStatus` varchar(50) DEFAULT NULL,
			  `ShippingService` varchar(50) DEFAULT NULL,
			  `PaymentMethod` varchar(50) DEFAULT NULL,
			  `ShippingAddress_City` varchar(50) DEFAULT NULL,
			  `CompleteStatus` varchar(50) DEFAULT NULL,
			  `LastTimeModified` datetime DEFAULT NULL,
			  PRIMARY KEY (`id`)
	  		);";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			// create table: ebay_log
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_log` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `timestamp` datetime DEFAULT NULL,
			  `request_url` text DEFAULT NULL,
			  `request` text DEFAULT NULL,
			  `response` text DEFAULT NULL,
			  `callname` varchar(64) DEFAULT NULL,
			  `success` varchar(16) DEFAULT NULL,
			  `ebay_id` bigint(255) DEFAULT NULL,
			  `user_id` int(11) DEFAULT NULL,	
			  PRIMARY KEY (`id`)	
			);";
			$wpdb->query($sql);	echo $wpdb->last_error;


			// $db_version = $new_db_version;
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';

		}
		
		/*
		// upgrade to version 2
		if ( 2 > $db_version ) {
			$new_db_version = 2;
		
			// create table: ebay_log
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_log` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `timestamp` datetime DEFAULT NULL,
			  `request_url` text DEFAULT NULL,
			  `request` text DEFAULT NULL,
			  `response` text DEFAULT NULL,
			  `callname` varchar(64) DEFAULT NULL,
			  `success` varchar(16) DEFAULT NULL,
			  `ebay_id` bigint(255) DEFAULT NULL,
			  `user_id` int(11) DEFAULT NULL,	
			  PRIMARY KEY (`id`)	
			);";
			$wpdb->query($sql);	echo $wpdb->last_error;

			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		
		// upgrade to version 3
		if ( 3 > $db_version ) {
			$new_db_version = 3;

			// rename column in table: ebay_categories
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_categories`
			        CHANGE wpsc_category_id wp_term_id INTEGER ";
			$wpdb->query($sql);	echo $wpdb->last_error;

			// rename column in table: ebay_store_categories
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_store_categories`
			        CHANGE wpsc_category_id wp_term_id INTEGER ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		
		// upgrade to version 4
		if ( 4 > $db_version ) {
			$new_db_version = 4;

			// set column type to bigint in table: ebay_store_categories
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_store_categories`
			        CHANGE cat_id cat_id BIGINT ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			// set column type to bigint in table: ebay_store_categories
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_store_categories`
			        CHANGE parent_cat_id parent_cat_id BIGINT ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		*/
	
		// TODO: include upgrade 5-9 in WPLister_Install class
		
		// upgrade to version 5
		if ( 5 > $db_version ) {
			$new_db_version = 5;
		
			// create table: ebay_log
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_jobs` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `job_key` varchar(64) DEFAULT NULL,
			  `job_name` varchar(64) DEFAULT NULL,
			  `tasklist` text DEFAULT NULL,
			  `results` text DEFAULT NULL,
			  `success` varchar(16) DEFAULT NULL,
			  `date_created` datetime DEFAULT NULL,
			  `date_finished` datetime DEFAULT NULL,
			  `user_id` int(11) DEFAULT NULL,	
			  PRIMARY KEY (`id`)	
			);";
			$wpdb->query($sql);	echo $wpdb->last_error;

			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		

		// upgrade to version 6
		if ( 6 > $db_version ) {
			$new_db_version = 6;

			// add columns to ebay_shipping table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_shipping`
			        ADD COLUMN `ShippingCategory` varchar(64) DEFAULT NULL AFTER `carrier`, 
			        ADD COLUMN `WeightRequired` int(10) UNSIGNED NOT NULL DEFAULT 0 AFTER `international`, 
			        ADD COLUMN `DimensionsRequired` int(10) UNSIGNED NOT NULL DEFAULT 0 AFTER `international`, 
			        ADD COLUMN `isCalculated` int(10) UNSIGNED NOT NULL DEFAULT 0 AFTER `international`, 
			        ADD COLUMN `isFlat` int(10) UNSIGNED NOT NULL DEFAULT 0 AFTER `international`;
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		

		// upgrade to version 7  (0.9.7.9)
		if ( 7 > $db_version ) {
			$new_db_version = 7;

			// set admin_email as default license_email
			update_option('wplister_license_email', get_bloginfo('admin_email') );

			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		

		// upgrade to version 8
		if ( 8 > $db_version ) {
			$new_db_version = 8;

			// add columns to ebay_shipping table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_profiles`
			        ADD COLUMN `category_specifics` text DEFAULT NULL;
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		
		// upgrade to version 9  (1.0)
		if ( 9 > $db_version ) {
			$new_db_version = 9;

			// add update channel option
			update_option('wplister_update_channel', 'stable');
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		
		// upgrade to version 10  (1.0.7)
		if ( 10 > $db_version ) {
			$new_db_version = 10;

			// add column to ebay_transactions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions`
			        ADD COLUMN `wp_order_id` int(10) UNSIGNED NOT NULL DEFAULT 0 AFTER `post_id`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 11  (1.0.8.8)
		if ( 11 > $db_version ) {
			$new_db_version = 11;

			// fetch available dispatch times
			if ( get_option('wplister_ebay_token') != '' ) {
				$this->initEC();
				$result = $this->EC->loadDispatchTimes();
				$this->EC->closeEbay();		
			}
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}
		

		// upgrade to version 12  (1.0.9.8)
		if ( 12 > $db_version ) {
			$new_db_version = 12;

			// fetch all transactions
			$sql = "SELECT id FROM `{$wpdb->prefix}ebay_transactions` ";
			$items = $wpdb->get_results($sql);	echo $wpdb->last_error;

			// find and assign orders
			$tm = new TransactionsModel();
			foreach ($items as $transaction) {

				// fetch item details
				$item = $tm->getItem( $transaction->id );
				$details = $item['details'];

				// build order title (WooCommerce only)
			    $post_title = 'Order &ndash; '.date('F j, Y @ h:i A', strtotime( $details->CreatedDate ) );

			    // find created order
				$sql = "
					SELECT ID FROM `{$wpdb->prefix}posts`
					WHERE post_title = '$post_title'
					  AND post_status = 'publish'
				";
				$post_id = $wpdb->get_var($sql);	echo $wpdb->last_error;
				
				// set order_id for transaction
				$tm->updateWpOrderID( $transaction->id, $post_id );							    

				// Update post data
				update_post_meta( $post_id, '_transaction_id', $transaction->id );
				update_post_meta( $post_id, '_ebay_item_id', $item['item_id'] );
				update_post_meta( $post_id, '_ebay_transaction_id', $item['transaction_id'] );

			}
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}


		// upgrade to version 13  (1.1.0.2)
		if ( 13 > $db_version ) {
			$new_db_version = 13;

			// add column to ebay_transactions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions`
			        ADD COLUMN `OrderLineItemID` varchar(64) DEFAULT NULL AFTER `transaction_id`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 14  (1.1.0.4)
		if ( 14 > $db_version ) {
			$new_db_version = 14;

			// remove invalid transactions - update on next cron schedule
			$sql = "DELETE FROM `{$wpdb->prefix}ebay_transactions`
			        WHERE transaction_id = 0
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 15  (1.1.5.4)
		if ( 15 > $db_version ) {
			$new_db_version = 15;

			// add column to ebay_categories table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_categories`
			        ADD COLUMN `site_id` int(10) UNSIGNED DEFAULT NULL AFTER `wp_term_id`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 16  (1.1.6.3)
		if ( 16 > $db_version ) {
			$new_db_version = 16;

			// add column to ebay_auctions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions`
			        ADD COLUMN `history` TEXT AFTER `fees`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 17  (1.2.0.12)
		if ( 17 > $db_version ) {
			$new_db_version = 17;

			// fetch available dispatch times
			if ( get_option('wplister_ebay_token') != '' ) {
				$this->initEC();
				$result = $this->EC->loadShippingPackages();
				$this->EC->closeEbay();		
			}
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 18 (1.2.0.18)
		if ( 18 > $db_version ) {
			$new_db_version = 18;

			// set column type to bigint in table: ebay_auctions
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions`
			        CHANGE post_id post_id BIGINT ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			// set column type to bigint in table: ebay_transactions
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions`
			        CHANGE post_id post_id BIGINT ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			// set column type to bigint in table: ebay_transactions
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions`
			        CHANGE wp_order_id wp_order_id BIGINT ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 19  (1.2.1.5)
		if ( 19 > $db_version ) {
			$new_db_version = 19;

			// add column to ebay_auctions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions`
			        ADD COLUMN `eps` TEXT AFTER `history`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 20  (1.2.2.16)
		if ( 20 > $db_version ) {
			$new_db_version = 20;

			// add column to ebay_transactions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions`
			        ADD COLUMN `history` TEXT AFTER `details`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 21  (1.2.2.16)
		if ( 21 > $db_version ) {
			$new_db_version = 21;

			// create table: ebay_orders
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_orders` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `order_id` varchar(128) DEFAULT NULL,
			  `date_created` datetime DEFAULT NULL,
			  `total` float DEFAULT NULL,
			  `status` varchar(50) DEFAULT NULL,
			  `post_id` int(11) DEFAULT NULL,
			  `items` text,
			  `details` text,
			  `history` text,
			  `buyer_userid` varchar(255) DEFAULT NULL,
			  `buyer_name` varchar(255) DEFAULT NULL,
			  `buyer_email` varchar(255) DEFAULT NULL,
			  `eBayPaymentStatus` varchar(50) DEFAULT NULL,
			  `CheckoutStatus` varchar(50) DEFAULT NULL,
			  `ShippingService` varchar(50) DEFAULT NULL,
			  `PaymentMethod` varchar(50) DEFAULT NULL,
			  `ShippingAddress_City` varchar(50) DEFAULT NULL,
			  `CompleteStatus` varchar(50) DEFAULT NULL,
			  `LastTimeModified` datetime DEFAULT NULL,
			  PRIMARY KEY (`id`)
	  		);";
			$wpdb->query($sql);	echo $wpdb->last_error;

			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 22  (1.2.4.7)
		if ( 22 > $db_version ) {
			$new_db_version = 22;

			// add column to ebay_profiles table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_profiles`
			        ADD COLUMN `sort_order` int(11) NOT NULL AFTER `type`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 23  (1.2.7.3)
		if ( 23 > $db_version ) {
			$new_db_version = 23;

			// fetch user defined shipping discount profiles
			if ( get_option('wplister_ebay_token') != '' ) {
				$this->initEC();
				$result = $this->EC->loadShippingDiscountProfiles();
				$this->EC->closeEbay();		
			}
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 24  (1.3.0.12)
		if ( 24 > $db_version ) {
			$new_db_version = 24;

			// add column to ebay_profiles table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions`
			        ADD COLUMN `locked` int(11) NOT NULL DEFAULT 0 AFTER `status`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 25  (1.3.0.12)
		if ( 25 > $db_version ) {
			$new_db_version = 25;
			$batch_size = 1000;

			// fetch all imported items
			$sql = "SELECT post_id FROM `{$wpdb->prefix}postmeta` WHERE meta_key = '_ebay_item_source' AND meta_value = 'imported' ";
			$imported_products = $wpdb->get_col($sql);	echo $wpdb->last_error;
			$total_number_of_products = sizeof( $imported_products );

			if ( $total_number_of_products > $batch_size ) {
				
				// get current offset
				$db_upgrade_offset = intval( self::getOption('db_upgrade_offset') );

				// extract current batch
				$imported_products = array_slice( $imported_products, $db_upgrade_offset, $batch_size );

				// lock all imported imported_products
				$where_sql = " 1 = 0 ";
				foreach ($imported_products as $post_id) {
					$where_sql .= " OR post_id = '$post_id' ";
				}
				$sql = "UPDATE `{$wpdb->prefix}ebay_auctions` SET locked = '1' WHERE ( $where_sql ) AND status = 'published' ";
				$wpdb->query( $sql );	echo $wpdb->last_error;

				// increase offset
				self::updateOption('db_upgrade_offset', $db_upgrade_offset + $batch_size );

				// check if more batches
				if ( $total_number_of_products > $db_upgrade_offset + $batch_size ) {

					$count_processed = min( $db_upgrade_offset + $batch_size, $total_number_of_products );
					$msg  = __('Database upgrade is in progress', 'wplister');
					$msg .= ' - ' . $count_processed . ' of ' . $total_number_of_products . ' items processed.';								
					self::showMessage($msg);
					return;

				} else {

					// last batch finished
					delete_option( 'wplister_db_upgrade_offset' );
					update_option('wplister_db_version', $new_db_version);
					$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';				

				}

			} else {
				// normal mode - lock all at once

				// lock all imported imported_products
				$where_sql = " 1 = 0 ";
				foreach ($imported_products as $post_id) {
					$where_sql .= " OR post_id = '$post_id' ";
				}
				$sql = "UPDATE `{$wpdb->prefix}ebay_auctions` SET locked = '1' WHERE ( $where_sql ) AND status = 'published' ";
				$wpdb->query( $sql );	echo $wpdb->last_error;

				update_option('wplister_db_version', $new_db_version);
				$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';				
			}

		}

		// upgrade to version 26 (1.3.0.12)
		if ( 26 > $db_version ) {
			$new_db_version = 26;

			// set column type to mediumtext in table: ebay_auctions
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions`
			        CHANGE history history MEDIUMTEXT ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			// set column type to mediumtext in table: ebay_orders
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_orders`
			        CHANGE history history MEDIUMTEXT ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			// set column type to mediumtext in table: ebay_transactions
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions`
			        CHANGE history history MEDIUMTEXT ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 27  (1.3.2.5)
		if ( 27 > $db_version ) {
			$new_db_version = 27;

			// add columns to ebay_categories table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_categories`
			        ADD COLUMN `specifics` text AFTER `cat_name`,
			        ADD COLUMN `conditions` text AFTER `cat_name`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			// add columns to ebay_auctions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions`
			        ADD COLUMN `parent_id` bigint(20) NOT NULL AFTER `post_id`,
			        ADD COLUMN `variations` text AFTER `details`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 28  (1.3.2.10)
		if ( 28 > $db_version ) {
			$new_db_version = 28;

			// create table: ebay_messages
			$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_messages` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `message_id` varchar(128) DEFAULT NULL,
			  `received_date` datetime DEFAULT NULL,
			  `subject` varchar(255) DEFAULT NULL,
			  `sender` varchar(255) DEFAULT NULL,
			  `flag_read` varchar(1) DEFAULT NULL,
			  `flag_replied` varchar(1) DEFAULT NULL,
			  `flag_flagged` varchar(1) DEFAULT NULL,
			  `item_title` varchar(255) DEFAULT NULL,
			  `item_id` bigint(255) DEFAULT NULL,
			  `folder_id` bigint(255) DEFAULT NULL,
			  `msg_text` text,
			  `msg_content` text,
			  `details` text,
			  `expiration_date` datetime DEFAULT NULL,
			  `response_url` varchar(255) DEFAULT NULL,
			  `status` varchar(50) DEFAULT NULL,
			  PRIMARY KEY (`id`)
	  		);";
			$wpdb->query($sql);	echo $wpdb->last_error;

			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 29  (1.3.2.12)
		if ( 29 > $db_version ) {
			$new_db_version = 29;

			// add columns to ebay_auctions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions`
			        ADD COLUMN `relist_date` datetime DEFAULT NULL AFTER `end_date`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 30  (1.3.4.5)
		if ( 30 > $db_version ) {

			// automatically switch old sites from transaction to order mode
			update_option('wplister_ebay_update_mode', 'order');
			update_option('wplister_db_version', 30);
		}


		// upgrade to version 31  (1.3.5.4)
		if ( 31 > $db_version ) {
			$new_db_version = 31;

			// add indices to ebay_log table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_log` ADD INDEX `timestamp` (`timestamp`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_log` ADD INDEX `callname` (`callname`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_log` ADD INDEX `success` (`success`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 32  (1.3.5.5)
		if ( 32 > $db_version ) {
			$new_db_version = 32;

			// add column to ebay_transactions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions`
			        ADD COLUMN `order_id` varchar(64) DEFAULT NULL AFTER `transaction_id`
			";
			$wpdb->query($sql);	echo $wpdb->last_error;

			// add indices to ebay_transactions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions` ADD INDEX `item_id` (`item_id`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions` ADD INDEX `transaction_id` (`transaction_id`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_transactions` ADD INDEX `order_id` (`order_id`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			// add index to ebay_orders table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_orders` ADD INDEX `order_id` (`order_id`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 33  (1.3.5.6)
		if ( 33 > $db_version ) {
			$new_db_version = 33;

			global $oWPL_WPLister;
			$more_orders_to_process = $oWPL_WPLister->pages['tools']->checkTransactions();

			// check if database upgrade is finished yet
			if ( $more_orders_to_process ) {
				$msg  = __('Database upgrade is in progress', 'wplister') .'...';
				if ( ($msg) && (!$hide_message) ) self::showMessage($msg);	
				return;
			} else {
				update_option('wplister_db_version', $new_db_version);
				$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
			}
		}

		// upgrade to version 34  (1.3.5.7)
		if ( 34 > $db_version ) {
			$new_db_version = 34;

			// fetch exclude shipping locations
			if ( get_option('wplister_ebay_token') != '' ) {
				$this->initEC();
	    	    $sm = new EbayShippingModel();
    	    	$result = $sm->downloadExcludeShippingLocations( $this->EC->session );      
				$this->EC->closeEbay();		
			}
			
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 35  (1.5.0)
		if ( 35 > $db_version ) {
			$new_db_version = 35;

			// change price column type to DECIMAL(13,2)
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions`
			        CHANGE price price DECIMAL(13,2) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
						
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_orders`
			        CHANGE total total DECIMAL(13,2) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
						
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}

		// upgrade to version 36  (1.5.0)
		if ( 36 > $db_version ) {
			$new_db_version = 36;

			// add indices to ebay_auctions table
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions` ADD INDEX `ebay_id` (`ebay_id`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions` ADD INDEX `status` (`status`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions` ADD INDEX `post_id` (`post_id`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions` ADD INDEX `profile_id` (`profile_id`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions` ADD INDEX `locked` (`locked`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
			$sql = "ALTER TABLE `{$wpdb->prefix}ebay_auctions` ADD INDEX `relist_date` (`relist_date`) ";
			$wpdb->query($sql);	echo $wpdb->last_error;
	
			update_option('wplister_db_version', $new_db_version);
			$msg  = $this->app_name .' '. __('database was upgraded to version', 'wplister') .' '. $new_db_version . '.';
		}


		// show update message
		if ( ($msg) && (!$hide_message) ) self::showMessage($msg,0,1);		

		#debug: update_option('wplister_db_version', 0);
		
	}


	// check if cURL is loaded
	public function isCurlLoaded() {

		if( ! extension_loaded('curl') ) {
			$this->showMessage("
				<b>Required PHP extension missing</b><br>
				<br>
				Your server doesn't seem to have the <a href='http://www.php.net/curl' target='_blank'>cURL</a> php extension installed.<br>
				cURL ist required by WP-Lister to be able to talk with eBay.<br>
				<br>
				On a recent debian based linux server running PHP 5 this should do the trick:<br>
				<br>
				<code>
					apt-get install php5-curl <br>
					/etc/init.d/apache2 restart
				</code>
				<br>
				<br>
				You'll require root access on your server to install additional php extensions!<br>
				If you are on a shared host, you need to ask your hoster to enable the cURL php extension for you.<br>
				<br>
				For more information on how to install the cURL php extension on other servers check <a href='http://stackoverflow.com/questions/1347146/how-to-enable-curl-in-php' target='_blank'>this page on stackoverflow</a>.
			",1,1);
			return false;
		}

		return true;
	}

	// check server is running windows
	public function isWindowsServer( $page ) {

		if ( $page != 'settings' ) return;

		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

			$this->showMessage("
				<b>Warning: Server requirements not met - this server runs on windows.</b><br>
				<br>
				WP-Lister currently only supports unixoid operating systems like Linux, FreeBSD and OS X.<br>
				Support for windows servers is still experimental and should not be used on production sites!
			",2,1);
			return true;
		}

		return false;
	}

	// check if PHP safe_mode is enabled
	public function isPhpSafeMode() {

        if ( ini_get('safe_mode') ) {

			$this->showMessage("
				<b>Warning: PHP safe mode is enabled.</b><br>
				<br>
				Your server seems to have PHP safe mode enabled, which can cause unexpected behaviour or prevent WP-Lister from working properly.<br>
				PHP safe mode has been deprecated for years and will be completely removed in the next PHP version - so it is highly recommended to disable it or ask your hoster to do it for you.
			",2,1);
			return true;
		}

		return false;
	}


	// checks for incompatible plugins
	public function checkPlugins() {

		// Plugin Name: iThemes Slideshow
		// Plugin URI: http://ithemes.com/purchase/displaybuddy/
		// Version: 2.0.23
		if ( class_exists('pluginbuddy_slideshow') ) {

			$this->showMessage("
				<b>Warning: An incompatible plugin was found.</b><br>
				<br>
				You seem to have the <i>iThemes Slideshow</i> plugin installed, which is known to cause issues with WP-Lister.<br>
				Version 2.0.23 of this plugin will slow down loading the listings page if you are using variations. This can render the entire listings page inaccessible, so please deactivate this plugin.
			",2,1);
			return false;

		}

	}

	// check if a recent version of WooCommerce is installed
	public function checkWooCommerce() {

		// check if WooCommerce is installed
		if ( ! defined('WOOCOMMERCE_VERSION') && ! defined('WC_VERSION') ){

			$this->showMessage("
				<b>WooCommerce is not installed.</b><br>
				<br>
				WP-Lister requires <a href='http://wordpress.org/plugins/woocommerce/' target='_blank'>WooCommerce</a> to be installed.<br>
			",1,1);
			return false;

		}

		// check if WooCommerce is up to date
		$required_version    = '2.0.0';
		$woocommerce_version = defined('WC_VERSION') ? WC_VERSION : WOOCOMMERCE_VERSION;
		if ( version_compare( $woocommerce_version, $required_version ) < 0 ) {

			$this->showMessage("
				<b>Warning: Your WooCommerce version is outdated.</b><br>
				<br>
				WP-Lister requires WooCommerce $required_version to be installed. You are using WooCommerce $woocommerce_version.<br>
				You should always keep your site and plugins updated.<br>
			",1,1);
			return false;

		}

	}


	// checks for multisite network
	public function checkMultisite() {

		if ( is_multisite() ) {

			// check for network activation
			if ( ! function_exists( 'is_plugin_active_for_network' ) )
				require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

			if ( function_exists('is_network_admin') && is_plugin_active_for_network( plugin_basename( WPLISTER_PATH.'/wp-lister.php' ) ) )
				$this->showMessage("network activated!",1);
			else
				$this->showMessage("not network activated!");


			// $this->showMessage("
			// 	<b>Multisite installation detected</b><br>
			// 	<br>
			// 	This is a site network...<br>
			// ");
			return true;
		}

		return false;
	}


	// check for updates
	public function checkForUpdates() {
	}


	// check if WP_Cron is working properly
	public function checkCron() {

		$cron_interval  = get_option( 'wplister_cron_auctions' );
		$next_scheduled = wp_next_scheduled( 'wplister_update_auctions' ) ;
		if ( ! $cron_interval ) return;
		if ( 'external' == $cron_interval ) return;

		// check if schedule is active
		if ( $cron_interval && ! $next_scheduled ) {

			$this->showMessage( 
				'<p>'
				. '<b>Warning: WordPress Cron Job has been disabled - scheduled WP-Lister tasks are not executed!</b>'
				. '<br><br>'
				. 'The task schedule has been reset just now in order to automatically fix this.'
				. '<br><br>'
				. 'If this message does not disappear, please visit the <a href="admin.php?page=wplister-settings">Settings</a> page and click <i>Save Settings</i> or contact support.'
				. '</p>'
			,2,1);

			// this should fix it:
			wp_schedule_event( time(), $cron_interval, 'wplister_update_auctions' );
			return;
		} 

		// check if schedule is delayed (by 1d)
		// $next_scheduled = $next_scheduled - 3600*48; // debug only
		if ( $next_scheduled < current_time('timestamp',1) - 3600*25 ) {

			$this->showMessage( 
				'<p>'
				. '<b>Attention: WordPress cron jobs seem to be broken on your site!</b>'
				. '<br><br>'
				. 'There are active background jobs which were scheduled to run '
				. human_time_diff( $next_scheduled, current_time('timestamp',1) ) . ' ago, '
				. 'but never have been executed.'
				. '<br><br>'
				. 'You should contact your hoster or site administrator to get this fixed as soon as possible. Until then, WP-Lister will not be able to sync the inventory correctly nor process new orders from eBay.'
				. '<br><br>'
				. 'The quickest way to make sure this will not happen again is using an external cron job to trigger the inventory sync every 5 minutes. To do so, change the "update interval" setting option to "use external cron job" and follow the instructions. This is strongly recommended if you are using WP-Lister for Amazon as well.'
				. '<br><br>'
				. 'Keep in mind that this issue is not related to WP-Lister but to WordPress itself. All plugins and features which rely on scheduled tasks are affected by this issue - which includes scheduled posts, internal cleanup routines in WooCommerce and more.'
				. '<br><br>'
				. 'To see all your scheduled tasks and when they were last executed, we recommend installing '
				. '<a href="https://wordpress.org/plugins/debug-bar/" target="_blank">Debug Bar</a> and the '
				. '<a href="https://wordpress.org/plugins/debug-bar-cron/" target="_blank">Debug Bar Cron</a> extension. '
				. 'A possible workaround for sites with broken WP-Cron is the '
				. '<a href="https://wordpress.org/plugins/wp-cron-control/" target="_blank">WP Cron Control</a> plugin, '
				. 'but we recommend to find out what is causing this and fixing it instead.'
				. '</p>'
			,1,1);

		}

	}


	// check if database has been corrupted during migration 
	public function checkDatabase() {
		global $wpdb;

		$rows_null_count = $wpdb->get_var("SELECT count(id) FROM ".$wpdb->prefix."ebay_auctions WHERE relist_date = '0000-00-00 00:00:00' OR date_finished = '0000-00-00 00:00:00'  ");
		if ( $rows_null_count ) {
			$wpdb->query("UPDATE ".$wpdb->prefix."ebay_auctions SET date_created   = NULL WHERE date_created   = '0000-00-00 00:00:00' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."ebay_auctions SET date_published = NULL WHERE date_published = '0000-00-00 00:00:00' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."ebay_auctions SET end_date       = NULL WHERE end_date       = '0000-00-00 00:00:00' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."ebay_auctions SET relist_date    = NULL WHERE relist_date    = '0000-00-00 00:00:00' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."ebay_auctions SET date_finished  = NULL WHERE date_finished  = '0000-00-00 00:00:00' ");
			$this->showMessage( 'Repaired DB rows: ' . $rows_null_count );
			echo $wpdb->last_error;
		}

	}


	// check token expiration date
	public function checkToken() {

		$expdate = get_option( 'wplister_ebay_token_expirationtime' );

		if ( ! $expdate ) return;
		if ( ! $exptime = strtotime($expdate) ) return;
		$two_weeks_from_now = time() + 3600 * 24 * 7 * 2;

		if ( $exptime < time() ) {

			$this->showMessage( 
				'<p>'
				. '<b>Warning: '. __('Your ebay token has expired on','wplister') . ' ' . $expdate
				. ' (' . human_time_diff( strtotime($expdate) ) . ' ago) '.'</b>'
				. '<br><br>'
				. 'You need to reconnect your eBay account. To do so, please click the "Change account" button on Settings page and follow the instructions.'
				. '</p>'
			,1,1);

		} elseif ( $exptime < $two_weeks_from_now ) {

			$this->showMessage( 
				'<p>'
				. '<b>Warning: '. __('Your eBay token will expire on','wplister') . ' ' . $expdate
				. ' (in ' . human_time_diff( strtotime($expdate) ) . ') '.'</b>'
				. '<br><br>'
				. 'You need to reconnect your eBay account. To do so, please click the "Change account" button on Settings page and follow the instructions.'
				. '</p>'
			,2,1);

		}

	} // checkToken()


	// check folders
	public function checkFolders() {
		// global $wpl_logger;
		// $wpl_logger->info('creating wp-content/uploads/wp-lister/templates');		

		// create wp-content/uploads/wp-lister/templates if not exists
		$uploads = wp_upload_dir();
		$uploaddir = $uploads['basedir'];

		$wpldir = $uploaddir . '/wp-lister';
		if ( !is_dir($wpldir) ) {

			$result  = @mkdir( $wpldir );
			if ($result===false) {
				$this->showMessage( "Could not create template folder: " . $wpldir, 1, 1 );	
				return false;
			}

		}

		$tpldir = $wpldir . '/templates';
		if ( !is_dir($tpldir) ) {

			$result  = @mkdir( $tpldir );
			if ($result===false) {
				$this->showMessage( "Could not create template folder: " . $tpldir, 1, 1 );	
				return false;
			}

		}

		// $wpl_logger->info('template folder: '.$tpldir);		
	
	}
	


}

