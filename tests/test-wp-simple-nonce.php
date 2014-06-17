<?php

class WPSimpleNonceTest extends WP_UnitTestCase {

	function setup()
	{
		require_once "WPSimpleNonce.php";
	}


	function testSimple() 
	{
		$nonce = WPSimpleNonce::createNonce('test');
		$this->assertTrue(is_array($nonce));
		$this->assertArrayHasKey('name',$nonce);
		$this->assertArrayHasKey('value',$nonce);
		$this->assertTrue(WPSimpleNonce::checkNonce($nonce['name'],$nonce['value']));
		return;
	}


	function testFormField()
	{
		$field = WPSimpleNonce::createNonceField('test');
		$this->assertArrayHasKey('name',$field);
		$this->assertArrayHasKey('value',$field);
		$this->assertRegExp('/.*value="(.*)".*/',$field['value']);
		preg_match('/.*value="(.*)".*/',$field['value'],$matches);
		$this->assertTrue(WPSimpleNonce::checkNonce($field['name'],$matches[1]));
		return;
	}


	function testComplex() 
	{
		$nonce = WPSimpleNonce::createNonce('nonceTest');
		$field = WPSimpleNonce::createNonceField('complexFieldTest');
		$this->assertNotEmpty($nonce['name']);
		$this->assertTrue(WPSimpleNonce::checkNonce($nonce['name'],$nonce['value']));
		preg_match('/.*value="(.*)".*/',$field['value'],$matches);	
		$this->assertTrue(WPSimpleNonce::checkNonce($field['name'],$matches[1]));
		return;
	}


	function testUsedOnce()
	{
		$nonce = WPSimpleNonce::createNonce('test');
		$this->assertNotEmpty($nonce['name']);
		$this->assertTrue(WPSimpleNonce::checkNonce($nonce['name'],$nonce['value']));
		$this->assertFalse(WPSimpleNonce::checkNonce($nonce['name'],$nonce['value']));
		return;
	}


}