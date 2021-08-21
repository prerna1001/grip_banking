<?php
ini_set('max_execution_time',180);
$user = 'Prerna';
$password = 'Prerna@1001'; 
$database = 'banking'; 
$servername='localhost';

$mysqli = new mysqli($servername, $user, $password, $database);
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
if(!isset($_SESSION)) {
        session_start();

    }
   

    $cid = mysqli_real_escape_string($mysqli, $_POST["ano"]);

    $sql =  "SELECT * FROM members WHERE id='".$cid."'";
    $result = $mysqli->query($sql);
$mysqli->close(); 
?>
<style>

        h1 {
            text-align:center;
        }
         body {
            background-image:url(bank1.png);
        }
      table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
       
        th, td {
            padding:15px;
            font-size:20px;
        }
        table {
            text-align: center;
            margin-left: auto;
            margin-right:auto;
            width:100%;
        }
        th:hover {
            color:#b200ff;

        }
        td:hover {
            color:cadetblue;
        }
        a{
            text-decoration:none;
            color:blue;
            
        }
        a:hover{
            color:black;
            background-color:#b200ff;
        }
        .an{
            text-decoration:none;
            color:blue;
            font-size:20px;
        }
        .an:hover{
            color:black;
            background-color:#b200ff;
        }
</style>
<!-- skjdifirfolerioo-->
<body>
<div class="topnav" >
    <a href="trans.php" class="an"><p>&larr; back</p></a>
 <h1 style="color:black;"> EASY TRANSFER  </h1> 
</div>
<p>&nbsp;</p>
<p></p>
<p>&nbsp;</p>

<form action="transfer.php?ano=<?php  echo $_GET['ano']; ?>" method="post">
<table width="718" class="table tabe-hover table-bordered" id="list">
      <?php  
                while($rows=$result->fetch_assoc())
				
                {
				$ano=$rows['id'];
             ?>
         <tr>
         <th width="298" height="24" class="text-center">Name</th>
		 <td width="408"><?php echo $rows['name'];?></td>
          </tr>
		  
		 <tr>
         <th width="298" class="text-center">Email</th>
		 <td><?php echo $rows['email'];?></td>
		 </tr>
		 
		 <tr>
         <th width="298" class="text-center">Account Number</th>
		 <td><?php echo $rows['id'];?></td>
		 </tr>
		 
         
  
    
		 <tr>
         <th width="298" class="text-center">Current Balance</th>
		 <td><?php echo $rows['balance'];?></td>
		 </tr>

		 <tr class="table-dark text-dark">
           
        
    
   

		
            <?php
                }
             ?>
     
   
</table>


 
                    <div class="flex-item">
                      <h1>  <a class="button1 button"href="lastpage.php?ano=<?php echo $ano ?>"> Transfer Money</a> </h1>
                    </div>

          </form>

</body>