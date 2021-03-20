<?php require("configure.php");
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
$sql= "SELECT * from history";
$result=$conn->query($sql);
$his = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMPK BANK</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="Bank img.jpg" width="200px" height="200px" alt="Bank">
        </div>
        
        <div class="title">
            <h1 >RMPK BANK</h1>
        </div>
    </div>
    <div class="navi">
        <nav>
            <a id="a1" href="index.html">Home</a>
            <a href="customers.php">Users</a>
            <a href="transaction.php">Transaction History</a>
        </nav>
    </div>
    <div class="head">
        <h1> Transaction History</h1>
    </div>
    
        <table id="customer">
            <tr>
                <th>S.NO</th>
                <th>Name</th>
                <th>Amount Before Transaction</th>
                <th>Amount</th>
                <th>Amount After Transaction</th>

            </tr>

        <?php
        $s=1;
        foreach($his as $hi):?>
        <tr> <td><?php echo $s;?></td>
        <td> <?php echo $hi['user_name'];
            
        ?></td>

        <td><?php echo $hi['b_transaction'];?></td>
        <td><?php echo $hi['amount'];?></td>
        <td><?php echo $hi['a_transaction'];?></td>


        <?php $s+=1; ?>
    
    </tr>
        <?php endforeach; ?>

</table>
<div class="footer">
        <P>&#169;2021-Made By Rithika</P>
        <p>GRIP THESPARKSFOUNDATION</p>
    </div>
        </body>
</html>