<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Transfer Money</title>
    <style>
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
            font-size:20px;
            
        }
        a:hover{
            color:black;
            background-color:#b200ff;
        }
    </style>
</head>
<body>
    <a href="Main.php"><p>&larr; back</p></a>
    <center>
        <div class="container my-4">
            <div class="col-lg-12">
            <h1>All the Users</h1>
            <form action="transfer.php" method="post">
                    <div class="flex-item-login">
                        <h2></h2>
                    </div>
                    <div class="flex-item">
                        <input type="integer" name="ano" placeholder="Enter Account Id"  required>
            </div>
            <br>
                    <div class="flex-item">
                      <button class="button" type="submit">View Details</button>
            </div><br>
           </form>

            <table class="table">
        <tr class="table-dark text-dark">
           
            <th width="10% ">Id</th>
            <th width="10%">Name</th>
            <th width="10%">Email</th>
            <th width="10%">Balance</th>
           
              
        </tr>
 
    <?php
                   
 
    // Conection of my Database......

     $conn = mysqli_connect('localhost','Prerna','Prerna@1001','banking');  //this is procedural  for connection to MYSQL server & Parmeters are: host, username,password,database name

   if($conn->connect_error){
      echo "Coonection not established, Error:" ;  //if connection failed then tis message will echo
   }

   $sql=" SELECT * FROM members " ;
   $data= mysqli_query($conn, $sql);
   $num= mysqli_num_rows($data);

   if($num>0){
     while ($product = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td> <?php  echo $product['id'] ?> </td>
                <td><?php  echo $product['name'] ?></td>
                <td><?php  echo $product['email'] ?></td>
                <td><?php  echo $product['balance'] ?></td>
               <!-- <td > <a class="text-primary" href="transfer.php?id=<?php echo $product['id'];?>&name=<?php echo $product['name'];?>&email=<?php echo $product['email'];?>&balance=<?php echo $product['balance'];?>">TRANSFER</a></td>       
            -->
                </tr>
       <?php   
        
     }
 echo "</table>";
     }
    else{
        echo "No record Found";
    }
   
    ?>


               
</body>
</html>