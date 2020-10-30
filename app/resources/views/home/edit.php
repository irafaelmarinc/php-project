<div class="container mt-5">
  <div class="row">
    <div class="col">
      <form action="?c=Home&a=CreateOrEdit&dni=<?php echo $user["ci"] ?>" method="POST">
        <div class="form-group">
          <label for="inpDNI">DNI</label>
          <input type="text" name="ci" value="<?php echo $user["ci"] ?>" class="form-control" id="inpDNI" readonly>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inpName">Name</label>
            <input type="text" name="first_name" value="<?php echo $user["first_name"] ?>" class="form-control"
              id="inpName" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inpLastname">Lastname</label>
            <input type="text" name="last_name" value="<?php echo $user["last_name"] ?>" class="form-control"
              id="inpLastname" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inpPhone">Phone</label>
          <input type="text" name="phone" value="<?php echo $user["phone"] ?>" class="form-control" id="inpPhone"
            required>
        </div>
        <button type="submit" class="btn btn-sm btn-success btn-block">Edit</button>
      </form>
      <a href="?c=Home&a=index" style="text-decoration:none">
        <button class="btn btn-sm btn-info btn-block mt-1">Cancel</button>
      </a>
    </div>
  </div>
</div>