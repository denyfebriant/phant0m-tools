<?php
set_time_limit(0);
class Priv8_Tools {
	public function base64en($masukan){
		echo json_encode(array('hasil' => base64_encode($masukan)));
	}
	public function base64de($masukan){
		echo json_encode(array('hasil' => base64_decode($masukan)));
	}
	public function strToHex($string){
    $hex = "";
    for ($i=0; $i < strlen($string); $i++)
    {
        $hex .= dechex(ord($string[$i]));
    }
    //echo json_encode(array('hasil' => chunk_split(strtoupper($hex), 2, ' ')));
    echo json_encode(array('hasil' => chunk_split($hex, 2, ' ')));
	}
	public function hexToStr($hex){
    $string = "";
    $hex  	= str_replace(" ", "", $hex);
    for ($i=0; $i < strlen($hex)-1; $i+=2)
    {
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    echo json_encode(array('hasil' => $string));
	}
    public function kestr_rot13($masukan){
        echo json_encode(array('hasil'=> str_rot13($masukan)));
    }
    public function string2dec($string) {
        $ret = '';
        for ($i=0; $i<strlen($string); $i++) { 
            //$ret .= str_pad(ord(substr($string,$i,1)),3,'0', STR_PAD_LEFT)." ";    
            $ret .= ord(substr($string,$i,1))." "; 
        }     
        echo json_encode(array('hasil' => $ret)); 
    }
    public function dec2string($dec) {
        $ret = '';
        $pisah = explode(" ",$dec);
        /*$dec = str_replace(" ","",$dec);
        $padLen = ceil(strlen($dec)/3)*3;
        $pad = str_pad($dec,$padLen,'0',STR_PAD_LEFT);
        for ($i=0; $i<(strlen($dec)/3); $i++) {         
            $ret .= chr(substr(strval($dec), $i*3, 3));     
        }*/  
        for ($i=0; $i < count($pisah); $i++) { 
            $ret .= chr(strval($pisah[$i]));
             //$ret .= chr(substr(strval($dec), $i*3, 3));    
        }  
        echo json_encode(array('hasil' => trim($ret))); 
    }
    public function text2bin($string) { 
        $bin = '';
        for($i=0; $i<strlen($string); $i++) { 
            if( ($c = ord($string{$i})) != 0) $bin .= decbin($c); 
            if( $i != (strlen($string) -1) )  $bin .= " "; 
        }
        echo json_encode(array('hasil' => $bin));  
    } 

    public function bin2text($binstr) { 
        
        $bin = explode(" ",$binstr); 
        for($i=0; $i<count($bin); $i++) 
            $txt .= chr(bindec($bin[$i]));
        echo json_encode(array('hasil' => $txt));     
    }
    public function url_encode($masukan){
        echo json_encode(array('hasil' => urlencode($masukan)));
    }
    public function url_decode($masukan){
        echo json_encode(array('hasil' => urldecode($masukan)));
    }

    public function CaesarCipher($str) {
        $ea = '';
        for($x=1;$x<=26;$x++){

            $max = strlen($str);
            $crypt = '';
            for($i = 0; $i < $max; $i++){
                if(ord($str[$i]) >= 65 && ord($str[$i]) <= 90){
                    if((ord($str[$i])+$x) > 90) {
                        $crypt .= chr(65+((ord($str[$i])+$x)-91));
                    } else {
                        $crypt .= chr(ord($str[$i])+$x);
                    }
                }
                else if(ord($str[$i]) >= 97 && ord($str[$i]) <= 122){
                    if((ord($str[$i])+$x) > 122) {
                        $crypt .= chr(97+((ord($str[$i])+$x)-123));
                    } else {
                        $crypt .= chr(ord($str[$i])+$x);
                    }
                }else if(ord($str[$i]) == 32){
                    $crypt .= chr(32);
                }else{
                     echo json_encode(array('hasil' => "ERROR BEB"));
                     die();
                }
            }
            $ea .= "Geser Ke ".$x." \t => ".$crypt."\n";
        }
        echo json_encode(array('hasil' => $ea));
    }
    public function atbash_encode($string) { 
        $final = ""; 
        $v = array( 
        "a"=>"z", "A"=>"Z",
        "b"=>"y", "B"=>"Y",
        "c"=>"x", "C"=>"X",
        "d"=>"w", "D"=>"W",
        "e"=>"v", "E"=>"V",
        "f"=>"u", "F"=>"U",
        "g"=>"t", "G"=>"T",
        "h"=>"s", "H"=>"S",
        "i"=>"r", "I"=>"R",
        "j"=>"q", "J"=>"Q",
        "k"=>"p", "K"=>"P",
        "l"=>"o", "L"=>"O",
        "m"=>"n", "M"=>"N",
        "n"=>"m", "N"=>"M",
        "o"=>"l", "O"=>"L",
        "p"=>"k", "P"=>"K",
        "q"=>"j", "Q"=>"J",
        "r"=>"i", "R"=>"I",
        "s"=>"h", "S"=>"H",
        "t"=>"g", "T"=>"G",
        "u"=>"f", "U"=>"F",
        "v"=>"e", "V"=>"E",
        "w"=>"d", "W"=>"D",
        "x"=>"c", "X"=>"C",
        "y"=>"b", "Y"=>"B",
        "z"=>"a", "Z"=>"A",
        " "=>" "
        );   
        for($i=0;$i<strlen($string);$i++) {
            if(!isset($v[$string[$i]])){
                $final .= $string[$i];
            }else{
                $final .= $v[$string[$i]];
            }
        }
        echo json_encode(array('hasil' => $final));   
    }
    public function morse_enc($masukan){
        $morse=array(
            "a"=>".-",
            "b"=>"-...",
            "c"=>"-.-.",
            "d"=>"-..",
            "e"=>".",
            "f"=>"..-.",
            "g"=>"--.",
            "h"=>"....",
            "i"=>"..",
            "j"=>".---",
            "k"=>"-.-",
            "l"=>".-..",
            "m"=>"--",
            "n"=>"-.",
            "o"=>"---",
            "p"=>".--.",
            "q"=>"--.-",
            "r"=>".-.",
            "s"=>"...",
            "t"=>"-",
            "u"=>"..-",
            "v"=>"...-",
            "w"=>".--",
            "x"=>"-..-",
            "y"=>"-.--",
            "z"=>"--..",
            "1"=>".----",
            "2"=>"..---",
            "3"=>"...--",
            "4"=>"....-",
            "5"=>".....",
            "6"=>"-....",
            "7"=>"--...",
            "8"=>"---..",
            "9"=>"----.",
            "0"=>"-----",
            " "=>"   ",
            "."=>".-.-.-",
            ","=>"--..--",
            "?"=>"..--..",
            "!"=>"..--.",
            ":"=>"---...",
            "'"=>".----.",
            "\""=>".-..-.",
            "="=>"-...-",
            "EOM"=>".-.-."
        );
        $letters=array();
        $masukan = strtolower($masukan);
        $line = "";
        for ($i = 0; $i < strlen($masukan); $i++) {
            $letter = substr($masukan,$i,1);
            if ($morse[$letter] == "") continue;
                $line .= ($morse[$letter]." ");
            }
        echo json_encode(array('hasil' => trim($line))); 
    }
    public function morse_dec($masukan){
        $morse=array(
            "a"=>".-",
            "b"=>"-...",
            "c"=>"-.-.",
            "d"=>"-..",
            "e"=>".",
            "f"=>"..-.",
            "g"=>"--.",
            "h"=>"....",
            "i"=>"..",
            "j"=>".---",
            "k"=>"-.-",
            "l"=>".-..",
            "m"=>"--",
            "n"=>"-.",
            "o"=>"---",
            "p"=>".--.",
            "q"=>"--.-",
            "r"=>".-.",
            "s"=>"...",
            "t"=>"-",
            "u"=>"..-",
            "v"=>"...-",
            "w"=>".--",
            "x"=>"-..-",
            "y"=>"-.--",
            "z"=>"--..",
            "1"=>".----",
            "2"=>"..---",
            "3"=>"...--",
            "4"=>"....-",
            "5"=>".....",
            "6"=>"-....",
            "7"=>"--...",
            "8"=>"---..",
            "9"=>"----.",
            "0"=>"-----",
            " "=>"   ",
            "."=>".-.-.-",
            ","=>"--..--",
            "?"=>"..--..",
            "!"=>"..--.",
            ":"=>"---...",
            "'"=>".----.",
            "\""=>".-..-.",
            "="=>"-...-",
            "EOM"=>".-.-."
        );
        $letters=array();    
        $masukan = strtolower($masukan);
            reset($morse);
            while (list($letter,$code) = each($morse)) {
                $letters[$code] = $letter;
            }
            $line = "";
            $words = array();
            $chars = array();
            $words = preg_split("/".$morse[" "]."/", $masukan, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($words as $word) {
                $chars = array_merge($chars, preg_split("/ /", $word, -1, PREG_SPLIT_NO_EMPTY));
                $chars[] = '';
            }
            $chars[count($chars)-1] = $morse["EOM"];
            foreach ($chars as $char) {
                if ($char == "") {
                    $line .= " ";
                }
                if ($char == $morse["EOM"]) {
                    break;
                }
                if ($letters[$char] == "") {
                    continue;
                }
                $line .= $letters[$char];
            }
            echo json_encode(array('hasil' => trim($line)));

    }
    public function vigenere_enc($plaintext, $key) 
        { 
        $ketemu = '';
        for ($i=0, $j=0, $n=strlen($key); $i < strlen($plaintext); $i++) {
        $key_n = $j % $n;
        if (ord($plaintext[$i]) >= 65 && ord($plaintext[$i]) <= 90) {
            $steb_1 = ord(strtolower($key[$key_n])) - 97;
            $steb_2 = (ord($plaintext[$i]) - 65 + $steb_1) % 26;
            $ketemu .= chr($steb_2 + 65);
            $j++;
        }
        elseif (ord($plaintext[$i]) >= 97 && ord($plaintext[$i]) <= 122) {
            $steb_1 = ord(strtolower($key[$key_n])) - 97;
            $steb_2 = (ord($plaintext[$i]) - 97 + $steb_1) % 26;
            $ketemu .= chr($steb_2 + 97);
            $j++;
        }
        else {
            $ketemu .= $plaintext[$i];
        }
        }
        echo json_encode(array('hasil' => $ketemu));
        } 

    public function vigenere_dec($ciphertext, $key) 
        { 
            $ketemu = '';
            for ($i=0, $j=0, $n=strlen($key); $i < strlen($ciphertext); $i++) {
        $key_n = $j % $n;
        if (ord($ciphertext[$i]) >= 65 && ord($ciphertext[$i]) <= 90) {
            $steb_1 = ord(strtolower($key[$key_n])) - 97;
            $steb_2 = (ord($ciphertext[$i]) - 65 - $steb_1) % 26;
            $steb_3 = (($steb_2 < 0) ? 26+$steb_2 : $steb_2) % 26;
            $ketemu .= chr($steb_3 + 65);
            $j++;
        }
        elseif (ord($ciphertext[$i]) >= 97 && ord($ciphertext) <= 122) {
            $steb_1 = ord(strtolower($key[$key_n])) - 97;
            $steb_2 = (ord($ciphertext[$i]) - 97 - $steb_1);
            $steb_3 = (($steb_2 < 0) ? 26+$steb_2 : $steb_2) % 26;
            $ketemu .= chr($steb_3 + 97);
            $j++;
        }
        else {
            $ketemu .= $ciphertext[$i];
        }
        }
        echo json_encode(array('hasil' => $ketemu));
        } 
    public function sms_decode($message) { 
        $final = ""; 
        $text = array( 
            "2"=>"a", "22"=>"b", 
            "222"=>"c", "3"=>"d", 
            "33"=>"e", "333"=>"f", 
            "4"=>"g", "44"=>"h", 
            "444"=>"i", "5"=>"j", 
            "55"=>"k", "555"=>"l", 
            "6"=>"m", "66"=>"n", 
            "666"=>"o", "7"=>"p", 
            "77"=>"q", "777"=>"r", 
            "7777"=>"s", "8"=>"t", 
            "88"=>"u", "888"=>"v", 
            "9"=>"w", "99"=>"x", "999"=>"y", 
            "9999"=>"z" 
            );   
        $message = explode(" ",$message); 
        for($i=0;$i<count($message);$i++) { 
            $final .= $text[$message[$i]]; 
        }
        echo json_encode(array('hasil' => $final)); 
    }
    public function sms_encode($masukan) {  
        $text = array_flip(array( 
            "2"=>"a", "22"=>"b", 
            "222"=>"c", "3"=>"d", 
            "33"=>"e", "333"=>"f", 
            "4"=>"g", "44"=>"h", 
            "444"=>"i", "5"=>"j", 
            "55"=>"k", "555"=>"l", 
            "6"=>"m", "66"=>"n", 
            "666"=>"o", "7"=>"p", 
            "77"=>"q", "777"=>"r", 
            "7777"=>"s", "8"=>"t", 
            "88"=>"u", "888"=>"v", 
            "9"=>"w", "99"=>"x", "999"=>"y", 
            "9999"=>"z" 
            )); 
        $letters=array();
        $masukan = strtolower($masukan);
        $line = "";
        for ($i = 0; $i < strlen($masukan); $i++) {
            $letter = substr($masukan,$i,1);
            if ($text[$letter] == "") continue;
                $line .= ($text[$letter]." ");
            }
        echo json_encode(array('hasil' => trim($line)));  
    }
    public function string_to_octal($str)
    {
        $chars = str_split($str);
        $rtn = "";

        foreach ($chars as $c) { 
            $rtn .= str_pad(base_convert(ord($c), 10, 8), 3, 0, STR_PAD_LEFT)." "; 
        }
        echo json_encode(array('hasil' => trim($rtn)));
    }
    public function octal_to_string($masukan){
        $masukan = explode(" ",$masukan);
        $hasil = "";
        for($i=0;$i<count($masukan);$i++) { 
            $hasil .= chr(octdec($masukan[$i])); 
        }
        echo json_encode(array('hasil' => $hasil));
    }
    public function md5_en($masukan){
        echo json_encode(array('hasil' => md5($masukan)));
    }
    public function sha1_en($masukan){
        echo json_encode(array('hasil' => sha1($masukan)));
    }
    public function le_pack($masukan){
        $ubah = "\x".implode('\x', array_reverse(str_split($masukan, 2)));
        echo json_encode(array('hasil' => $ubah));
    }
    public function strToHex_1($string){
    $hex = "";
    for ($i=0; $i < strlen($string); $i++)
    {
        $hex .= dechex(ord($string[$i]));
    }
    echo json_encode(array('hasil' => $hex));
    }
    public function hexToStr_1($hex){
    $string = "";
    for ($i=0; $i < strlen($hex)-1; $i+=2)
    {
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    echo json_encode(array('hasil' => $string));
    }
    public function base32_en($masukan){

    }
}

?>