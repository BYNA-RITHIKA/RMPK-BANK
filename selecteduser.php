<?php require("configure.php");
$id = mysqli_real_escape_string($conn,$_GET['id']);
$user = "SELECT * FROM customers WHERE id=".$id;
$results = mysqli_query($conn, $user);
$profile = mysqli_fetch_assoc($results);
if(isset($_POST["submit"])){
  $id = $profile['ID'];
  $uname=$profile['Name'];
  $bal= $profile['Balance'];
  $amount=$_POST["amount"];
  $Balance = $amount + $bal;
  $query="INSERT INTO history (user_name, b_transaction,amount,a_transaction) VALUES ('$uname','$bal','$amount','$Balance')";
  $sql = "UPDATE  customers SET 
                  Balance = '$Balance'
                  WHERE id={$id}";
  if (mysqli_query($conn, $sql ) and mysqli_query($conn,$query)) {
		header("Location: customers.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
 
  
	 
   
}



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
    
    <div class="container">  
  <form id="contact" action="<?php $_SERVER['PHP_SELF']?>" method="post">
    
    <fieldset>
      <h2>Name : <?php echo $profile["Name"];?></h2>
    </fieldset>
    <fieldset>
    <h2>Email : <?php echo $profile["Email"];?></h2>
    </fieldset>
    <fieldset>
    <h2>Balance : <?php echo $profile["Balance"];?></h2>
    </fieldset>
    <fieldset>
    <h2>Transfer Amount : <input name="amount" placeholder="Amount" type="number" tabindex="2" required> </h2>
      
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Transfer</button>
    </fieldset>
    
  </form>
</div>
<style >
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background:#DEB887;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background:#f9f9f9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #fff;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4caf50;
  color: #fff;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43a047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}


#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
.title{
  padding-top:80px;
}
.footer p{
    font-size:15px;
}

</style>
<div class="footer">
        <P>&#169;2021-Made By Rithika</P>
        <p>GRIP THESPARKSFOUNDATION</p>
    </div>
    
</body>
</html>