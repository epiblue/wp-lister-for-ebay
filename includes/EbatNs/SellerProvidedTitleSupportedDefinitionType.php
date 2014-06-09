<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * If present, the site defines category settings for whether the seller can 
 * provide their own title for a US or CA eBay Motors listing. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellerProvidedTitleSupportedDefinitionType.html
 *
 */
class SellerProvidedTitleSupportedDefinitionType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellerProvidedTitleSupportedDefinitionType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
