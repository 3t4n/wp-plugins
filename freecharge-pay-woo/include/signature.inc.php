<?php

class FcpgzSignatureGenerator {
    private $secretKey;
    public function __construct($secretKey) {
        $this->secretKey = $secretKey;
    }
    public function generateSignature($data) {
        ksort($data);

        $dataToHash = implode('', $data);
        $dataToHash .= $this->secretKey;
        return hash("SHA256", $dataToHash);
    }
}

