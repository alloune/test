<?php

namespace App\Support;



class DonationFee
{
    const FIXED_FEES = 50;

    private $donation;
    private $commissionPercentage;

    public function __construct(int $donation, int $commissionPercentage)
    {
        if(($donation%100 == 0) && $donation/100>=1){
            $this->donation = $donation;
        }
        else{
            throw new \Exception('Le montant doit être un entier supérieur à 100');
        }
        $this->commissionPercentage = $commissionPercentage;
    }

    public function getFixedAndCommissionFeeAmount(){

        return $this->donation * ($this->commissionPercentage/100) + DonationFee::FIXED_FEES;

    }

    public function getCommissionAmount()
    {
        if($this->commissionPercentage >= 0 && $this->commissionPercentage <=30){
                return min($this->getFixedAndCommissionFeeAmount(), 500);
            }
        else{
            throw new \Exception( "Le montant de la commission est incorrect");

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