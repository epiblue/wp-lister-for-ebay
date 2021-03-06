<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Type defining the <b>VariationDetails</b> container that is returned in 
 * <b>GeteBayDetails</b> if <b>VariationDetails</b> is included in the request as a 
 * <b>DetailName</b> filter, or if <b>GeteBayDetails</b> is called with no 
 * <b>DetailName</b> filters. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/VariationDetailsType.html
 *
 */
class VariationDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $MaxVariationsPerItem;
	/**
	 * @var int
	 */
	protected $MaxNamesPerVariationSpecificsSet;
	/**
	 * @var int
	 */
	protected $MaxValuesPerVariationSpecificsSetName;
	/**
	 * @var string
	 */
	protected $DetailVersion;
	/**
	 * @var dateTime
	 */
	protected $UpdateTime;

	/**
	 * @return int
	 */
	function getMaxVariationsPerItem()
	{
		return $this->MaxVariationsPerItem;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setMaxVariationsPerItem($value)
	{
		$this->MaxVariationsPerItem = $value;
	}
	/**
	 * @return int
	 */
	function getMaxNamesPerVariationSpecificsSet()
	{
		return $this->MaxNamesPerVariationSpecificsSet;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setMaxNamesPerVariationSpecificsSet($value)
	{
		$this->MaxNamesPerVariationSpecificsSet = $value;
	}
	/**
	 * @return int
	 */
	function getMaxValuesPerVariationSpecificsSetName()
	{
		return $this->MaxValuesPerVariationSpecificsSetName;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setMaxValuesPerVariationSpecificsSetName($value)
	{
		$this->MaxValuesPerVariationSpecificsSetName = $value;
	}
	/**
	 * @return string
	 */
	function getDetailVersion()
	{
		return $this->DetailVersion;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDetailVersion($value)
	{
		$this->DetailVersion = $value;
	}
	/**
	 * @return dateTime
	 */
	function getUpdateTime()
	{
		return $this->UpdateTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setUpdateTime($value)
	{
		$this->UpdateTime = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('VariationDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'MaxVariationsPerItem' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MaxNamesPerVariationSpecificsSet' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MaxValuesPerVariationSpecificsSetName' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DetailVersion' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'UpdateTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
