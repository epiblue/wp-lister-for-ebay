<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 *  
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SimpleItemSortCodeType.html
 *
 * @property string BestMatch
 * @property string CustomCode
 * @property string EndTime
 * @property string BidCount
 * @property string Country
 * @property string CurrentBid
 * @property string Distance
 * @property string StartDate
 * @property string BestMatchCategoryGroup
 * @property string PricePlusShipping
 */
class SimpleItemSortCodeType extends EbatNs_FacetType
{
	const CodeType_BestMatch = 'BestMatch';
	const CodeType_CustomCode = 'CustomCode';
	const CodeType_EndTime = 'EndTime';
	const CodeType_BidCount = 'BidCount';
	const CodeType_Country = 'Country';
	const CodeType_CurrentBid = 'CurrentBid';
	const CodeType_Distance = 'Distance';
	const CodeType_StartDate = 'StartDate';
	const CodeType_BestMatchCategoryGroup = 'BestMatchCategoryGroup';
	const CodeType_PricePlusShipping = 'PricePlusShipping';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SimpleItemSortCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SimpleItemSortCodeType = new SimpleItemSortCodeType();

?>
