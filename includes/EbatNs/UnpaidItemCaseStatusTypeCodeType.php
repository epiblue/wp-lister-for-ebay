<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Indicates the current status for an unpiad item. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/UnpaidItemCaseStatusTypeCodeType.html
 *
 * @property string Open
 * @property string ClosedWithPayment
 * @property string ClosedWithoutPayment
 * @property string CustomCode
 */
class UnpaidItemCaseStatusTypeCodeType extends EbatNs_FacetType
{
	const CodeType_Open = 'Open';
	const CodeType_ClosedWithPayment = 'ClosedWithPayment';
	const CodeType_ClosedWithoutPayment = 'ClosedWithoutPayment';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('UnpaidItemCaseStatusTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_UnpaidItemCaseStatusTypeCodeType = new UnpaidItemCaseStatusTypeCodeType();

?>
