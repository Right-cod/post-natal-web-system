<?php
 require __DIR__ . '/vendor/autoload.php';
 date_default_timezone_set('Africa/Nairobi');
$date=date("d/m/Y");
 use Carbon\Carbon;
 if (isset($_GET['phone'])) {
    //database
 $amount=100;
 $phoneNumber ='254'.(int)$_GET['phone'].'';
    //end here
	stkPush($amount,$phoneNumber);
    //stkPush($_GET['amount']);   
}
function lipaNaMpesaPassword()
{
    //timestamp
    $timestamp = Carbon::rawParse('now')->format('YmdHms');
    //passkey
    $passKey ="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $businessShortCOde =174379;
    //generate password
    $mpesaPassword = base64_encode($businessShortCOde.$passKey.$timestamp);

    return $mpesaPassword;
}
    

   function newAccessToken()
   {
       $consumer_key="Ru9yPBZIdlrThNThBrvwizFzJQtbmfGJ";
       $consumer_secret="PX6SUedsAfgnm3T9";
       $credentials = base64_encode($consumer_key.":".$consumer_secret);
       $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";


       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $curl_response = curl_exec($curl);
       $access_token=json_decode($curl_response);
       curl_close($curl);
       
       return $access_token->access_token;
   }



   function stkPush($amount,$phoneNumber)
   {
       //    $user = $request->user;
       //    $amount = $request->amount;
       //    $phone =  $request->phone;
       //    $formatedPhone = substr($phone, 1);//726582228
       //    $code = "254";
       //    $phoneNumber = $code.$formatedPhone;//254726582228

      
       


       $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
       $curl_post_data = [
            'BusinessShortCode' =>174379,
            'Password' => lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phoneNumber,
            'PartyB' => 174379,
            'PhoneNumber' => $phoneNumber,
            'CallBackURL' => 'https://2f50f430.ngrok.io/callback.php?key=Your$trongPssWard',
            'AccountReference' => "Livestock auction",
            'TransactionDesc' => "lipa Na M-PESA"
        ];


       $data_string = json_encode($curl_post_data);


       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.newAccessToken()));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
       $curl_response = json_decode(curl_exec($curl));

             //$curl2_response = json_decode(curl_exec($curl2));

       //echo json_encode($curl_response, JSON_PRETTY_PRINT);

       //print_r($curl_response);

       if ($curl_response->ResponseCode == 0) {
       	# code...
           echo "register_success";
        }
       else if($curl_response->errorMessage == "Bad Request - Invalid PhoneNumber"){
       	echo "payment_failed ";
       }
   }

?>
