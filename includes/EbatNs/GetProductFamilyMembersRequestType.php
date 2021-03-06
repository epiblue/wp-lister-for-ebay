<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'ProductSearchType.php';
require_once 'AbstractRequestType.php';

/**
 * This type is deprecated as the call is no longer available. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetProductFamilyMembersRequestType.html
 *
 */
class GetProductFamilyMembersRequestType extends AbstractRequestType
{
	/**
	 * @var ProductSearchType
	 */
	protected $ProductSearch;

	/**
	 * @return ProductSearchType
	 * @param integer $index 
	 */
	function getProductSearch($index = null)
	{
		if ($index !== null) {
			return $this->ProductSearch[$index];
		} else {
			return $this->ProductSearch;
		}
	}
	/**
	 * @return void
	 * @param ProductSearchType $value 
	 * @param  $index 
	 */
	function setProductSearch($value, $index = null)
	{
		if ($index !== null) {
			$this->ProductSearch[$index] = $value;
		} else {
			$this->ProductSearch = $value;
		}
	}
	/**
	 * @return void
	 * @param ProductSearchType $value 
	 */
	function addProductSearch($value)
	{
		$this->ProductSearch[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetProductFamilyMembersRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ProductSearch' =>
					array(
						'required' => false,
						'type' => 'ProductSearchType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
