<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * This enumerated type defines the values that can be used when adding, modiying, 
 * or deleting a shipping discount profile (through the <b>ModifyActionCode</b> 
 * field in <b>SetShippingDiscountProfiles</b>), or when adding, modiying, or 
 * deleting a promotional sale (through the <b>Action</b> field in 
 * <b>SetPromotionalSale</b>), or when adding or removing one or morelistings from 
 * the promotional sale (through the <b>Action</b>field in 
 * <b>SetPromotionalSaleListings</b>). <br/><br/>For 
 * <b>SetPromotionalSaleListings</b>, the specified action ('Add' or 'Delete') will 
 * apply to all listings specified in the <b>PromotionalSaleItemIDArray</b> 
 * container. A promotional sale can also be applied to all listings of a specified 
 * category (using <b>CategoryID</b> in the <b>SetPromotionalSaleListings</b> 
 * request). However, an entire category of listings cannot be removed from a 
 * promotional sale. In other words, the <b>Action </b> field cannot be set to 
 * 'Delete' if a <b>CategoryID</b> is specified. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ModifyActionCodeType.html
 *
 * @property string Add
 * @property string Delete
 * @property string Update
 * @property string CustomCode
 */
class ModifyActionCodeType extends EbatNs_FacetType
{
	const CodeType_Add = 'Add';
	const CodeType_Delete = 'Delete';
	const CodeType_Update = 'Update';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ModifyActionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ModifyActionCodeType = new ModifyActionCodeType();

?>
