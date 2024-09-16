<?php

interface PaymentInterface{
	public function pay();
}

class CreditCard implements PaymentInterface{
	public function pay(){

	}
}

class PayPal implements PaymentInterface{
	public function pay(){

	}
}	

class BankTransfer implements PaymentInterface{
	public function pay(){

	}
}
?>