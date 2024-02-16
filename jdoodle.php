<?php
$clientId="dee8fa0d4b18ade65e907b174952490e";
$clientSecret="ba99a2c5fdb871630876207149abe4e4d452abc0c6e5d6de51387006058b221";
$program='
total = 0
for i in range(1, 11):
    total += 
print(total)
';
$language="python3";
$versionIndex=0;
//$input=$_POST['input'];
$timeout=10; // in seconds

$data = array(
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'script' => $program,
    'language' => $language,
    'versionIndex' => $versionIndex,
    'stdin' => "",
    'stdout' => "",
    'stderr' => "",
    'time' => "",
    'memory' => "",
    'callbackUrl' => "",
    'async' => 0,
    'priority' => 0,
    'encoding' => "utf-8"
);

$ch = curl_init('https://api.jdoodle.com/v1/execute');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
    CURLOPT_POSTFIELDS => json_encode($data)
));

$response = curl_exec($ch);

if($response === FALSE){
    die(curl_error($ch));
}
$responseArray = json_decode($response, true);
curl_close($ch);
?>
