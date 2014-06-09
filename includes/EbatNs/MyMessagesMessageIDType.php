<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
require_once 'EbatNs_SimpleType.php';

/**
 * Type defining the <b>MessageID</b> field used in <b>GetMyMessages</b>, 
 * <b>ReviseMyMessages</b>, and <b>DeleteMyMessages</b> to identify a specific eBay 
 * message to retrieve,revise, or delete, respectively. Up to 10 <b>MessageID</b> 
 * values can be specified in one API call. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MyMessagesMessageIDType.html
 *
 */
class MyMessagesMessageIDType extends EbatNs_SimpleType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MyMessagesMessageIDType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_MyMessagesMessageIDType = new MyMessagesMessageIDType();

?>
