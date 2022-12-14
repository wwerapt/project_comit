<?php 
include('payment_confirmpage.php'); ?>

<!DOCTYPE html>

<html lang="en">
<head>

    <title>Payment Confirm Page</title>
    <div class="header"> <h2>Payment Confirm Page</h2></div>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <form action="payment_confirm.php" method="post">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label for="payment_bill">Payment Bill</label>
            <input type="file" name="payment_bill" >
        </div>
        <div class="input-group">
            <label for="payment_amount">Payment Amount</label>
            <input type="int" name="payment_amount">
        </div>
        <div class="input-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" name="payment_date">
        </div>
        <div class="input-group">
            <label for="payment_time">Payment Time</label>
            <input type="time" name="payment_time">
        </div>
        <div class="input-group">
            <label for="payment_bank">Bank Account</label>
            <select class="select" name="payment_bank">
                <option selected>Choose...</option>
                <option value="SCB">ไทยพาณิย์(SCB)</option>
                <option value="Kbank">กสิกรไทย(Kbank)</option>
                <option value="KTB">กรุงไทย(KTB)</option>
                <option value="BBL">กรุงเทพ(BBL)</option>
                <option value="BAY">กรุงศรี(BAY)</option>
                <option value="ttb">ทีเอ็มบีธนชาต(ttb)</option>
                <option value="Goverment Savings Bank">ออมสิน(Goverment Savings Bank)</option>
                <option value="BAAC">ธ.ก.ส.(BAAC)</option>
                <option value="Kiatnakin">เกียรตินาคิน(Kiatnakin)</option>
                <option value="Standard Chartered">แสตนดาร์ดชาร์เตอร์ด(Standard Chartered)</option>
                <option value="UOB">ยูโอบี(UOB)</option>
                <option value="TISCO">ทิสโก้(TISCO)</option>
                <option value="CIMB">ซีไอเอ็มบี(CIMB)</option>
                <option value="ICBC">ไอซีบีซี(ICBC)</option>
            </select>
        </div>
        <div class="input-group">
            <label for="payment_digit">Last 4 Digits of Bank Account</label>
            <input type="int" name="payment_digit">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="payment_confirm">Confirm</button>
        </div>

    </form>    
</body>
</html>