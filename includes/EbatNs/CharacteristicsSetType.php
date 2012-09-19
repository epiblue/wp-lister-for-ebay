<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
//
require_once 'CharacteristicType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * A level in the eBay category hierarchy at which a particular group ofitems can 
 * share a common set of attributes. A set of characteristicsthat can be used to 
 * describe similar kinds of items in a standardized way. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CharacteristicsSetType.html
 *
 */
class CharacteristicsSetType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $Name;
	/**
	 * @var int
	 */
	protected $AttributeSetID;
	/**
	 * @var string
	 */
	protected $AttributeSetVersion;
	/**
	 * @var CharacteristicType
	 */
	protected $Characteristics;

	/**
	 * @return string
	 */
	function getName()
	{
		return $this->Name;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setName($value)
	{
		$this->Name = $value;
	}
	/**
	 * @return int
	 */
	function getAttributeSetID()
	{
		return $this->AttributeSetID;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setAttributeSetID($value)
	{
		$this->AttributeSetID = $value;
	}
	/**
	 * @return string
	 */
	function getAttributeSetVersion()
	{
		return $this->AttributeSetVersion;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setAttributeSetVersion($value)
	{
		$this->AttributeSetVersion = $value;
	}
	/**
	 * @return CharacteristicType
	 * @param integer $index 
	 */
	function getCharacteristics($index = null)
	{
		if ($index !== null) {
			return $this->Characteristics[$index];
		} else {
			return $this->Characteristics;
		}
	}
	/**
	 * @return void
	 * @param CharacteristicType $value 
	 * @param  $index 
	 */
	function setCharacteristics($value, $index = null)
	{
		if ($index !== null) {
			$this->Characteristics[$index] = $value;
		} else {
			$this->Characteristics = $value;
		}
	}
	/**
	 * @return void
	 * @param CharacteristicType $value 
	 */
	function addCharacteristics($value)
	{
		$this->Characteristics[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('CharacteristicsSetType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Name' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AttributeSetID' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AttributeSetVersion' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Characteristics' =>
					array(
						'required' => false,
						'type' => 'CharacteristicType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
