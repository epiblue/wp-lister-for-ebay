<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'SKUType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'AmountType.php';
require_once 'ItemIDType.php';

/**
 * Lightweight type for updating basic inventory status details. Primarily intended 
 * for bulk use cases. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/InventoryStatusType.html
 *
 */
class InventoryStatusType extends EbatNs_ComplexType
{
	/**
	 * @var SKUType
	 */
	protected $SKU;
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var AmountType
	 */
	protected $StartPrice;
	/**
	 * @var int
	 */
	protected $Quantity;

	/**
	 * @return SKUType
	 */
	function getSKU()
	{
		return $this->SKU;
	}
	/**
	 * @return void
	 * @param SKUType $value 
	 */
	function setSKU($value)
	{
		$this->SKU = $value;
	}
	/**
	 * @return ItemIDType
	 */
	function getItemID()
	{
		return $this->ItemID;
	}
	/**
	 * @return void
	 * @param ItemIDType $value 
	 */
	function setItemID($value)
	{
		$this->ItemID = $value;
	}
	/**
	 * @return AmountType
	 */
	function getStartPrice()
	{
		return $this->StartPrice;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setStartPrice($value)
	{
		$this->StartPrice = $value;
	}
	/**
	 * @return int
	 */
	function getQuantity()
	{
		return $this->Quantity;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setQuantity($value)
	{
		$this->Quantity = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('InventoryStatusType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SKU' =>
					array(
						'required' => false,
						'type' => 'SKUType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ItemID' =>
					array(
						'required' => false,
						'type' => 'ItemIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'StartPrice' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Quantity' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
