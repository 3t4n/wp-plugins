<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\Protocol\Core\Block;

class TransactionTest extends TestCase
{
	
	// Run this test in an environment without bcmath:
	// docker run --rm -it -v $(pwd):/app php:7.1.17-apache-stretch bash
	// cd /app
	// ./composer.phar update
	// ./vendor/phpunit/phpunit/phpunit tests/TransactionTest.php
	//
	public function testBcmathSuccess()
	{
		// self::assertFalse(function_exists("bccomp"));
		// self::assertFalse(function_exists("bcadd"));
		// self::assertFalse(bccomp(123123, "2147483647") > 0); // Verify that function exixsts
		
		// Some good seed data
		$blockb64 = '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';
		$blockraw = base64_decode($blockb64);
		
		$block1 = new Block();
		$block1->mergeFromString($blockraw);
		$blockjson1 = $block1->serializeToJsonString();
		self::assertTrue(strlen($blockjson1) > 100);
		// Log::Println($blockjson1);
		
		// Decode the JSON to a block
		$block2 = new Block();
		$block2->mergeFromJsonString($blockjson1); // << this one internally uses bcmath
		$binary2 = $block2->serializeToString();
		self::assertTrue($binary2 == $blockraw); // Blocks are not equal
		
		$blockjson2 = $block2->serializeToJsonString();
		// Log::Println($blockjson2);
		self::assertTrue($blockjson1 == $blockjson2);
	}
	
	public function testIntegrationModelFromJson()
	{
		$config = new IntegrationConfigModel();
		$json = '{"Role":"publisher","Agreement":"AQ4DUINMSUJQDXQGUR6NUDHR6FOPBXTVTOLA62KB633AVRZGBWZG2NZA","OperationalKey":"IFSHV74U7S6L35Y4IPS54FPTNKW35EANULBRRPDHSIO5O7T3BFVLPTATSWNMONK5FM5WSEMJXUX2VR66YY4AG4EEBIXZ7BGRENVNQFLCRAJA","DelegateOf":"ABSOAUUFUN7ZNQLAQJE3XTUZXP5XCJ3XLBKDVBH254RADRRM3T7ZJHK3","RootActionConfigs":[{"RootType":"click","RedirectUrls":[{"Url":"https:\/\/3testingurl.com\/testpage","AliasId":"8rsrn"}]}],"DefaultActionRootType":"click","ExpireDays":3,"UrlActions":[{"Url":"\/sale","Action":"sale"}],"Name":"https:\/\/3testingurl.com-publisher-15-10-2020-13:24:37","Metadata":[{"Key":"PublisherType","Value":{"Str":"Related website"}},{"Key":"IntegrationType","Value":{"Str":"textlink"}}],"Network":"betanet"}';
		try {
			$config->setData($json);
		} catch(\Exception $e) {
			die('Exception: ' . $e->getMessage());
		}
		self::assertEquals('AQ4DUINMSUJQDXQGUR6NUDHR6FOPBXTVTOLA62KB633AVRZGBWZG2NZA-ABSOAUUFUN7ZNQLAQJE3XTUZXP5XCJ3XLBKDVBH254RADRRM3T7ZJHK3', $config->getUniqueKey());
	}
	
}
