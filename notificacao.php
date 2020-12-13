<?php 
	require('vendor/autoload.php');
	//https://github.com/mercadopago/dx-php
	$mp = new MP('4842619708361379', 'NDrULCE7JyfZj4onvhkALvluuwweCzsI');
	$mp->sandbox_mode(false);

	$info = $mp->get_payment_info($_GET['id']);

	if($info['status'] == 200){
		$ref = $info['response']['collection']['external_reference'];
		$status = $info['response']['collection']['status'];
		if($status == 'approved'){
			//pagamento aprovado
		}
	}
?>