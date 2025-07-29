<?php
class BankAccount{
    private $balance ;
    private $amount  ;
    function __construct($balance){
        $this->balance = $balance;
    }
    function getBalance(){
        echo "the original balance is :" . $this->balance ;
    }
    function deposit($amount) {
        $this->amount = $amount;
        $this->balance = $this->balance + $amount ;
        echo " the new balance is " . $this->balance ;
    }
    function withdraw($amount) {
        $this->amount = $amount;    
        $this->balance = $this->balance - $amount ;
        echo " the new balance is " . $this->balance ;
    }
} 
$account=new BankAccount(1300);
$account->getBalance();
$account->deposit(200);
$account->withdraw(100);

?>