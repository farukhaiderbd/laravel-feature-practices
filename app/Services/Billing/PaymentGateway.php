<?php

namespace App\Services\Billing;

use Faker\Core\Number;

interface PaymentGateway {

     public function setDiscount($amount);

     public function charge($amount): array;
}
