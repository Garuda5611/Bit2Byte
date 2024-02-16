<?php
function executeCode($code, $language_id, $input)
{
    $url = 'https://judge0-ce.p.rapidapi.com/submissions?base64_encoded=true&wait=true';
    $host = 'judge0-ce.p.rapidapi.com';
    $key = '0f517033d0msh8d72406d3ecd7fbp19550ejsn382e4704da23'; // Replace with your API key


    // Encode the Python code in base64
    $base64_code = base64_encode($code);

    // Set up the request data
    $data = array(
        'language_id' => $language_id, // 34 is the language ID for Python
        'source_code' => $base64_code,
        'stdin' => $input,
    );

    // Set up the request headers
    $headers = array(
        'X-RapidAPI-Host: ' . $host,
        'X-RapidAPI-Key: ' . $key,
        'Content-Type: application/json',
    );

    // Send the request to Judge0 API
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}
function executeCodeJ($program,$language,$input)
{
        $clientId="dee8fa0d4b18ade65e907b174952490e";
        $clientSecret="ba99a2c5fdb871630876207149abe4e4d452abc0c6e5d6de51387006058b221";
        $versionIndex=3;
        //$input=$_POST['input'];
        $timeout=2; // in seconds

        $data = array(
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'script' => $program,
            'language' => $language,
            'versionIndex' => $versionIndex,
            'stdin' => $input,
            'stdout' => "",
            'stderr' => "",
            'time' => $timeout,
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
        curl_close($ch);
        return $response;
}
?>