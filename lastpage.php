<?php

$user = 'Prerna';
$password = 'Prerna@1001'; 
$database = 'banking'; 
$servername='localhost';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}

if(!isset($_SESSION)) {
        session_start();
    }
	
	$msg="";
	if(isset($_POST['submit']))
	{
		$sqli="INSERT into transfer_details (transfer_from,transfer_to,amount) values(".$_POST['transfer_from'].",".$_POST['transfer_to'].",".$_POST['amount'].")";
		if($mysqli->query($sqli))
		{	
             $msg="transfered successfully";
		}
		else
		{
			$msg="Transfer failed";
		}
		
		$sqli="UPDATE members SET balance=balance-".$_POST['amount']." WHERE id=".$_POST['transfer_from'];
		$mysqli->query($sqli);
		
		$sqli="UPDATE members SET balance=balance+".$_POST['amount']." WHERE id=".$_POST['transfer_to'];
		$mysqli->query($sqli);
		
		
	} 
    $cid = mysqli_real_escape_string($mysqli, $_GET["ano"]);

    $sql =  "SELECT * FROM members WHERE id='".$cid."'";
    $result = $mysqli->query($sql);
	
	$cust_sql = "SELECT * FROM members ORDER BY id ASC ";
$cust_result = $mysqli->query($cust_sql);
	//print_r($cust_result); die;
//$sql= "SELECT * FROM customer_details WHERE account_no='2'";
//$result = $mysqli->query($sql);
$mysqli->close(); 
?>
<style>
body  {
  background-image: url("bank1.png");
  background-color: #cccccc;
  background-size: 1400px 700px;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}table {    border-collapse: collapse;
			margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            background:none;
            text-align: center;
            color: white;
           
            
        }
        td {
             border: 1px solid black;
        }
        th, td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  		td {
            font-weight: lighter;
        }
		.button {
	            text-align:center;
                border: 1px solid #b200ff;
                background:black;
                width:150px;
                height:60px;
                border-radius:30px;
                font-size:20px;
                color:white;
		 } 
         th:hover {
            color:#b200ff;

        }
        td:hover {
            color:cadetblue;
        }
        
         .button:hover{
         background-color: #b200ff;
         }
}
</style>

			
<div class="topnav" >
 <h1> EASY TRANSFER  </h1> 
</div>
<p>&nbsp;</p>
<p></p>
<p>&nbsp;</p>
<?php  echo $msg; ?>
 <form action="lastpage.php?ano=<?php  echo $_GET['ano']; ?> " method="post">
<table width="718" class="table tabe-hover table-bordered" id="list">
      <?php  
                while($rows=$result->fetch_assoc())
                {
             ?>
         <tr>
         <th width="298" height="24" class="text-center">Name</th>
		 <td width="408"><?php echo $rows['name'];?></td>
          </tr>
		  
		 <tr>
         <th width="298" class="text-center">Account Number</th>
		 <td><?php echo $rows['id'];?></td>
		 </tr>
		 
		 <tr>
         <th width="298" class="text-center">Current Balance</th>
		 <td><?php echo $rows['balance'];?></td>
		 </tr>
		 
         <tr>     
         <th width="298" class="text-center">Transfer To</th>	
         <td>
	
		<select name="transfer_to" width="298px">
		<?php  
                while($cust_rows=$cust_result->fetch_assoc())
                {
				if($rows['id']!= $cust_rows['id'])
				{
				
				
             ?>
    <option value="<?php echo $cust_rows['id']?>"><?php echo $cust_rows['name']?> </option>
  <?php } }?>
		</select>
		 </td>
         </tr>
		 
		 <tr>     
         <th width="298" class="text-center">Amount</th>	
         <td> <input type="number" name="amount" /> </td>
         </tr>
		 <input type="hidden" name="transfer_from" value="<?php echo $rows['id'] ?>" />
            <?php
                }
             ?>
     
   
</table>

<h1> <button type="submit" class="button" name="submit">Transfer </button> 
    
	 
	</h1>
 </form>
 <h1>
    <button class="button" onclick="window.location.href = 'trans.php';"> Main Menu </button>
   
 </h1>
