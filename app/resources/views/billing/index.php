<style>
  @media only screen and (max-width: 576px) {
    input.form-control {
      margin: 5px 0px;
    }
  }

  @media only screen and (max-width: 768px) {
    input.form-control {
      margin: 5px 0px;
    }
  }
</style>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <select class="custom-select" onchange="getUserSelected(this)">
        <option value="0" selected>Select User</option>
        <?php
        foreach ($users as $usr) {
        ?>
        <option value="<?php echo $usr["ci"] ?>"><?php echo $usr["first_name"] . " " . $usr["last_name"]  ?></option>
        <?php 
        }
        ?>
      </select>
    </div>
    <div class="col-sm-6 col-md-3">
      <input id="inpDNIRO" type="text" class="form-control" placeholder="DNI" style="cursor: pointer" readonly>
    </div>
    <div class="col-sm-6 col-md-3">
      <input id="inpPhoneRO" type="text" class="form-control" placeholder="Phone" style="cursor: pointer" readonly>
    </div>
  </div>
  <div class="mt-5">
    <button class="btn btn-sm btn-info">Generate Order</button>
  </div>
  <div class="mt-2">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr class="text-center">
          <th>Description</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total Value</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td>
            <select id="productSelect" class="custom-select" onchange="getProductSelected(this)">
              <option value="0" selected>Select Product</option>
              <?php
              foreach ($products as $product) {
              ?>
              <option value="<?php echo $product["id"] ?>"><?php echo $product["description"] ?></option>
              <?php 
              }
              ?>
            </select>
          </td>
          <td>
            <input id="inpQuantity" type="number" min=1 step=1 value=1 class="form-control"
              onchange="calculateByQuantity(this)">
          </td>
          <td>
            <input id="inpUnit" type="text" class="form-control" value="0.00" style="cursor: pointer" readonly>
          </td>
          <td>
            <input id="inpTotal" type="text" class="form-control" value="0.00" style="cursor: pointer" readonly>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="text-center">
      <div class="row justify-content-end">
        <div class="col-md-3 text-right"><strong>SUBTOTAL</strong></div>
        <div class="col-md-3">
          <input id="inpSubt" type="text" class="form-control form-control-sm" value="0.00" style="cursor: pointer"
            readonly>
        </div>
      </div>
      <div class="row justify-content-end mt-1 mb-1">
        <div class="col-md-3 text-right"><strong>IVA 12%</strong></div>
        <div class="col-md-3">
          <input id="inpIva" type="text" class="form-control form-control-sm" value="0.00" style="cursor: pointer"
            readonly>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col-md-3 text-right"><strong>TOTAL</strong></div>
        <div class="col-md-3">
          <input id="inpTotalFinal" type="text" class="form-control form-control-sm" value="0.00"
            style="cursor: pointer" readonly>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    getUserSelected = (userSelected) => {
      var params = { dni: userSelected.value };
      $.ajax({
        data: params,
        url: '?c=Home&a=getUserByDNI',
        type: 'POST',
        success: (response) => {
          let information = JSON.parse(response);
          if (!(information.ci === undefined)) {
            $("#inpDNIRO").val(`${information.ci}`);
            $("#inpPhoneRO").val(`${information.phone}`);
          } else {
            $("#inpDNIRO").val("");
            $("#inpPhoneRO").val("");
          }
        },
        error: (err) => {
          console.log(err)
        }
      });
    }

    getProductSelected = (productSelected) => {
      var params = { id: productSelected.value, description: $("#productSelect option:selected").text() };
      $.ajax({
        data: params,
        url: '?c=Product&a=getProductSelected',
        type: 'POST',
        success: (response) => {
          let information = JSON.parse(response);
          if (!(information.price === undefined)) {
            $("#inpUnit").val(`${information.price}`);
            let total = information.price * $("#inpQuantity").val();
            let iva = (total * 12) / 100;
            $("#inpTotal").val(`${total}`);
            $("#inpSubt").val(`${total}`);
            $("#inpIva").val(`${iva}`);
            $("#inpTotalFinal").val(`${total + iva}`);
          } else {
            $("#inpUnit").val("0.00");
            $("#inpTotal").val("0.00");
          }
        },
        error: (err) => {
          console.log(err)
        }
      });
    }

    calculateByQuantity = (quantity) => {
      let selected = $("#productSelect option:selected").text();
      if (selected !== "Select Product") {
        let price = $("#inpUnit").val();
        let total = price * $("#inpQuantity").val();
        let iva = (total * 12) / 100;
        $("#inpTotal").val(`${total}`);
        $("#inpSubt").val(`${total}`);
        $("#inpIva").val(`${iva}`);
        $("#inpTotalFinal").val(`${total + iva}`);
      }
    }
  });
</script>