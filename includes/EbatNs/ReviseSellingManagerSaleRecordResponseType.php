<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';

/**
 * Response to a ReviseSellingManagerSaleRecord call. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ReviseSellingManagerSaleRecordResponseType.html
 *
 */
class ReviseSellingManagerSaleRecordResponseType extends AbstractResponseType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ReviseSellingManagerSaleRecordResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
