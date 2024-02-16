<?php

// Set up the API endpoint and authentication credentials
$url = 'https://judge0-ce.p.rapidapi.com/submissions?base64_encoded=true&wait=true';
$host = 'judge0-ce.p.rapidapi.com';
$key = '0f517033d0msh8d72406d3ecd7fbp19550ejsn382e4704da23'; // Replace with your API key

// Java code to be executed
$java_code = 'public class Main {
    public static void main(String[] args) {
        System.out.println("Hello, World!");
    }
}';

// Encode the Java code in base64
$base64_code = base64_encode($java_code);

// Set up the request data
$data = array(
    'language_id' => 62, // 3 is the language ID for Java
    'source_code' => $base64_code,
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
// Decode the response and print the output
$result = json_decode($response, true);
$output = base64_decode($result['stdout']);
echo $output;

?>
