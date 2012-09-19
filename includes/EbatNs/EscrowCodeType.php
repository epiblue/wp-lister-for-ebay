<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * EscrowCodeType - Type declaration to be used by other schema. Indicates 
 * whetherescrow is used for a listing. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/EscrowCodeType.html
 *
 * @property string ByBuyer
 * @property string BySeller
 * @property string None
 * @property string CustomCode
 */
class EscrowCodeType extends EbatNs_FacetType
{
	const CodeType_ByBuyer = 'ByBuyer';
	const CodeType_BySeller = 'BySeller';
	const CodeType_None = 'None';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('EscrowCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_EscrowCodeType = new EscrowCodeType();

?>
