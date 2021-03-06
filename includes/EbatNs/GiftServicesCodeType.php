<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Each code identifies an optional service that the seller is offering if the 
 * buyerchooses to purchase the item as a gift. Not applicable for eBay Store 
 * Inventorylistings. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GiftServicesCodeType.html
 *
 * @property string GiftExpressShipping
 * @property string GiftShipToRecipient
 * @property string GiftWrap
 * @property string CustomCode
 */
class GiftServicesCodeType extends EbatNs_FacetType
{
	const CodeType_GiftExpressShipping = 'GiftExpressShipping';
	const CodeType_GiftShipToRecipient = 'GiftShipToRecipient';
	const CodeType_GiftWrap = 'GiftWrap';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GiftServicesCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_GiftServicesCodeType = new GiftServicesCodeType();

?>
