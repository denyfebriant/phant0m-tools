<?php
include "inc.php";
$priv8 = new Priv8_Tools();
if(isset($_GET['inj3ctEd'])){
	$isinya = $_GET['inj3ctEd'];
	$anunya = $_GET['0pO'];
	$opsi 	= $_GET['ops1ne'];
	if(isset($_GET['tambahan'])){
		$tambahan = $_GET['tambahan'];
	}
	if($opsi == "encode"){
		if($anunya == "base64"){
			$priv8->base64en($isinya);
		}elseif($anunya == "hexa"){
			$priv8->strToHex($isinya);
		}elseif($anunya == "hexa_1"){
			$priv8->strToHex_1($isinya);
		}elseif($anunya == "rot_13"){
			$priv8->kestr_rot13($isinya);
		}elseif($anunya == "decimal"){
			$priv8->string2dec($isinya);
		}elseif($anunya == "binary"){
			$priv8->text2bin($isinya);
		}elseif($anunya == "url_en"){
			$priv8->url_encode($isinya);
		}elseif($anunya == "caesar"){
			$priv8->CaesarCipher($isinya);
		}elseif($anunya == "atbash"){
			$priv8->atbash_encode($isinya);
		}elseif($anunya == "morse"){
			$priv8->morse_enc($isinya);
		}elseif($anunya == "vigenere"){
			$priv8->vigenere_enc($isinya,$tambahan);
		}elseif($anunya == "sms"){
			$priv8->sms_encode($isinya);
		}elseif($anunya == "octal"){
			$priv8->string_to_octal($isinya);
		}elseif($anunya == "md5"){
			$priv8->md5_en($isinya);
		}elseif($anunya == "sha1"){
			$priv8->sha1_en($isinya);
		}elseif($anunya == "le"){
			$priv8->le_pack($isinya);
		}elseif($anunya == "base32"){
			$priv8->base32_en($isinya);
		}
	}else{
		if($anunya == "base64"){
			$priv8->base64de($isinya);
		}elseif($anunya == "hexa"){
			$priv8->hexToStr($isinya);
		}elseif($anunya == "hexa_1"){
			$priv8->hexToStr_1($isinya);
		}elseif($anunya == "rot_13"){
			$priv8->kestr_rot13($isinya);
		}elseif($anunya == "decimal"){
			$priv8->dec2string($isinya);
		}elseif($anunya == "binary"){
			$priv8->bin2text($isinya);
		}elseif($anunya == "url_en"){
			$priv8->url_decode($isinya);
		}elseif($anunya == "morse"){
			$priv8->morse_dec($isinya);
		}elseif($anunya == "vigenere"){
			$priv8->vigenere_dec($isinya,$tambahan);
		}elseif($anunya == "sms"){
			$priv8->sms_decode($isinya);
		}elseif($anunya == "octal"){
			$priv8->octal_to_string($isinya);
		}
	}
}else{
?>
<html>
	<head>
	<title>Priv8 Tools v2.0 - Phant0m</title>
	<link rel="shortcut icon" type="image/x-icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico" />
	<script src="js/jquery.min.js"></script>
	<script src="js/ikkeh.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/phant0m.css">
	</head>
<body>
<center>
<div class="box">
		<div class="box-title">
		<h3><i class="fa fa-group"></i>
		Priv8 Tools v2.0 - Phant0m</h3>
		</div>
<div class="box-body box-body-nopadding">
<div class="row">
	<div class="col-xs-12">
		<div class="form-group">
		<label for="mailpass" class="control-label">Encode</label>
		<div>
		<textarea name="encodenya" id="encodenya" class="form-control" rows="7"></textarea>
		</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-2">
		<div class="form-group"><button type="button" class="btn btn-info" id="encodebro">ENCODE</button></div>
	</div>
	<div class="col-xs-8">
		<div class="form-group">
		<select id="anune" class="form-control">
			<option value="decimal">DECIMAL</option>
			<option value="hexa">HEXADECIMAL (Pisah Spasi)</option>
			<option value="hexa_1">HEXADECIMAL</option>
			<option value="binary">BINARY</option>
			<option value="octal">OCTAL</option>
			<option value="le">Little Endian</option>
			<option value="sha1">SHA1 (One Way)</option>
			<option value="md5">MD5 (One Way)</option>
			<option value="base64">BASE 64</option>
			<option value="rot_13">ROT 13</option>
			<option value="url_en">URL ENC/DEC</option>
			<option value="jj">JJ ENC/DEC</option>
			<option value="caesar">CAESAR (All Shift)</option>
			<option value="atbash">ATBASH</option>
			<option value="baconian">BACONIAN</option>
			<option value="morse">MORSE ENC/DEC</option>
			<option value="afine">AFINE ENC/DEC</option>
			<option value="vigenere">VIGENERE ENC/DEC</option>
			<option value="sms">SMS ENC/DEC</option>
		</select>
		</div>
	</div>
<div class="col-xs-2">
		<div class="form-group"><button type="button" class="btn btn-danger" id="decodebro" >DECODE</button></div>
</div>
</div>
<div class="row" id="bako_opsi" style="display:none">
	<div class="col-xs-12"><input type="checkbox" id="pisah_bako" checked="true"> <strong> Pisah per-5</strong></div>
</div>
<div class="row" id="vigenere_opsi" style="display:none">
	<div class="col-xs-12"><ul class="list-inline">KEY = <li><input class="form-control" type="text" id="key_vigenere" checked="true"></li></ul></div>
</div>
<div class="row" id="afine_opsi" style="display:none">
	<div class="col-xs-12">
		<ul class="list-inline">
			A = 
			<li>
			  <select id="kunci1" size="1" class="form-control"> 
			  <option>1</option> 
			  <option>3</option> 
			  <option>5</option> 
			  <option>7</option> 
			  <option>9</option> 
			  <option>11</option> 
			  <option>15</option> 
			  <option>17</option> 
			  <option>19</option> 
			  <option>21</option> 
			  <option>23</option> 
			  <option>25</option> 
			  </select></li>
B = <li>	
			  <select id="kunci2" size="1" class="form-control"> 
			  <option>0</option> 
			  <option>1</option> 
			  <option>2</option> 
			  <option>3</option> 
			  <option>4</option> 
			  <option>5</option> 
			  <option>6</option> 
			  <option>7</option> 
			  <option>8</option> 
			  <option>9</option> 
			  <option>10</option> 
			  <option>11</option> 
			  <option>12</option> 
			  <option>13</option> 
			  <option>14</option> 
			  <option>15</option> 
			  <option>16</option> 
			  <option>17</option> 
			  <option>18</option> 
			  <option>19</option> 
			  <option>20</option> 
			  <option>21</option> 
			  <option>22</option> 
			  <option>23</option> 
			  <option>24</option> 
			  <option>25</option> 
			  </select> </li></ul>
  </div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="form-group">
		<label for="mailpass" class="control-label">Decode</label>
		<div>
		<textarea name="decodenya" id="decodenya" class="form-control" rows="7"></textarea>
		</div>
		</div>
	</div>
</div>
</div>
</div>
<br>
</center>
<script src="js/phant0m.js"></script>
</body>
</html>
<?php
}
?>