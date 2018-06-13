	  
		<div class="col-lg-4 offset-lg-1">

            <?php echo validation_errors();?>

              <?php echo form_open('users/update');?>
			  <input type="hidden" name="id" value="<?php echo $user['id'];?>">
                <div class="form-group">
                  <label class="col-form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $user['name'];?>">
                </div>
				<div class="form-group">
                  <label class="col-form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo $user['username'];?>">
                </div>
				<div class="form-group">
                  <label class="col-form-label">Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="<?php echo $user['email'];?>">
                </div>
				<div class="form-group">
                  <label class="col-form-label">Zipcode</label>
                  <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo $user['zipcode'];?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

          </div>