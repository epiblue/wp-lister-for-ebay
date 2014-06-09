<?php
// autogenerated file 30.09.2013 15:20
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Enumerated type that contains the complete list of platform notifications that 
 * can be sent out to subscribed users, servers, or applications. Some 
 * notifications are only sent to buyers or sellers, and some are sent to both 
 * buyers and sellers. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/NotificationEventTypeCodeType.html
 *
 * @property string None
 * @property string OutBid
 * @property string EndOfAuction
 * @property string AuctionCheckoutComplete
 * @property string CheckoutBuyerRequestsTotal
 * @property string Feedback
 * @property string FeedbackForSeller
 * @property string FixedPriceTransaction
 * @property string SecondChanceOffer
 * @property string AskSellerQuestion
 * @property string ItemListed
 * @property string ItemRevised
 * @property string BuyerResponseDispute
 * @property string SellerOpenedDispute
 * @property string SellerRespondedToDispute
 * @property string SellerClosedDispute
 * @property string BestOffer
 * @property string MyMessagesAlertHeader
 * @property string MyMessagesAlert
 * @property string MyMessageseBayMessageHeader
 * @property string MyMessageseBayMessage
 * @property string MyMessagesM2MMessageHeader
 * @property string MyMessagesM2MMessage
 * @property string INRBuyerOpenedDispute
 * @property string INRBuyerRespondedToDispute
 * @property string INRBuyerClosedDispute
 * @property string INRSellerRespondedToDispute
 * @property string Checkout
 * @property string WatchedItemEndingSoon
 * @property string ItemClosed
 * @property string ItemSuspended
 * @property string ItemSold
 * @property string ItemExtended
 * @property string UserIDChanged
 * @property string EmailAddressChanged
 * @property string PasswordChanged
 * @property string PasswordHintChanged
 * @property string PaymentDetailChanged
 * @property string AccountSuspended
 * @property string AccountSummary
 * @property string ThirdPartyCartCheckout
 * @property string ItemRevisedAddCharity
 * @property string ItemAddedToWatchList
 * @property string ItemRemovedFromWatchList
 * @property string ItemAddedToBidGroup
 * @property string ItemRemovedFromBidGroup
 * @property string FeedbackLeft
 * @property string FeedbackReceived
 * @property string FeedbackStarChanged
 * @property string BidPlaced
 * @property string BidReceived
 * @property string ItemWon
 * @property string ItemLost
 * @property string ItemUnsold
 * @property string CounterOfferReceived
 * @property string BestOfferDeclined
 * @property string BestOfferPlaced
 * @property string AddToWatchList
 * @property string PlaceOffer
 * @property string RemoveFromWatchList
 * @property string AddToBidGroup
 * @property string RemoveFromBidGroup
 * @property string ItemsCanceled
 * @property string TokenRevocation
 * @property string BulkDataExchangeJobCompleted
 * @property string CustomCode
 * @property string ItemMarkedShipped
 * @property string ItemMarkedPaid
 * @property string EBPMyResponseDue
 * @property string EBPOtherPartyResponseDue
 * @property string EBPEscalatedCase
 * @property string EBPAppealedCase
 * @property string EBPMyPaymentDue
 * @property string EBPPaymentDone
 * @property string EBPClosedAppeal
 * @property string EBPClosedCase
 * @property string MyMessagesHighPriorityMessage
 * @property string MyMessagesHighPriorityMessageHeader
 * @property string EBPOnHoldCase
 * @property string ReadyToShip
 * @property string ReadyForPayout
 * @property string BidItemEndingSoon
 * @property string ShoppingCartItemEndingSoon
 * @property string ReturnCreated
 * @property string ReturnWaitingForSellerInfo
 * @property string ReturnSellerInfoOverdue
 * @property string ReturnShipped
 * @property string ReturnDelivered
 * @property string ReturnRefundOverdue
 * @property string ReturnClosed
 * @property string ReturnEscalated
 * @property string UnmatchedPaymentReceived
 * @property string RefundSuccess
 * @property string RefundFailure
 */
