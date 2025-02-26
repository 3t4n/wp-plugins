<?php


class HelcimJSValidator
{
    public string $error = '';

    public function isValidCheckoutBlocksFields(array $post, string $jsSecretKey): bool
    {
        if (empty($post['xml'])) {
            $this->error = 'Missing xml';
            return false;
        }
        if (empty($post['hash'])) {
            $this->error = 'Missing hash';
            return false;
        }

        $xmlString = base64_decode($post['xml']);
        if (empty($xmlString)) {
            $this->error = "Failed to decode xml. {$post['xml']}";
            return false;
        }

        if (!$this->isValidXmlString($xmlString, $post['hash'], $jsSecretKey)) {
            return false;
        }
        return true;
    }

    private function isValidXmlString(string $xml, string $xmlHash, string $jsSecretKey): bool
    {
        if (!$this->isValidXmlHash($xml, $xmlHash, $jsSecretKey)) {
            return false;
        }
        $xmlObject = simplexml_load_string($xml);
        if (!$xmlObject instanceof SimpleXMLElement) {
            $this->error = "Error - Invalid XML";
            return false;
        }
        if (!isset($xmlObject->date, $xmlObject->time)) {
            $this->error = "Error - Missing Transaction Processing Time in XML";
            return false;
        }
        if (!isset($xmlObject->response) || (int)$xmlObject->response !== 1) {
            $genericError = 'Something went wrong please contact the Merchant';
            $this->error = isset($xmlObject->responseMessage)
                ? (string)$xmlObject->responseMessage : $genericError;
            if (empty($this->error)) {
                $this->error = $genericError;
            }
            return false;
        }
        if ($this->isTransactionExpired($xmlObject)) {
            return false;
        }
        return true;
    }

    private function isValidXmlHash(string $xml, string $xmlHash, string $jsSecretKey): bool
    {
        if ($xmlHash === '') {
            $this->error = 'XML Hash is Empty';
            return false;
        }
        if ($xml === '') {
            $this->error = 'XML is Empty';
            return false;
        }
        $xmlNoSpace = preg_replace('/\s+/', '', $xml);
        $generatedHash = hash('sha256', $jsSecretKey . $xmlNoSpace);
        if ($generatedHash === $xmlHash) {
            return true;
        }

        $xmlObject = simplexml_load_string($xml);
        if (!$xmlObject instanceof SimpleXMLElement) {
            $this->error = 'Failed to build xml object';
            return false;
        }
        $xmlString = $xmlObject->asXML();
        $xmlStringWithoutXMLHead = str_replace('<?xml version="1.0"?>', '', $xmlString);
        $xmlNoSpace = preg_replace('/\s+/', '', $xmlStringWithoutXMLHead);
        $generatedHash = hash('sha256', $jsSecretKey . $xmlNoSpace);
        if ($generatedHash !== $xmlHash) {
            $this->error = 'Invalid Hash';
            return false;
        }

        return true;
    }

    private function isTransactionExpired(SimpleXMLElement $xmlObject): bool
    {
        try {
            $transactionTimeObject = new DateTime(
                "$xmlObject->date $xmlObject->time",
                new DateTimeZone(WCHelcimGateway::HELCIM_SERVER_TIMEZONE)
            );
        } catch (Exception $e) {
            $this->error = "Error - Invalid Transaction Processing Time in XML";
            return true;
        }
        $transactionTime = $transactionTimeObject->getTimestamp();
        $now = time();
        if (($now - $transactionTime) < 0) {
            $this->error = "Error - Transaction Cannot Happen in the Future";
            return true;
        }
        if (($now - $transactionTime) > 120) {
            $this->error = "Error - Transaction #$xmlObject->transactionId Expired({$transactionTimeObject->format('c')})";
            return true;
        }
        return false;
    }

    public function isValidFields(array $post, string $jsSecretKey): bool
    {
        if (WCHelcimGateway::FORCE_HELCIM_JS_TO_RUN_VERIFY) {
            if (!isset($post['response']) || (int)$post['response'] !== 1) {
                $this->error = isset($post['responseMessage']) ? (string)$post['responseMessage'] : 'Helcim JS Not Set';
                return false;
            }
            if (!isset($post['cardToken'])) {
                $this->error = 'Missing Card Token in Post';
                return false;
            }
            if (!isset($post['cardNumber'])) {
                $this->error = 'Missing Card First-4 Last-4';
                return false;
            }
            if (!isset($post['approvalCode'])) {
                $this->error = 'Missing Approval Code';
                return false;
            }
            if (!isset($post['transactionId'])) {
                $this->error = 'Missing Transaction Id';
                return false;
            }
            return true;
        }
        if (!isset($post['xml'])) {
            $this->error = 'Missing XML';
            return false;
        }
        if (!isset($post['xmlHash'])) {
            $this->error = 'Missing XML Hash';
            return false;
        }
        if (!$this->isValidXmlString($post['xml'], $post['xmlHash'], $jsSecretKey)) {
            return false;
        }
        return true;
    }
}