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
        <h1> Users</h1>
    </div>
    
        <table id="customer">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Balance</th>
                <th id="view"> Details</th>

            </tr>
            <?php
            $conn=mysqli_connect("localhost","root","","bank");
            if($conn->connect_error){
                die("Connection failed:".$conn->connect_error);
            }
            $sql= "SELECT ID,Name,Email,Balance,Details from customers";
            $result=$conn->query($sql);
            if($result->num_rows >0){
                while($row=$result->fetch_assoc()){
                    echo "<tr><td>".$row["ID"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Balance"]."</td> 
                    </td>";
                    echo "<td><a  href='selecteduser.php?id=".$row["ID"]."'> View</a></td>
                    </tr>";

                }
               
            }
            
            $conn->close();
            ?>
            
            
            </table>
            <div class="footer">
        <P>&#169;2021-Made By Rithika</P>
        <p>GRIP THESPARKSFOUNDATION</p>
    </div>
    

<style>
    table a{
        text-decoration:none;
        padding:10px;
        border-radius:5px;
        background-color: #c0c0c0;
        color:black;
        border:solid 2px #a9a9a9;

    }
    table a:hover{
        
        border:none;
    }
</style>
</body>
</html>