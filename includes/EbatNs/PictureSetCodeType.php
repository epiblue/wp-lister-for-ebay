<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * The size of images generated. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PictureSetCodeType.html
 *
 * @property string Standard
 * @property string Supersize
 * @property string Large
 * @property string CustomCode
 */
class PictureSetCodeType extends EbatNs_FacetType
{
	const CodeType_Standard = 'Standard';
	const CodeType_Supersize = 'Supersize';
	const CodeType_Large = 'Large';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PictureSetCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_PictureSetCodeType = new PictureSetCodeType();

?>
