<?PHP
if (!isset($_GET["camnum"]))
{
print("nothing");
exit;
}

$whichcamera = $_GET["camnum"];
$remote_ip = "";
if ($whichcamera =="1")
{
$remote_ip = "192.168.86.54";
$username = "SnApAdm1n"; 
$password = "PLAELALLDAAY"; 
}
else if ($whichcamera == "2")
{
$remote_ip = "192.168.86.126";
$username = "SnApAdm1n"; 
$password = "PDACLELLDAAR"; 
}
else
{
print("nope");
exit;
} 
$remote_url = 'http://' . $remote_ip . '/cgi-bin/camerastatus.cgi'; 

// Create a stream 
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header' => "Authorization: Basic " .
base64_encode("$username:$password"))); 

$context = stream_context_create($opts); 

// Open the file using the HTTP headers set above 

$file = file_get_contents($remote_url, false, $context); 

print($file);
?>
