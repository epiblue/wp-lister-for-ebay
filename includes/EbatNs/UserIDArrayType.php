<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
//
require_once 'UserIDType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * Contains an array of eBay UserID entries. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/UserIDArrayType.html
 *
 */
class UserIDArrayType extends EbatNs_ComplexType
{
	/**
	 * @var UserIDType
	 */
	protected $UserID;

	/**
	 * @return UserIDType
	 * @param integer $index 
	 */
	function getUserID($index = null)
	{
		if ($index !== null) {
			return $this->UserID[$index];
		} else {
			return $this->UserID;
		}
	}
	/**
	 * @return void
	 * @param UserIDType $value 
	 * @param  $index 
	 */
	function setUserID($value, $index = null)
	{
		if ($index !== null) {
			$this->UserID[$index] = $value;
		} else {
			$this->UserID = $value;
		}
	}
	/**
	 * @return void
	 * @param UserIDType $value 
	 */
	function addUserID($value)
	{
		$this->UserID[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('UserIDArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'UserID' =>
					array(
						'required' => false,
						'type' => 'UserIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
