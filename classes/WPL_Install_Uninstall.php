<?php

class WPLister_Install {
	
	public function __construct( $file ) {
		register_activation_hook( $file, array( &$this, 'onWpActivatePlugin' ) );
	}
	
	public function onWpActivatePlugin() {
		global $wpdb;
        #global $wpl_logger;
        $wpl_logger = new WPL_Logger();

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		// rename plugin options - new prefix 'wplister_'
		// $wpl_logger->info('renaming plugin options');		
		// $query = "SELECT * FROM `{$wpdb->prefix}options` WHERE option_name LIKE 'LWS_e2e_%' ";
		// $options = $wpdb->get_results($query);
		// if ($options)
		// foreach ($options as $opt) {
		// 	$new_name = str_replace('LWS_e2e_', 'wplister_', $opt->option_name);
		// 	$wpdb->update( $wpdb->prefix.'options', array('option_name' => $new_name), array('option_id' => $opt->option_id) ); 
		// 	echo mysql_error();
		// 	echo ".\n";
		// 	$wpl_logger->info("updated option $new_name ");		
		// }


		WPL_WPLister::addOption( 'ebay_token',			'' );
		WPL_WPLister::addOption( 'ebay_site_id',		'0' );
		WPL_WPLister::addOption( 'sandbox_enabled',		'0' );
		
		WPL_WPLister::addOption( 'paypal_email',		'' );
		WPL_WPLister::addOption( 'cron_auctions',		'Y' );
		WPL_WPLister::addOption( 'cron_transactions',	'Y' );
		WPL_WPLister::addOption( 'log_level',			'' );
		WPL_WPLister::addOption( 'log_to_db',			'0' );
		WPL_WPLister::addOption( 'uninstall',			'0' );
		WPL_WPLister::addOption( 'db_version',			'4' );

		WPL_WPLister::addOption( 'setup_next_step',		'1' );


		// make subdirectories in wp-content/uploads
		$wpl_logger->info('creating wp-content/uploads/wp-lister/templates etc.');		
		$uploads = wp_upload_dir();
		$uploaddir = $uploads['basedir'];
		$wpldir = $uploaddir . '/wp-lister';
		if ( !is_dir($wpldir) ) mkdir($wpldir);
		$tpldir = $wpldir . '/templates';
		if ( !is_dir($tpldir) ) mkdir($tpldir);
		

		$wpl_logger->info("creating table {$wpdb->prefix}ebay_auctions");		

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
		$result = $wpdb->query($sql);

		$wpl_logger->info($sql);		
		$wpl_logger->info(mysql_error());		
		
		
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
		$wpdb->query($sql);
		
		
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
		$wpdb->query($sql);
		
		
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
		$wpdb->query($sql);
		
		
		
		// create table: ebay_shipping
		$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ebay_shipping` (
		  `service_id` int(11) DEFAULT NULL,
		  `service_name` varchar(255) DEFAULT NULL,
		  `service_description` varchar(255) DEFAULT NULL,
		  `carrier` varchar(255) DEFAULT NULL,
		  `international` tinyint(4) DEFAULT NULL,
		  `version` int(11) DEFAULT NULL	
		);";
		$wpdb->query($sql);
		
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
		$wpdb->query($sql);
		
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
		$wpdb->query($sql);

		// mysql updates - insert new columns
		$this->add_column_if_not_exist( $wpdb->prefix.'ebay_profiles', 'conditions', 'TEXT' );


	}

	// mysql update helper method
	// from http://www.edmondscommerce.co.uk/mysql/mysql-add-column-if-not-exists-php-function/
	function add_column_if_not_exist( $table, $column, $column_attr = "VARCHAR( 255 ) NULL" ){
	    $exists = false;
	    $columns = mysql_query("show columns from $table");
	    while($col = mysql_fetch_assoc($columns)){
	        if($col['Field'] == $column){
	            $exists = true;
	            break;
	        }
	    }      
	    if(!$exists){
	        mysql_query("ALTER TABLE `$table` ADD `$column` $column_attr ");
	    }
	}

}

class WPLister_Uninstall {
	
	// TODO: when uninstalling, maybe have a WPversion save settings offsite-like setting
	
	public function __construct( $file ) {
		register_deactivation_hook( $file, array( &$this, 'onWpDeactivatePlugin' ) );
	}
	
	public function onWpDeactivatePlugin() {
		global $wpdb;

		if ( WPL_WPLister::getOption('uninstall') == 1 ) {

			// remove tables
			$wpdb->query( 'DROP TABLE '.$wpdb->prefix.'ebay_auctions' );
			$wpdb->query( 'DROP TABLE '.$wpdb->prefix.'ebay_categories' );
			$wpdb->query( 'DROP TABLE '.$wpdb->prefix.'ebay_store_categories' );
			$wpdb->query( 'DROP TABLE '.$wpdb->prefix.'ebay_payment' );
			$wpdb->query( 'DROP TABLE '.$wpdb->prefix.'ebay_profiles' );
			$wpdb->query( 'DROP TABLE '.$wpdb->prefix.'ebay_shipping' );
			$wpdb->query( 'DROP TABLE '.$wpdb->prefix.'ebay_transactions' );
			$wpdb->query( 'DROP TABLE '.$wpdb->prefix.'ebay_log' );			

			// remove options
			// WPL_WPLister::deleteOption( 'ebay_token' );
			// WPL_WPLister::deleteOption( 'ebay_site_id' );
			// WPL_WPLister::deleteOption( 'sandbox_enabled' );
			// WPL_WPLister::deleteOption( 'paypal_email'  );
			// WPL_WPLister::deleteOption( 'cron_auctions'  );
			// WPL_WPLister::deleteOption( 'cron_transactions'  );
			// WPL_WPLister::deleteOption( 'log_level' );
			// WPL_WPLister::deleteOption( 'log_to_db' );
			// WPL_WPLister::deleteOption( 'uninstall' );
			// WPL_WPLister::deleteOption( 'setup_next_step' );
			$wpdb->query( 'DELETE FROM '.$wpdb->prefix."options WHERE option_name LIKE 'wplister_%' " );

		}

	}
}
