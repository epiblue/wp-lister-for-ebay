<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'UserAgreementInfoType.php';
require_once 'PayoutMethodType.php';

/**
 * Type defining the <b>SellereBayPaymentProcessConsent</b> container, which is 
 * returned to all DE andAT sellers, and consists of details of the seller's 
 * account status regarding the new eBay payment process. <br><br> Currently, this 
 * type is not applicable since the introduction of the new eBay paymentprocess for 
 * the Germany and Austria eBay sites has been delayed until further notice. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellereBayPaymentProcessConsentCodeType.html
 *
 */
class SellereBayPaymentProcessConsentCodeType extends EbatNs_ComplexType
{
	/**
	 * @var boolean
	 */
	protected $PayoutMethodSet;
	/**
	 * @var PayoutMethodType
	 */
	protected $PayoutMethod;
	/**
	 * @var UserAgreementInfoType
	 */
	protected $UserAgreementInfo;

	/**
	 * @return boolean
	 */
	function getPayoutMethodSet()
	{
		return $this->PayoutMethodSet;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setPayoutMethodSet($value)
	{
		$this->PayoutMethodSet = $value;
	}
	/**
	 * @return PayoutMethodType
	 */
	function getPayoutMethod()
	{
		return $this->PayoutMethod;
	}
	/**
	 * @return void
	 * @param PayoutMethodType $value 
	 */
	function setPayoutMethod($value)
	{
		$this->PayoutMethod = $value;
	}
	/**
	 * @return UserAgreementInfoType
	 * @param integer $index 
	 */
	function getUserAgreementInfo($index = null)
	{
		if ($index !== null) {
			return $this->UserAgreementInfo[$index];
		} else {
			return $this->UserAgreementInfo;
		}
	}
	/**
	 * @return void
	 * @param UserAgreementInfoType $value 
	 * @param  $index 
	 */
	function setUserAgreementInfo($value, $index = null)
	{
		if ($index !== null) {
			$this->UserAgreementInfo[$index] = $value;
		} else {
			$this->UserAgreementInfo = $value;
		}
	}
	/**
	 * @return void
	 * @param UserAgreementInfoType $value 
	 */
	function addUserAgreementInfo($value)
	{
		$this->UserAgreementInfo[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellereBayPaymentProcessConsentCodeType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'PayoutMethodSet' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PayoutMethod' =>
					array(
						'required' => false,
						'type' => 'PayoutMethodType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'UserAgreementInfo' =>
					array(
						'required' => false,
						'type' => 'UserAgreementInfoType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
