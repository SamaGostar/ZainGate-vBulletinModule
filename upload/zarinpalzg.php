<?php	
	$merchantID = $_POST['zp_mid'];
	$amount = $_POST['zp_amount']; //Amount will be based on Toman
	$callBackUrl = $_POST['zp_callback_url'];
	
	$client = new SoapClient('https://de.zarinpal.com/pg/services/WebGate/wsdl', array('encoding'=>'UTF-8'));
	$res = $client->PaymentRequest(
	array(
					'MerchantID' 	=> $merchantID ,
					'Amount' 		=> $amount ,
					'Description' 	=> $_POST['zp_comments'] ,
					'Email' 		=> '' ,
					'Mobile' 		=> '' ,
					'CallbackURL' 	=> $callBackUrl

					)
	
	 );
	
	//Redirect to URL You can do it also by creating a form
	Header('Location: https://www.zarinpal.com/pg/StartPay/'.$res->Authority . '/ZarinGate');
?>
