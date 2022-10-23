<?php

interface PayInterface {
    public function pay ($totalPrice, $phone);
}

class QiwiPay implements PayInterface {

    public function pay($totalPrice, $phone)
    {
        echo "Оплачено через Qiwi\n";
        echo "Общая сумма заказа - $totalPrice\nОплачено с номера $phone";
    }
}

class YandexPay implements PayInterface {

    public function pay($totalPrice, $phone)
    {
        echo "Оплачено через Yandex\n";
        echo "Общая сумма заказа - $totalPrice\nОплачено с номера $phone";
    }
}

class WebMoneyPay implements PayInterface {

    public function pay($totalPrice, $phone)
    {
        echo "Оплачено через WebMoney\n";
        echo "Общая сумма заказа - $totalPrice\nОплачено с номера $phone";
    }
}

class Sale {
    public function __construct(
        private PayInterface $payment,
    ){
    }
    public function run($totalPrice, $phone)
    {
        $this->payment->pay($totalPrice, $phone);
    }
}

$sale = new Sale(new YandexPay());
$sale->run(100, 7777777);