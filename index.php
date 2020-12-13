<?php 
	require('vendor/autoload.php');
	//https://github.com/mercadopago/dx-php

	//baixar versão: composer require mercadopago/sdk:0.5.2
	//ou utilizar a atualizada: https://github.com/mercadopago/dx-php
	$mp = new MP('4842619708361379', 'NDrULCE7JyfZj4onvhkALvluuwweCzsI');

	$data = array(
		'items' => array(),
		'shipments'=> array(
			'mode'=>'custom',
			'cost'=>20.0,
			'receiver_adress'=>array(
				'zip_code'=>'88080-820'
			)
		),
		'back_urls'=>array(
			'success'=> 'http://localhost/mercado-pago/obrigado.php',
			'pending'=> 'http://localhost/mercado-pago/pendente.php',
			'failure'=> 'http://localhost/mercado-pago/falha.php'
		),
		'notification_url'=> 'http://localhost/mercado-pago/notificacao.php',
		'auto_return'=> 'approved',
		'external_reference'=> uniqid()
	);

	$data['items'][0] = array(
		'title'=>'Sapato',
		'quantity'=>1,
		'currency_id'=>'BRL',
		'unit_price'=>200.0
	);

	$link = $mp->create_preference($data);
	// echo '<pre>';
	// print_r($link);
	// echo '</pre>';
	header('Location: '.$link['response']['init_point']);
	exit();
?>