<?php

namespace App\Service;

use BankingApp\AppApi\Bank\Bank;

class BankService
{
    private array $bankRegistry = [];
    public function addBank(Bank $bank): void {
        $this->bankRegistry[$bank->getName()] = $bank;
    }

    public function getBank(string $bankName): Bank
    {
        return $this->bankRegistry[$bankName];
    }
}