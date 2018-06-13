

	<div class="bs-docs-section">
	    <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables"><h2><?= $title?></h2></h1>
            </div>

            <div class="bs-component">

            <a class="btn btn-info" href="<?php echo site_url('/users/create');?>">Create User</a>
            <br><br><br>
              <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
					<th>Actions</th>
                  </tr>
                </thead>
                <tbody>
            <?php $i=1;?>
			<?php foreach($users as $user): ?>
                  <tr class="table-active">
                    <td><?= $i?></td>
                    <td><a href="<?php echo site_url('/users/').$user['slug'];?>"><?= $user['name']?></a></td>
                    <td><?= $user['username']?></td>
					<td><?= $user['email']?></td>
                    <td><a class="btn btn-success" href="<?php echo site_url('/users/edit/').$user['slug'];?>">Edit</a>/
                    	<a class="btn btn-danger" href="<?php echo site_url('/users/delete/').$user['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                  </tr>
                </tbody>
             <?php $i++;?>
			<?php endforeach; ?>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
      </div>

