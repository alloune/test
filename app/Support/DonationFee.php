<?php

namespace App\Support;
use PHPUnit\Framework\Exception;


class DonationFee
{
    const FIXED_FEES = 0.5;

    private $donation;
    private $commissionPercentage;

    public function __construct(int $donation, int $commissionPercentage)
    {
        if(($donation%100 == 0) && $donation/100>=1){
            $this->donation = $donation;
        }
        else{
            $error = new Exception('Le montant doit être un entier supérieur à 100');
            throw $error;
        }
        $this->commissionPercentage = $commissionPercentage;
    }

    public function getFixedAndCommissionFeeAmount(){

        return $this->donation * ($this->commissionPercentage/100) + DonationFee::FIXED_FEES;

    }

    public function getCommissionAmount()
    {
        if($this->commissionPercentage >= 0 && $this->commissionPercentage <=30){
                return $this->getFixedAndCommissionFeeAmount() < 5 ? : 5 ;
            }
        else{
            $error = new Exception( "Le montant de la comission est incorrect");
            throw $error;
        }
    }

    public function getAmountCollected(){

        return $this->donation - $this->getCommissionAmount();

    }

    public function getSummary(){
        return [
          'donation' => $this->donation,
          'fixedFee' => DonationFee::FIXED_FEES,
          'commission' => $this->getCommissionAmount() + DonationFee::FIXED_FEES,
          'fixedAndCommission' => $this->getCommissionAmount(),
          'amountCollected' => $this->getAmountCollected(),
        ];
    }

}