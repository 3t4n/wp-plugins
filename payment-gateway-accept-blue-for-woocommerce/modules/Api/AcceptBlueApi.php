<?php

namespace Devurai\AcceptbluePaymentPro\Api;

class AcceptBlueApi extends Client
{
    /**
     * @param $data
     * @return \Exception|\GuzzleHttp\Exception\GuzzleException|array
     */
    public function authorize_transaction($data)
    {
        return $this->request(self::METHOD_POST, $this->get_aceptblue_endpoint('transactions/charge'), array(
            'headers' => $this->get_request_headers(),
            'body' => json_encode($data)
        ));
    }

    /**
     * @param $data
     * @return \Exception|\GuzzleHttp\Exception\GuzzleException|array
     */
    public function charge_transaction($data)
    {
        return $this->request(self::METHOD_POST, $this->get_aceptblue_endpoint('transactions/capture'), array(
            'headers' => $this->get_request_headers(),
            'body' => json_encode($data)
        ));
    }

    public function get_transaction($id)
    {
        return $this->request(self::METHOD_GET, $this->get_aceptblue_endpoint("transactions/$id"), array(
            'headers' => $this->get_request_headers(),
        ));
    }

    public function refund_transaction($data){
        return $this->request(self::METHOD_POST, $this->get_aceptblue_endpoint('transactions/refund'), array(
           'headers' => $this->get_request_headers(),
           'body' => json_encode($data)
        ));
    }

    public function void_transactions($data){
        return $this->request(self::METHOD_POST, $this->get_aceptblue_endpoint('transactions/void'), array(
            'headers' => $this->get_request_headers(),
            'body' => json_encode($data)
        ));
    }

    public function verify_payment($data)
    {
        return $this->request(self::METHOD_POST, $this->get_aceptblue_endpoint('transactions/verify'), array(
            'headers' => $this->get_request_headers(),
            'body' => json_encode($data)
        ));
    }

    public function get_surcharge()
    {
        return $this->request(self::METHOD_GET, $this->get_aceptblue_endpoint('surcharge'), array(
            'headers' => $this->get_request_headers()
        ));
    }

    private function get_request_headers(): array
    {
        return array(
            'User-Agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Accept blue wordpress plugin',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => $this->get_authorization_key()
        );
    }

    private function get_authorization_key(): string
    {
        $source_code = $this->get_source_key();
        $pin_code = $this->get_pin_code();
        return 'Basic ' . base64_encode("$source_code:$pin_code");
    }

    private function get_pin_code(): string
    {
        return $this->settings->is_test_mode() ?
            $this->settings->get_test_pin_code() :
            $this->settings->get_live_pin_code();
    }

    private function get_source_key (): string
    {
        return $this->settings->is_test_mode() ?
            $this->settings->get_test_source_key() :
            $this->settings->get_live_source_key();
    }
}