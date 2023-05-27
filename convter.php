<?php  
    // $url = "https://bitpay.com/api/rates";

    // $json = file_get_contents($url);
    // $data = json_decode($json, TRUE);

    // $rate = $data[1]["rate"];    
    // $usd_price = 10;     # Let cost of elephant be 10$

    // echo $bitcoin_price = round( $usd_price / $rate , 8 );


$url='https://bitpay.com/api/rates';
$json=json_decode( file_get_contents( $url ) );
$dollar=$btc=0;

foreach( $json as $obj ){
    if( $obj->code=='ZAR' )$btc=$obj->rate;
}

echo "1 bitcoin=\$" . $btc . " ZAR<br />";
$zar= 1 / $btc;
echo "500 ZAR = " . round( $zar * 500,8 )." BTC";

?>