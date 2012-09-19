<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';
require_once 'PaginationResultType.php';
require_once 'SellingManagerProductType.php';

/**
 * Contains a list of the products created by the seller. The list of products is 
 * returned as a setof tags, in which are returned zero, one, or multiple 
 * SellingManagerProductType objects. EachSellingManagerProductType object contains 
 * the information about for one Selling Manager productand any Selling Manager 
 * templates the product contains. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetSellingManagerInventoryResponseType.html
 *
 */
class GetSellingManagerInventoryResponseType extends AbstractResponseType
{
	/**
	 * @var dateTime
	 */
	protected $InventoryCountLastCalculatedDate;
	/**
	 * @var SellingManagerProductType
	 */
	protected $SellingManagerProduct;
	/**
	 * @var PaginationResultType
	 */
	protected $PaginationResult;

	/**
	 * @return dateTime
	 */
	function getInventoryCountLastCalculatedDate()
	{
		return $this->InventoryCountLastCalculatedDate;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setInventoryCountLastCalculatedDate($value)
	{
		$this->InventoryCountLastCalculatedDate = $value;
	}
	/**
	 * @return SellingManagerProductType
	 * @param integer $index 
	 */
	function getSellingManagerProduct($index = null)
	{
		if ($index !== null) {
			return $this->SellingManagerProduct[$index];
		} else {
			return $this->SellingManagerProduct;
		}
	}
	/**
	 * @return void
	 * @param SellingManagerProductType $value 
	 * @param  $index 
	 */
	function setSellingManagerProduct($value, $index = null)
	{
		if ($index !== null) {
			$this->SellingManagerProduct[$index] = $value;
		} else {
			$this->SellingManagerProduct = $value;
		}
	}
	/**
	 * @return void
	 * @param SellingManagerProductType $value 
	 */
	function addSellingManagerProduct($value)
	{
		$this->SellingManagerProduct[] = $value;
	}
	/**
	 * @return PaginationResultType
	 */
	function getPaginationResult()
	{
		return $this->PaginationResult;
	}
	/**
	 * @return void
	 * @param PaginationResultType $value 
	 */
	function setPaginationResult($value)
	{
		$this->PaginationResult = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetSellingManagerInventoryResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'InventoryCountLastCalculatedDate' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SellingManagerProduct' =>
					array(
						'required' => false,
						'type' => 'SellingManagerProductType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					),
					'PaginationResult' =>
					array(
						'required' => false,
						'type' => 'PaginationResultType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
