<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\Entity\Account;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\Log;

/**
 */
class SignatureTest extends TestCase
{
    /**
     * Rebuild
     */
    public function testTimeSignature()
    {
        try {
            $key            = "IFARTTERXTIABUWXSIISACK2LC3Q2D7RCC64WOWZV5UXWUCEHLMICU5N2GAM6WQEKDO52REGFGRQV7NS4XT7DQDIBOTVBUPKLEGYTGSN5Y7Q";
            $accountAddress = 'ABJ23UMAZ5NAIUG53VCIMKNDBL63FZPH6HAGQC5HKDI6UWINRGNE2RMD';
            $timestamp      = 1596023516495;


            $acc = Account::fromPrivateKeyBase32($key);
            self::assertEquals($accountAddress, $acc->getAddress()->encodeBase32());

            $encodedSignature = $acc->getSignedTimestamp($timestamp);
            self::assertEquals("07tkMGt/NlvY0ktnRC7mU9JAFpe8kEjSyx5ljz5DVgyYvWSckY8Zu8b8roArYVD4/GPXEifrZxb333e3EHJqAw==", $encodedSignature);

            $address = Address::fromBase32($accountAddress);
            $valid   = $address->verifyTimestamp($timestamp, $encodedSignature);
            self::assertTrue($valid);
            //test invalid signature
            $invalid = $address->verifyTimestamp($timestamp, "07tkMGt/NlvY0ktnRC7mU9JAFpe8kEjSyx5ljz5DVgyYvWSckY8Zu8b8roArYVD4/GPXEifrZxb333e3werqAw==");
            self::assertFalse($invalid);


        } catch (AttraceException $e) {
            Log::println("");
            Log::println($e->getMessage());
            self::assertTrue(false);
        }
    }

    public function testTimeSignature2()
    {
        try {
            $key            = "IFAEVNAH5XPY5ULBIO2UMSN5FCGTM5NAYJWDZVAJO6SAVI72XOUQZUHGN7BQP3BBW7I5M4UNTJFLEXGIJJS6QBEY3VKRE2Z5CPHBC7M4GRCQ";
            $accountAddress = 'ADIOM36DA7WCDN6R2ZZI3GSKWJOMQSTF5ACJRXKVCJVT2E6OCF6ZYRX6';
            $acc = Account::fromPrivateKeyBase32($key);
            self::assertEquals($accountAddress, $acc->getAddress()->encodeBase32());
            $timestamp = 1605629846260;
            $encodedSignature = $acc->getSignedTimestamp($timestamp);
            self::assertEquals('mvhAYtugpLgknFXoMCgNlhJ2a1DoVI448kHjXsYi18gnn0tCAH1Rwtmf40ziQD88voG8HoI9WsjXOBvWkf4wAw==', $encodedSignature);
            $address = Address::fromBase32($accountAddress);
            self::assertTrue($address->verifyTimestamp($timestamp, $encodedSignature));
        } catch (AttraceException $e) {
            Log::println("");
            Log::println($e->getMessage());
            self::assertTrue(false);
        }
    }
    
}
