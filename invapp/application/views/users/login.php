          <div class="col-lg-4 offset-lg-1">

            <?php echo validation_errors();?>

              <?php echo form_open('users/login');?>
                <div class="form-group">
                  <label class="col-form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
              </form>

          </div>