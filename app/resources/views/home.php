<div class="container mt-5">
  <div class="m-3 float-right">
    <button class="btn btn-success">
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