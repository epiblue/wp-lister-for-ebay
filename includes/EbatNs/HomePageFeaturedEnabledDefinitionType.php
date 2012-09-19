<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Defines whether Home Page Featured is available on the site. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/HomePageFeaturedEnabledDefinitionType.html
 *
 */
class HomePageFeaturedEnabledDefinitionType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('HomePageFeaturedEnabledDefinitionType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
