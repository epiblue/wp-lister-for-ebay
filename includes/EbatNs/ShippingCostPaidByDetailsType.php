<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 *  
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ShippingCostPaidByDetailsType.html
 *
 */
class ShippingCostPaidByDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var token
	 */
	protected $ShippingCostPaidByOption;
	/**
	 * @var string
	 */
	protected $Description;

	/**
	 * @return token
	 */
	function getShippingCostPaidByOption()
	{
		return $this->ShippingCostPaidByOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setShippingCostPaidByOption($value)
	{
		$this->ShippingCostPaidByOption = $value;
	}
	/**
	 * @return string
	 */
	function getDescription()
	{
		return $this->Description;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDescription($value)
	{
		$this->Description = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ShippingCostPaidByDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ShippingCostPaidByOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Description' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
