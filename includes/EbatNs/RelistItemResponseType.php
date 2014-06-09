<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'FeesType.php';
require_once 'ProductSuggestionsType.php';
require_once 'DiscountReasonCodeType.php';
require_once 'ListingRecommendationsType.php';
require_once 'AbstractResponseType.php';
require_once 'ItemIDType.php';

/**
 * Returns the Item ID, SKU (if any), listing recommendations (if applicable), 
 * theestimated fees for the relisted item (except the Final Value Fee, which isn't 
 * calculateduntil the item has sold), the start and end times of the listing, and 
 * other details. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/RelistItemResponseType.html
 *
 */
class RelistItemResponseType extends AbstractResponseType
{
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var FeesType
	 */
	protected $Fees;
	/**
	 * @var dateTime
	 */
	protected $StartTime;
	/**
	 * @var dateTime
	 */
	protected $EndTime;
	/**
	 * @var string
	 */
	protected $CategoryID;
	/**
	 * @var string
	 */
	protected $Category2ID;
	/**
	 * @var DiscountReasonCodeType
	 */
	protected $DiscountReason;
	/**
	 * @var ProductSuggestionsType
	 */
	protected $ProductSuggestions;
	/**
	 * @var ListingRecommendationsType
	 */
	protected $ListingRecommendations;

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
	 * @return FeesType
	 */
	function getFees()
	{
		return $this->Fees;
	}
	/**
	 * @return void
	 * @param FeesType $value 
	 */
	function setFees($value)
	{
		$this->Fees = $value;
	}
	/**
	 * @return dateTime
	 */
	function getStartTime()
	{
		return $this->StartTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setStartTime($value)
	{
		$this->StartTime = $value;
	}
	/**
	 * @return dateTime
	 */
	function getEndTime()
	{
		return $this->EndTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setEndTime($value)
	{
		$this->EndTime = $value;
	}
	/**
	 * @return string
	 */
	function getCategoryID()
	{
		return $this->CategoryID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setCategoryID($value)
	{
		$this->CategoryID = $value;
	}
	/**
	 * @return string
	 */
	function getCategory2ID()
	{
		return $this->Category2ID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setCategory2ID($value)
	{
		$this->Category2ID = $value;
	}
	/**
	 * @return DiscountReasonCodeType
	 * @param integer $index 
	 */
	function getDiscountReason($index = null)
	{
		if ($index !== null) {
			return $this->DiscountReason[$index];
		} else {
			return $this->DiscountReason;
		}
	}
	/**
	 * @return void
	 * @param DiscountReasonCodeType $value 
	 * @param  $index 
	 */
	function setDiscountReason($value, $index = null)
	{
		if ($index !== null) {
			$this->DiscountReason[$index] = $value;
		} else {
			$this->DiscountReason = $value;
		}
	}
	/**
	 * @return void
	 * @param DiscountReasonCodeType $value 
	 */
	function addDiscountReason($value)
	{
		$this->DiscountReason[] = $value;
	}
	/**
	 * @return ProductSuggestionsType
	 */
	function getProductSuggestions()
	{
		return $this->ProductSuggestions;
	}
	/**
	 * @return void
	 * @param ProductSuggestionsType $value 
	 */
	function setProductSuggestions($value)
	{
		$this->ProductSuggestions = $value;
	}
	/**
	 * @return ListingRecommendationsType
	 */
	function getListingRecommendations()
	{
		return $this->ListingRecommendations;
	}
	/**
	 * @return void
	 * @param ListingRecommendationsType $value 
	 */
	function setListingRecommendations($value)
	{
		$this->ListingRecommendations = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('RelistItemResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ItemID' =>
					array(
						'required' => false,
						'type' => 'ItemIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Fees' =>
					array(
						'required' => false,
						'type' => 'FeesType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'StartTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EndTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CategoryID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Category2ID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DiscountReason' =>
					array(
						'required' => false,
						'type' => 'DiscountReasonCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					),
					'ProductSuggestions' =>
					array(
						'required' => false,
						'type' => 'ProductSuggestionsType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ListingRecommendations' =>
					array(
						'required' => false,
						'type' => 'ListingRecommendationsType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