class NotificationEventTypeCodeType extends EbatNs_FacetType
{
	const CodeType_None = 'None';
	const CodeType_OutBid = 'OutBid';
	const CodeType_EndOfAuction = 'EndOfAuction';
	const CodeType_AuctionCheckoutComplete = 'AuctionCheckoutComplete';
	const CodeType_CheckoutBuyerRequestsTotal = 'CheckoutBuyerRequestsTotal';
	const CodeType_Feedback = 'Feedback';
	const CodeType_FeedbackForSeller = 'FeedbackForSeller';
	const CodeType_FixedPriceTransaction = 'FixedPriceTransaction';
	const CodeType_SecondChanceOffer = 'SecondChanceOffer';
	const CodeType_AskSellerQuestion = 'AskSellerQuestion';
	const CodeType_ItemListed = 'ItemListed';
	const CodeType_ItemRevised = 'ItemRevised';
	const CodeType_BuyerResponseDispute = 'BuyerResponseDispute';
	const CodeType_SellerOpenedDispute = 'SellerOpenedDispute';
	const CodeType_SellerRespondedToDispute = 'SellerRespondedToDispute';
	const CodeType_SellerClosedDispute = 'SellerClosedDispute';
	const CodeType_BestOffer = 'BestOffer';
	const CodeType_MyMessagesAlertHeader = 'MyMessagesAlertHeader';
	const CodeType_MyMessagesAlert = 'MyMessagesAlert';
	const CodeType_MyMessageseBayMessageHeader = 'MyMessageseBayMessageHeader';
	const CodeType_MyMessageseBayMessage = 'MyMessageseBayMessage';
	const CodeType_MyMessagesM2MMessageHeader = 'MyMessagesM2MMessageHeader';
	const CodeType_MyMessagesM2MMessage = 'MyMessagesM2MMessage';
	const CodeType_INRBuyerOpenedDispute = 'INRBuyerOpenedDispute';
	const CodeType_INRBuyerRespondedToDispute = 'INRBuyerRespondedToDispute';
	const CodeType_INRBuyerClosedDispute = 'INRBuyerClosedDispute';
	const CodeType_INRSellerRespondedToDispute = 'INRSellerRespondedToDispute';
	const CodeType_Checkout = 'Checkout';
	const CodeType_WatchedItemEndingSoon = 'WatchedItemEndingSoon';
	const CodeType_ItemClosed = 'ItemClosed';
	const CodeType_ItemSuspended = 'ItemSuspended';
	const CodeType_ItemSold = 'ItemSold';
	const CodeType_ItemExtended = 'ItemExtended';
	const CodeType_UserIDChanged = 'UserIDChanged';
	const CodeType_EmailAddressChanged = 'EmailAddressChanged';
	const CodeType_PasswordChanged = 'PasswordChanged';
	const CodeType_PasswordHintChanged = 'PasswordHintChanged';
	const CodeType_PaymentDetailChanged = 'PaymentDetailChanged';
	const CodeType_AccountSuspended = 'AccountSuspended';
	const CodeType_AccountSummary = 'AccountSummary';
	const CodeType_ThirdPartyCartCheckout = 'ThirdPartyCartCheckout';
	const CodeType_ItemRevisedAddCharity = 'ItemRevisedAddCharity';
	const CodeType_ItemAddedToWatchList = 'ItemAddedToWatchList';
	const CodeType_ItemRemovedFromWatchList = 'ItemRemovedFromWatchList';
	const CodeType_ItemAddedToBidGroup = 'ItemAddedToBidGroup';
	const CodeType_ItemRemovedFromBidGroup = 'ItemRemovedFromBidGroup';
	const CodeType_FeedbackLeft = 'FeedbackLeft';
	const CodeType_FeedbackReceived = 'FeedbackReceived';
	const CodeType_FeedbackStarChanged = 'FeedbackStarChanged';
	const CodeType_BidPlaced = 'BidPlaced';
	const CodeType_BidReceived = 'BidReceived';
	const CodeType_ItemWon = 'ItemWon';
	const CodeType_ItemLost = 'ItemLost';
	const CodeType_ItemUnsold = 'ItemUnsold';
	const CodeType_CounterOfferReceived = 'CounterOfferReceived';
	const CodeType_BestOfferDeclined = 'BestOfferDeclined';
	const CodeType_BestOfferPlaced = 'BestOfferPlaced';
	const CodeType_AddToWatchList = 'AddToWatchList';
	const CodeType_PlaceOffer = 'PlaceOffer';
	const CodeType_RemoveFromWatchList = 'RemoveFromWatchList';
	const CodeType_AddToBidGroup = 'AddToBidGroup';
	const CodeType_RemoveFromBidGroup = 'RemoveFromBidGroup';
	const CodeType_ItemsCanceled = 'ItemsCanceled';
	const CodeType_TokenRevocation = 'TokenRevocation';
	const CodeType_BulkDataExchangeJobCompleted = 'BulkDataExchangeJobCompleted';
	const CodeType_CustomCode = 'CustomCode';
	const CodeType_ItemMarkedShipped = 'ItemMarkedShipped';
	const CodeType_ItemMarkedPaid = 'ItemMarkedPaid';
	const CodeType_EBPMyResponseDue = 'EBPMyResponseDue';
	const CodeType_EBPOtherPartyResponseDue = 'EBPOtherPartyResponseDue';
	const CodeType_EBPEscalatedCase = 'EBPEscalatedCase';
	const CodeType_EBPAppealedCase = 'EBPAppealedCase';
	const CodeType_EBPMyPaymentDue = 'EBPMyPaymentDue';
	const CodeType_EBPPaymentDone = 'EBPPaymentDone';
	const CodeType_EBPClosedAppeal = 'EBPClosedAppeal';
	const CodeType_EBPClosedCase = 'EBPClosedCase';
	const CodeType_MyMessagesHighPriorityMessage = 'MyMessagesHighPriorityMessage';
	const CodeType_MyMessagesHighPriorityMessageHeader = 'MyMessagesHighPriorityMessageHeader';
	const CodeType_EBPOnHoldCase = 'EBPOnHoldCase';
	const CodeType_ReadyToShip = 'ReadyToShip';
	const CodeType_ReadyForPayout = 'ReadyForPayout';
	const CodeType_BidItemEndingSoon = 'BidItemEndingSoon';
	const CodeType_ShoppingCartItemEndingSoon = 'ShoppingCartItemEndingSoon';
	const CodeType_ReturnCreated = 'ReturnCreated';
	const CodeType_ReturnWaitingForSellerInfo = 'ReturnWaitingForSellerInfo';
	const CodeType_ReturnSellerInfoOverdue = 'ReturnSellerInfoOverdue';
	const CodeType_ReturnShipped = 'ReturnShipped';
	const CodeType_ReturnDelivered = 'ReturnDelivered';
	const CodeType_ReturnRefundOverdue = 'ReturnRefundOverdue';
	const CodeType_ReturnClosed = 'ReturnClosed';
	const CodeType_ReturnEscalated = 'ReturnEscalated';
	const CodeType_UnmatchedPaymentReceived = 'UnmatchedPaymentReceived';
	const CodeType_RefundSuccess = 'RefundSuccess';
	const CodeType_RefundFailure = 'RefundFailure';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('NotificationEventTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_NotificationEventTypeCodeType = new NotificationEventTypeCodeType();

?>
