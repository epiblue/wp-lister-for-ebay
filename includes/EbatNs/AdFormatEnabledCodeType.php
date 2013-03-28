<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Used to indicate whether the Ad Format feature is enabled for a category. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/AdFormatEnabledCodeType.html
 *
 * @property string Disabled
 * @property string Enabled
 * @property string Only
 * @property string ClassifiedAdEnabled
 * @property string ClassifiedAdOnly
 * @property string LocalMarketBestOfferOnly
 * @property string CustomCode
 */
class AdFormatEnabledCodeType extends EbatNs_FacetType
{
	const CodeType_Disabled = 'Disabled';
	const CodeType_Enabled = 'Enabled';
	const CodeType_Only = 'Only';
	const CodeType_ClassifiedAdEnabled = 'ClassifiedAdEnabled';
	const CodeType_ClassifiedAdOnly = 'ClassifiedAdOnly';
	const CodeType_LocalMarketBestOfferOnly = 'LocalMarketBestOfferOnly';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('AdFormatEnabledCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_AdFormatEnabledCodeType = new AdFormatEnabledCodeType();

?>
