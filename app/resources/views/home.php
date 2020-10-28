<div class="container mt-5">
  <div class="m-3 float-right">
    <button class="btn btn-success" data-toggle="modal" data-target="#registerModal">
      <i class="fa fa-plus-square"></i> Register
    </button>
  </div>
  <table class="table table-striped table-hover">
    <thead>
      <tr class="text-center">
        <th scope="col">DNI</th>
        <th scope="col">Name</th>
        <th scope="col">Lastname</th>
        <th scope="col">Phone</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($users as $user) {
      ?>
      <tr class="text-center">
        <td><?php echo $user["ci"] ?></td>
        <td><?php echo $user["first_name"] ?></td>
        <td><?php echo $user["last_name"] ?></td>
        <td><?php echo $user["phone"] ?></td>
        <td>
          <a href="?c=Home&a=edit&ci=<?php echo $user["ci"] ?>" style="text-decoration:none">
            <button class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
              <i class="fa fa-pencil-square-o"></i>
            </button>
          </a>
          <a href="?c=Home&a=delete&ci=<?php echo $user["ci"] ?>" style="text-decoration:none"
            onclick="javascript:return confirm('Are you sure to delete the record?')">
            <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
              <i class="fa fa-trash"></i>
            </button>
          </a>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inpName">Name</label>
              <input type="text" name="first_name" class="form-control" id="inpName" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inpLastname">Lastname</label>
              <input type="text" name="last_name" class="form-control" id="inpLastname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inpDNI">DNI</label>
            <input type="text" name="ci" class="form-control" id="inpDNI" required>
          </div>
          <div class="form-group">
            <label for="inpPhone">Phone</label>
            <input type="text" name="phone" class="form-control" id="inpPhone" required>
          </div>
          <button type="submit" class="btn btn-sm btn-primary btn-block">Register</button>
          <button type="button" class="btn btn-sm btn-warning btn-block" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$('#registerModal').on('show.bs.modal', function (event) {
    $("#inpName").val("");
    $("#inpLastname").val("");
    $("#inpDNI").val("");
    $("#inpPhone").val("");
});
</script>