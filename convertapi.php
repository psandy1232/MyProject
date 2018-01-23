<?php
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
asort($fruits);
foreach ($fruits as $key => $val) {
    echo "$key = $val\n";
}
exit;


$imagPath = 'IMG_20171122_101821.jpg';
$ext='jpg';
$newfilename="result.pdf";

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/octet-stream'));
curl_setopt($curl, CURLOPT_URL, "https://v2.convertapi.com/".$ext."/to/pdf?secret=qpFk6QIchq27mFLO");
curl_setopt($curl, CURLOPT_POSTFIELDS, array('file' => new CurlFile($imagPath)));
file_put_contents($newfilename, curl_exec($curl));
$headers = curl_getinfo($curl);
if(0 < $headers['http_code'] && $headers['http_code'] < 400 ){
   echo "success";
}
echo "<pre>";
print_r($headers);
?>
