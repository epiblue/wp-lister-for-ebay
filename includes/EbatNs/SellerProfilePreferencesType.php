<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'SupportedSellerProfilesType.php';

/**
 * Type defining the <b>SellerProfilePreferences</b> container. This 
 * containerconsists of a flag that indicates whether or not the seller has opted 
 * into BusinessPolicies, as well as a list of Business Policies profiles that have 
 * been set up for the seller's account.<br><br><span 
 * class="tablenote"><strong>Note:</strong>Business Policies are not yet available 
 * for use on the eBay platform. </span> 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellerProfilePreferencesType.html
 *
 */
class SellerProfilePreferencesType extends EbatNs_ComplexType
{
	/**
	 * @var boolean
	 */
	protected $SellerProfileOptedIn;
	/**
	 * @var SupportedSellerProfilesType
	 */
	protected $SupportedSellerProfiles;

	/**
	 * @return boolean
	 */
	function getSellerProfileOptedIn()
	{
		return $this->SellerProfileOptedIn;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setSellerProfileOptedIn($value)
	{
		$this->SellerProfileOptedIn = $value;
	}
	/**
	 * @return SupportedSellerProfilesType
	 */
	function getSupportedSellerProfiles()
	{
		return $this->SupportedSellerProfiles;
	}
	/**
	 * @return void
	 * @param SupportedSellerProfilesType $value 
	 */
	function setSupportedSellerProfiles($value)
	{
		$this->SupportedSellerProfiles = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellerProfilePreferencesType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SellerProfileOptedIn' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SupportedSellerProfiles' =>
					array(
						'required' => false,
						'type' => 'SupportedSellerProfilesType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
