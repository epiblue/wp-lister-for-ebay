<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Defines the SellerContactDetailsEnabled feature. If this field is present, the 
 * category allows retrieval of seller-level contact information. The field is 
 * returned as an empty element (e.g., a boolean value is not returned).Added for 
 * EbayMotors Pro users. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/eBayMotorsProSellerContactDetailsEnabledDefinitionType.html
 *
 */
class eBayMotorsProSellerContactDetailsEnabledDefinitionType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('eBayMotorsProSellerContactDetailsEnabledDefinitionType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
