<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Used to indicate the listing options. Each of the subscriptions willhave 
 * following options, which will define "National" vs "Local" ad formatlisting. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GeographicExposureCodeType.html
 *
 * @property string National
 * @property string LocalOnly
 * @property string LocalOptional
 * @property string CustomCode
 */
class GeographicExposureCodeType extends EbatNs_FacetType
{
	const CodeType_National = 'National';
	const CodeType_LocalOnly = 'LocalOnly';
	const CodeType_LocalOptional = 'LocalOptional';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GeographicExposureCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_GeographicExposureCodeType = new GeographicExposureCodeType();

?>
