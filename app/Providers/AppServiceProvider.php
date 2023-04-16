<?php

namespace App\Providers;

use App\Services\Billing\BankPaymentGateway;
use App\Services\Billing\CardPaymentGateway;
use App\Services\Billing\PaymentGateway;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentGateway::class,function($app){
            if(request()->has('gateway') && request()->input('gateway') == 'Bank'){
                return new BankPaymentGateway('BDT');
            }
                return new CardPaymentGateway('USD');

        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
