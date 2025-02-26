<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\Client;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\Log;

class JavascriptTest extends TestCase
{

    public function testGenerateJS()
    {
        /** @var Client $client */
        try {
            $client = new Client($this->validConfig);
            $tagManager = $client->getTagManager();
            $tagManager->setApi('https://advertiser.cons.attrace.com/');
            $js = $tagManager->getJs();
            self::assertStringContainsString("Attrace.init('https://advertiser.cons.attrace.com/');", $js);
            self::assertStringContainsString('"GeneratorFunction"', $js);
        } catch (AttraceException $e) {
            Log::println($e->toString());
            self::assertTrue(false);
        }

    }

}
