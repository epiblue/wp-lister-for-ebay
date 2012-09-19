<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Container for other alerts for Selling Manager. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellingManagerGeneralPropertyTypeCodeType.html
 *
 * @property string NegativeFeedbackReceived
 * @property string UnpaidItemDispute
 * @property string BadEmailTemplate
 * @property string CustomCode
 */
class SellingManagerGeneralPropertyTypeCodeType extends EbatNs_FacetType
{
	const CodeType_NegativeFeedbackReceived = 'NegativeFeedbackReceived';
	const CodeType_UnpaidItemDispute = 'UnpaidItemDispute';
	const CodeType_BadEmailTemplate = 'BadEmailTemplate';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellingManagerGeneralPropertyTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SellingManagerGeneralPropertyTypeCodeType = new SellingManagerGeneralPropertyTypeCodeType();

?>
