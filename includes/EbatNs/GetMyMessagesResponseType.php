<?php
// autogenerated file 09.05.2012 13:19
// $Id: $
// $Log: $
//
//
require_once 'MyMessagesSummaryType.php';
require_once 'MyMessagesAlertArrayType.php';
require_once 'AbstractResponseType.php';
require_once 'MyMessagesMessageArrayType.php';

/**
 * Conains information about the messages sent toa user. Depending on the detail 
 * level, thisinformation can include message counts,resolution and flagged status, 
 * messageheaders, and message text. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetMyMessagesResponseType.html
 *
 */
class GetMyMessagesResponseType extends AbstractResponseType
{
	/**
	 * @var MyMessagesSummaryType
	 */
	protected $Summary;
	/**
	 * @var MyMessagesAlertArrayType
	 */
	protected $Alerts;
	/**
	 * @var MyMessagesMessageArrayType
	 */
	protected $Messages;

	/**
	 * @return MyMessagesSummaryType
	 */
	function getSummary()
	{
		return $this->Summary;
	}
	/**
	 * @return void
	 * @param MyMessagesSummaryType $value 
	 */
	function setSummary($value)
	{
		$this->Summary = $value;
	}
	/**
	 * @return MyMessagesAlertArrayType
	 */
	function getAlerts()
	{
		return $this->Alerts;
	}
	/**
	 * @return void
	 * @param MyMessagesAlertArrayType $value 
	 */
	function setAlerts($value)
	{
		$this->Alerts = $value;
	}
	/**
	 * @return MyMessagesMessageArrayType
	 */
	function getMessages()
	{
		return $this->Messages;
	}
	/**
	 * @return void
	 * @param MyMessagesMessageArrayType $value 
	 */
	function setMessages($value)
	{
		$this->Messages = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetMyMessagesResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Summary' =>
					array(
						'required' => false,
						'type' => 'MyMessagesSummaryType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Alerts' =>
					array(
						'required' => false,
						'type' => 'MyMessagesAlertArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Messages' =>
					array(
						'required' => false,
						'type' => 'MyMessagesMessageArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
