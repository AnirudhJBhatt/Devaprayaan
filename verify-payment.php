<?php
    include 'includes/db.php';
    require('razorpay-php/Razorpay.php');
    use Razorpay\Api\Api;

    $api_key="YOUR_RAZORPAY_KEY";
    $api_secret="YOUR_RAZORPAY_SECRET";

    if(isset($_POST['razorpay_payment_id'],$_POST['razorpay_order_id'],$_POST['razorpay_signature'])){
        $payment_id=$_POST['razorpay_payment_id'];
        $order_id=$_POST['razorpay_order_id'];
        $signature=$_POST['razorpay_signature'];

        $api=new Api($api_key,$api_secret);
        $attributes=[
            'razorpay_order_id'=>$order_id,
            'razorpay_payment_id'=>$payment_id,
            'razorpay_signature'=>$signature
        ];

        try{
            $api->utility->verifyPaymentSignature($attributes);
            echo "<h2 class='text-success text-center mt-5'>Payment Successful 🎉</h2>";
            echo "<p class='text-center'>Booking Confirmed. Payment ID: $payment_id</p>";
            echo "<div class='text-center'><a href='index.php' class='btn btn-primary'>Back to Home</a></div>";
        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e){
            echo "<h2 class='text-danger text-center mt-5'>Payment Verification Failed!</h2>";
            echo "<p class='text-center'>".$e->getMessage()."</p>";
            echo "<div class='text-center'><a href='package-details.php?id=".$_POST['package_id']."' class='btn btn-warning'>Try Again</a></div>";
        }
    } else { echo "Invalid Request!"; }
?>
