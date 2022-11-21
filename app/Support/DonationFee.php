<?php

namespace App\Support;
use PHPUnit\Framework\Exception;


class DonationFee
{

    private $donation;
    private $commissionPercentage;

    public function __construct(int $donation, int $commissionPercentage)
    {
        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;
    }

    public function getCommissionAmount()
    {
        if($this->commissionPercentage >= 0 && $this->commissionPercentage <=30){
                return $this->donation * ($this->commissionPercentage/100);
            }
        else{
            $error = new Exception( "Le montant de la comission est incorrect");
            throw $error;
        }
    }

    public function getAmountCollected(){

        return $this->donation - $this->getCommissionAmount();

    }

}