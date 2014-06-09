<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'InventoryFeesType.php';
require_once 'InventoryStatusType.php';
require_once 'AbstractResponseType.php';

/**
 * Returns the Item ID or SKU with changed Price and Quantity for the revised 
 * listing. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ReviseInventoryStatusResponseType.html
 *
 */
class ReviseInventoryStatusResponseType extends AbstractResponseType
{
	/**
	 * @var InventoryStatusType
	 */
	protected $InventoryStatus;
	/**
	 * @var InventoryFeesType
	 */
	protected $Fees;

	/**
	 * @return InventoryStatusType
	 * @param integer $index 
	 */
	function getInventoryStatus($index = null)
	{
		if ($index !== null) {
			return $this->InventoryStatus[$index];
		} else {
			return $this->InventoryStatus;
		}
	}
	/**
	 * @return void
	 * @param InventoryStatusType $value 
	 * @param  $index 
	 */
	function setInventoryStatus($value, $index = null)
	{
		if ($index !== null) {
			$this->InventoryStatus[$index] = $value;
		} else {
			$this->InventoryStatus = $value;
		}
	}
	/**
	 * @return void
	 * @param InventoryStatusType $value 
	 */
	function addInventoryStatus($value)
	{
		$this->InventoryStatus[] = $value;
	}
	/**
	 * @return InventoryFeesType
	 * @param integer $index 
	 */
	function getFees($index = null)
	{
		if ($index !== null) {
			return $this->Fees[$index];
		} else {
			return $this->Fees;
		}
	}
	/**
	 * @return void
	 * @param InventoryFeesType $value 
	 * @param  $index 
	 */
	function setFees($value, $index = null)
	{
		if ($index !== null) {
			$this->Fees[$index] = $value;
		} else {
			$this->Fees = $value;
		}
	}
	/**
	 * @return void
	 * @param InventoryFeesType $value 
	 */
	function addFees($value)
	{
		$this->Fees[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ReviseInventoryStatusResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'InventoryStatus' =>
					array(
						'required' => false,
						'type' => 'InventoryStatusType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					),
					'Fees' =>
					array(
						'required' => false,
						'type' => 'InventoryFeesType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
