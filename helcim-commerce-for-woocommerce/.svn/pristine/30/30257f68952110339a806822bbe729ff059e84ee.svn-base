<?php


class HelcimDirectValidator
{
    public string $error = '';

    public function isValidCheckoutBlocksFields(array $post): bool
    {
        return $this->isValidCardNumber($post, 'cardnumber');
    }


    public function isValidFields(array $post): bool
    {
        return $this->isValidCardNumber($post, 'cardNumber');
    }

    private function isValidCardNumber(array $post, string $indexLabel): bool
    {
        if (!isset($post[$indexLabel]) || empty(trim($post[$indexLabel]))) {
            $this->error = 'Missing Card Number';
            return false;
        }
        return true;
    }
}