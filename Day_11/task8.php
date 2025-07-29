<?php 
trait Timestampable {
    public function currentTimestamp() {
        echo "Current Date and Time: " . date("Y-m-d H:i:s") . "<br>";

    }

}
class Order {
    use Timestampable ;
}
class Invoice {
    use Timestampable;
}
$order = new Order();
$order->currentTimestamp();
$invoice = new Invoice();
$invoice->currentTimestamp();

?>