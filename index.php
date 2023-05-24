<!DOCTYPE html>
<html>

<head>
  <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
  <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
  <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
  <link rel="stylesheet" href="style.css" />
  <script src="script.js"></script>
</head>

<body>
  <div class="nav">
    <h2 style="color: white">Enter / View details</h2>
  </div>
  <div class="container">
    <form id="customerForm" method="post" action="">
      <input type="hidden" id="customer_id" name="customer_id" />
      <div>
        <label for="name">Full Name</label>
        <input type="text" id="name" name="customer_name" placeholder="Enter your name" required />
      </div>
      <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter your address" required />
      </div>
      <div>
        <label for="number">Mobile number</label>
        <input type="tel" id="number" name="mobile_number" placeholder="Enter your mobile number" pattern="[0-9]{10}"
          required />
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
        <input type="submit" onclick="update()" id="autocl" value="update" />
        <input type="submit" value="Save" onclick="saveData()" />
        <input type="submit" id="newButton" value="New" onclick="clearForm()" />
      </div>
    </form>
  </div>
  <div id="wrapper" class="table-container"></div>

  <?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  $con = mysqli_connect("localhost", "root", "", "Customer_details") or die("Couldn't connect to database");

  $query = 'SELECT * from Customers';

  $result = mysqli_query($con, $query);
  $phpData = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $phpData[] = array(
      $row["customer_id"],
      $row["customer_name"],
      $row["address"],
      $row["mobile_number"],
      $row["email"],
      $row["contact_person"]
    );
  }
  $jsonData = json_encode($phpData);
  ?>

  <script>

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

    document.getElementById("newButton").addEventListener("click", clearForm);
    var jsonData = <?php echo $jsonData; ?>;
    new gridjs.Grid({
      columns: [
        "ID",
        {
          name: 'Customer_name',
          attributes: (cell, row) => {
            return {
              onclick: () => updateCustomer(row.cells[0].data),
              style: 'cursor: pointer;'
            };
          }
        },
        {
          name: 'Address',
          attributes: (cell, row) => {
            return {
              onclick: () => updateCustomer(row.cells[0].data),
              style: 'cursor: pointer;'
            };
          }
        },
        {
          name: 'Mobile number',
          attributes: (cell, row) => {
            return {
              onclick: () => updateCustomer(row.cells[0].data),
              style: 'cursor: pointer;'
            };
          }
        },
        {
          name: 'Email',
          attributes: (cell, row) => {
            return {
              onclick: () => updateCustomer(row.cells[0].data),
              style: 'cursor: pointer;'
            };
          }
        },
        {
          name: 'Contact person',
          attributes: (cell, row) => {
            return {
              onclick: () => updateCustomer(row.cells[0].data),
              style: 'cursor: pointer;'
            };
          }
        },

      ],
      data: jsonData,
      pagination: {
        limit: 5
      },
      search: true,
      sort: true,
      language: {
        "search": {
          "placeholder": " Search..."
        },
        "pagination": {
          "previous": "⬅️",
          "next": "➡️",
          "results": () => "Records"
        }
      }
    }).render(document.getElementById("wrapper"));

  </script>
</body>

</html>