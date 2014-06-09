<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Type defining the <b>MinimumFeedbackScore</b> container that is returned in 
 * <b>GeteBayDetails</b>. The <b>MinimumFeedbackScore</b> container consists of the 
 * values that can be used in the 
 * <b>BuyerRequirementDetails.MinimumFeedbackScore</b> field when listing an item 
 * through an Add/Revise/Relist API call. The Feedback Score for a potential buyer 
 * must be greater than or equal to the specified value, or that buyer is blocked 
 * from buying the item.<br/><br/>For the <b>MinimumFeedbackScore</b> container to 
 * appear in the <b>GeteBayDetails</b> response, <b>BuyerRequirementDetails</b> 
 * must be one of the values passed into the <b>DetailName</b> field in the 
 * <b>GeteBayDetails</b> request (or, no <b>DetailName</b> filters should be used). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MinimumFeedbackScoreDetailsType.html
 *
 */
class MinimumFeedbackScoreDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $FeedbackScore;

	/**
	 * @return int
	 * @param integer $index 
	 */
	function getFeedbackScore($index = null)
	{
		if ($index !== null) {
			return $this->FeedbackScore[$index];
		} else {
			return $this->FeedbackScore;
		}
	}
	/**
	 * @return void
	 * @param int $value 
	 * @param  $index 
	 */
	function setFeedbackScore($value, $index = null)
	{
		if ($index !== null) {
			$this->FeedbackScore[$index] = $value;
		} else {
			$this->FeedbackScore = $value;
		}
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function addFeedbackScore($value)
	{
		$this->FeedbackScore[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MinimumFeedbackScoreDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'FeedbackScore' =>
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
