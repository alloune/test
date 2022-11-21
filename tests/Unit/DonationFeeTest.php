<?php

namespace Tests\Unit;

use App\Support\DonationFee;
use PHPUnit\Framework\TestCase;

class DonationFeeTest extends TestCase
{

    public function test_commission_amount_is_10_cent_form_donation_of_100_cents_and_commission_of_10_percent()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new \App\Support\DonationFee(100, 10);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 10
        $expected = 10 + DonationFee::FIXED_FEES;
        $this->assertEquals($expected, $actual);
    }
    public function test_donation_amount_is_not_integer()
    {
        $this->expectException(\Exception::class);

        $donationFees = new \App\Support\DonationFee(10, 10);
    }
    public function test_percent_amount_is_between_0_and_30()
    {

        // Etant donné une donation de 1000 et commission de 25%
        $donationFees = new \App\Support\DonationFee(1000, 25);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 250,5
        $expected = 250 + DonationFee::FIXED_FEES;
        $this->assertEquals($expected, $actual);
    }
    public function test_percent_amount_is_between_higher_than_30()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Le montant de la commission est incorrect');

        $donationFees = new \App\Support\DonationFee(1000, 35);
        $donationFees->getCommissionAmount();
    }

    public function test_commission_amount_is_20_cents_form_donation_of_200_cents_and_commission_of_10_percent()
    {
        // Etant donné une donation de 200 et commission de 10%
        $donationFees = new \App\Support\DonationFee(200, 10);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 20
        $expected = 20 + DonationFee::FIXED_FEES;
        $this->assertEquals($expected, $actual);
    }
}
