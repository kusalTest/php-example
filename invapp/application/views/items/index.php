

	<div class="bs-docs-section">
	    <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables"><h2><?= $title?></h2></h1>
            </div>

            <div class="bs-component">

            <a class="btn btn-info" href="<?php echo site_url('/items/create');?>">Create Item</a>
            <br><br><br>
              <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
            <?php $i=1;?>
			<?php foreach($items as $item): ?>
                  <tr class="table-active">
                    <td><?= $i?></td>
                    <td><a href="<?php echo site_url('/items/').$item['slug'];?>"><?= $item['title']?></a></td>
                    <td><?= $item['description']?></td>
                    <td><a class="btn btn-success" href="<?php echo site_url('/items/edit/').$item['slug'];?>">Edit</a>/
                    	<a class="btn btn-danger" href="<?php echo site_url('/items/delete/').$item['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                  </tr>
                </tbody>
             <?php $i++;?>
			<?php endforeach; ?>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
      </div>

