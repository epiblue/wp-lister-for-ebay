<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'AbstractRequestType.php';

/**
 * This type is deprecated as the call is no longer available. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetProductFinderRequestType.html
 *
 */
class GetProductFinderRequestType extends AbstractRequestType
{
	/**
	 * @var string
	 */
	protected $AttributeSystemVersion;
	/**
	 * @var int
	 */
	protected $ProductFinderID;

	/**
	 * @return string
	 */
	function getAttributeSystemVersion()
	{
		return $this->AttributeSystemVersion;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setAttributeSystemVersion($value)
	{
		$this->AttributeSystemVersion = $value;
	}
	/**
	 * @return int
	 * @param integer $index 
	 */
	function getProductFinderID($index = null)
	{
		if ($index !== null) {
			return $this->ProductFinderID[$index];
		} else {
			return $this->ProductFinderID;
		}
	}
	/**
	 * @return void
	 * @param int $value 
	 * @param  $index 
	 */
	function setProductFinderID($value, $index = null)
	{
		if ($index !== null) {
			$this->ProductFinderID[$index] = $value;
		} else {
			$this->ProductFinderID = $value;
		}
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function addProductFinderID($value)
	{
		$this->ProductFinderID[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetProductFinderRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'AttributeSystemVersion' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ProductFinderID' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
