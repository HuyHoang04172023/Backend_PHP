<?php

interface PaymentInterface {
    public function pay($amount);
}

class CreditCard implements PaymentInterface {
    public static $transactionFee = 2.5;

    public function pay($amount) {
        $total = $amount + ($amount * self::$transactionFee / 100);
        echo "Paid $" . $total . " using Credit Card (including transaction fee).<br>";
    }

    public static function getTransactionFee() {
        return self::$transactionFee;
    }
}

class PayPal implements PaymentInterface {
    public static $transactionFee = 3.0;

    public function pay($amount) {
        $total = $amount + ($amount * self::$transactionFee / 100);
        echo "Paid $" . $total . " using PayPal (including transaction fee).<br>";
    }

    public static function getTransactionFee() {
        return self::$transactionFee;
    }
}

class BankTransfer implements PaymentInterface {
    public static $transactionFee = 1.0; // Phí giao dịch cố định là 1%

    public function pay($amount) {
        $total = $amount + ($amount * self::$transactionFee / 100);
        echo "Paid $" . $total . " using Bank Transfer (including transaction fee).<br>";
    }

    public static function getTransactionFee() {
        return self::$transactionFee;
    }
}

function processPayment(PaymentInterface $paymentMethod, $amount) {
    $paymentMethod->pay($amount);
}

echo "Credit Card transaction fee: " . CreditCard::getTransactionFee() . "%<br>"; 
echo "PayPal transaction fee: " . PayPal::getTransactionFee() . "%<br>";          
echo "Bank Transfer transaction fee: " . BankTransfer::getTransactionFee() . "%<br>";  

$creditCardPayment = new CreditCard();
$paypalPayment = new PayPal();
$bankTransferPayment = new BankTransfer();

// Mô phỏng quá trình thanh toán
processPayment($creditCardPayment, 100);      
processPayment($paypalPayment, 200);          
processPayment($bankTransferPayment, 300); 

?>
