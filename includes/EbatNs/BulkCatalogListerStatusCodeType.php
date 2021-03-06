<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * This type is deprecated because this type is not used by any call. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BulkCatalogListerStatusCodeType.html
 *
 * @property string Preapproved
 * @property string Active
 * @property string OnWatch
 * @property string OnHold
 * @property string Suspended
 * @property string WatchWarn
 * @property string CustomCode
 */
class BulkCatalogListerStatusCodeType extends EbatNs_FacetType
{
	const CodeType_Preapproved = 'Preapproved';
	const CodeType_Active = 'Active';
	const CodeType_OnWatch = 'OnWatch';
	const CodeType_OnHold = 'OnHold';
	const CodeType_Suspended = 'Suspended';
	const CodeType_WatchWarn = 'WatchWarn';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('BulkCatalogListerStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_BulkCatalogListerStatusCodeType = new BulkCatalogListerStatusCodeType();

?>
