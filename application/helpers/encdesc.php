 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 $string = "10101111101";
$encrypted = encryptIt($string);
$decrypted = decryptIt($encrypted);
 
echo $string."\n";
echo $encrypted."\n";
echo $decrypted."\n";

function encryptIt( $q ) {
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    $qEncoded = strToHex( $qEncoded );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $q = hexToStr( $q );
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function strToHex($string) {
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}

function hexToStr($hex) {
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}