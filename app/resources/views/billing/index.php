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
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Description</th>
          <th scope="col">Quantity</th>
          <th scope="col">Unit Price</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script>
  $(document).ready(function () {
    getUserSelected = (selectObj) => {
      var params = { dni: selectObj.value };
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
  });
</script>