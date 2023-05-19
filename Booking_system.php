<?php
require("save_data.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$query = "SELECT COUNT(*) as count FROM Customers";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

echo '
<!DOCTYPE html>
<html>
<head>
  <title>Booking system</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: Arial, sans-serif;
    }
    
    .nav {
      background: linear-gradient(174deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
      padding: 10px;
      text-align: center;
    }
    
    .container {
      margin: 20px auto;
      max-width: 700px;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="tel"],
    input[type="text"],
    input[type="number"],
    input[type="email"] {
      width: 100%;
      height: 30px;
      margin-bottom: 10px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    input[type="submit"],
    input[type="button"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 10px;
    }
    
    input[type="button"]:hover,
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    
    .table-container {
      margin-top: 20px;
      
      margin:auto;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    tr:hover {
      background-color: #f5f5;
    }
    tr{
      cursor: pointer;
    }
    @media (max-width: 600px) {
      .container {
        padding: 10px;
      }
      
      input[type="text"],
      input[type="number"],
      input[type="email"] {
        width: 100%;
      }
    }

    .box{
      position:relative;
      top:30px;
      width:95%;
      height:200px;
      overflow-y:scroll;
     margin:auto;
    }

    .nav2{
     width:100%;
     
     height:30px;
      background: linear-gradient(174deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
      color:white;
      text-align:center;
    }
    .span{
     position:relative;
     top:5px;
    }
    
    </style>
</head>
<body>
  <div class="nav">
    <h2 style="color: white;">Enter / View details</h2>
  </div>
  
  <div class="container">
    <form id="customerForm"  method="post">
      <div>
        <label for="name">Full Name</label>
        <input type="text" id="name" name="customer_name" placeholder="Enter your name" required />
      </div>
      
      <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter your address" required />
      </div>
      
      <div>
        <label for="mobile">Mobile number</label>
        <input type="tel" id="number" name="mobile_number" placeholder="Enter your mobile number" pattern="[0-9]{10}" required />
    </div>
    <div>
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="example@gmail.com" required />
      </div>
      
      <div>
        <label for="contact_person">Contact Person Name</label>
        <input type="text" id="contact_person" name="contact_person" placeholder="Contact person name" required />
      </div>
      
      <div>
        <input type="button" onclick="searchCustomer()" id="autocl" value="Search" />
        <input type="submit" onclick="saveData()" value="Save" />
        <input type="button" id="focusButton" value="New">
      </div>
    </form>
    <script>

  document.getElementById("focusButton").addEventListener("click", () => {
    document.getElementById("name").focus();
  });
  document.getElementById("autocl").addEventListener("click", () => {
    document.getElementById("name").focus();
  });
 
  function saveData() {
            const form = document.getElementById("customerForm");
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "save_data.php", true);
            xhr.onreadstatechange = function () {
                if (xhr.readState === 4 && xhr.status === 200) {
                }
            };
            xhr.send(formData);
        }
        
        function searchCustomer() {
          var name = document.getElementById("name").value;
          var table = document.getElementById("customerTable");
          
          for (var i = 0; i < table.rows.length; i++) {
            var customerName = table.rows[i].cells[1].textContent.toLowerCase();
            
            if (customerName.includes(name.toLowerCase())) {
              table.rows[i].style.display = "";
            } else {
              table.rows[i].style.display = "none";
            }
          }
        }
</script>
</div>
<div class="box">
<div class="table-container">
<div class="nav2"><span class="span">Total count:</span></div>
  <table id="customerTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Full Name</th>
        <th>Address</th>
        <th>Mobile number</th>
        <th>Email</th>
        <th>Contact Person Name</th>
      </tr>
    </thead>
    <tbody>';
        $query = 'SELECT * from Customers';
        $result = mysqli_query($con, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr onclick="fetch_data()">
                  <td>' . $row["customer_id"] . '</td>
                  <td>' . $row["customer_name"] . '</td>
                  <td>' . $row["address"] . '</td>
                  <td>' . $row["mobile_number"] . '</td>
                  <td>' . $row["email"] . '</td>
                  <td>' . $row["contact_person"] . '</td>
                </tr>';
        }
      '

      <script>
      function fetch_data()
      {
       var x=document.getElementById("");

      }
      </script>
    </tbody>
  </table>
</div>
</div>
</body>
</html>';
?>
    
