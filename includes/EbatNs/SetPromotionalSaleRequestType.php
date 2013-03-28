<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'PromotionalSaleType.php';
require_once 'ModifyActionCodeType.php';
require_once 'AbstractRequestType.php';

/**
 * Creates or modifies a promotional sale. Promotional sales enable sellersto apply 
 * discounts and/or free shipping across many listings. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SetPromotionalSaleRequestType.html
 *
 */
class SetPromotionalSaleRequestType extends AbstractRequestType
{
	/**
	 * @var ModifyActionCodeType
	 */
	protected $Action;
	/**
	 * @var PromotionalSaleType
	 */
	protected $PromotionalSaleDetails;

	/**
	 * @return ModifyActionCodeType
	 */
	function getAction()
	{
		return $this->Action;
	}
	/**
	 * @return void
	 * @param ModifyActionCodeType $value 
	 */
	function setAction($value)
	{
		$this->Action = $value;
	}
	/**
	 * @return PromotionalSaleType
	 */
	function getPromotionalSaleDetails()
	{
		return $this->PromotionalSaleDetails;
	}
	/**
	 * @return void
	 * @param PromotionalSaleType $value 
	 */
	function setPromotionalSaleDetails($value)
	{
		$this->PromotionalSaleDetails = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SetPromotionalSaleRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Action' =>
					array(
						'required' => false,
						'type' => 'ModifyActionCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PromotionalSaleDetails' =>
					array(
						'required' => false,
						'type' => 'PromotionalSaleType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
