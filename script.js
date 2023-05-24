function saveData() {
  const form = document.getElementById("customerForm");
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "save_data.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      refreshTableData();
    }
  };
  xhr.send(formData);
}
function update() {
  const form = document.getElementById("customerForm");
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "update.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      refreshTableData();
    }
  };
  xhr.send(formData);
}

function clearForm() {
  document.getElementById("customer_id").value = "";
  document.getElementById("name").value = "";
  document.getElementById("address").value = "";
  document.getElementById("number").value = "";
  document.getElementById("email").value = "";
  document.getElementById("contact_person").value = "";
}

function updateCustomer(customer_id) {
  const customer = jsonData.find((item) => item[0] === customer_id);

  document.getElementById("customer_id").value = customer[0];
  document.getElementById("name").value = customer[1];
  document.getElementById("address").value = customer[2];
  document.getElementById("number").value = customer[3];
  document.getElementById("email").value = customer[4];
  document.getElementById("contact_person").value = customer[5];
}
