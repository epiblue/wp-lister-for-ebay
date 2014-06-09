<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'DepositTypeCodeType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'AmountType.php';

/**
 * Type defining the <b>PaymentDetails</b> container, which is used by the seller 
 * tospecify amounts and due dates for deposits and full payment on motor vehicle 
 * listings. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PaymentDetailsType.html
 *
 */
class PaymentDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $HoursToDeposit;
	/**
	 * @var int
	 */
	protected $DaysToFullPayment;
	/**
	 * @var AmountType
	 */
	protected $DepositAmount;
	/**
	 * @var DepositTypeCodeType
	 */
	protected $DepositType;

	/**
	 * @return int
	 */
	function getHoursToDeposit()
	{
		return $this->HoursToDeposit;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setHoursToDeposit($value)
	{
		$this->HoursToDeposit = $value;
	}
	/**
	 * @return int
	 */
	function getDaysToFullPayment()
	{
		return $this->DaysToFullPayment;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setDaysToFullPayment($value)
	{
		$this->DaysToFullPayment = $value;
	}
	/**
	 * @return AmountType
	 */
	function getDepositAmount()
	{
		return $this->DepositAmount;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setDepositAmount($value)
	{
		$this->DepositAmount = $value;
	}
	/**
	 * @return DepositTypeCodeType
	 */
	function getDepositType()
	{
		return $this->DepositType;
	}
	/**
	 * @return void
	 * @param DepositTypeCodeType $value 
	 */
	function setDepositType($value)
	{
		$this->DepositType = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PaymentDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'HoursToDeposit' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DaysToFullPayment' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DepositAmount' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DepositType' =>
					array(
						'required' => false,
						'type' => 'DepositTypeCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
