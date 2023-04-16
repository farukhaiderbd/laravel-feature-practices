<?php
namespace App\Services\Billing;


use Ramsey\Uuid\Type\Integer;

class BankPaymentGateway implements PaymentGateway
{

    public function __construct(protected $currency="USD",protected $discount =0)
    {
        $this->currency = $currency;
        $this->discount = $discount;
    }

    public function setDiscount($amount)
    {
        return $this->discount = $amount;
    }

    public function charge($amount):array
    {
         return [
             'amount' =>($amount-$this->discount),
             'currency' =>$this->currency,
             'discount' =>$this->discount,
             'fees' =>"111"
         ];
    }

}
