<?php

namespace Devurai\AcceptbluePaymentPro\DTOs;

interface ABAddressInfo
{
    public function getFirstName(): string;
    public function getLastName(): string;
    public function getStreet(): string;
    public function getStreet2(): string;
    public function getCity(): string;
    public function getState(): string;
    public function getZip(): string;
    public function getCountry(): string;
    public function getPhone(): string;
}