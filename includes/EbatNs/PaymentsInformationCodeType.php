<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'PaymentInformationCodeType.php';

/**
 * Type defining the Contains details payment information 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PaymentsInformationCodeType.html
 *
 */
class PaymentsInformationCodeType extends EbatNs_ComplexType
{
	/**
	 * @var PaymentInformationCodeType
	 */
	protected $Payments;

	/**
	 * @return PaymentInformationCodeType
	 */
	function getPayments()
	{
		return $this->Payments;
	}
	/**
	 * @return void
	 * @param PaymentInformationCodeType $value 
	 */
	function setPayments($value)
	{
		$this->Payments = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PaymentsInformationCodeType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Payments' =>
					array(
						'required' => false,
						'type' => 'PaymentInformationCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
