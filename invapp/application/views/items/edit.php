          <div class="col-lg-4 offset-lg-1">

            <?php echo validation_errors();?>

              <?php echo form_open('items/update');?>
                <input type="hidden" name="id" value="<?php echo $item['id'];?>">
                <div class="form-group">
                  <label class="col-form-label">Title</label>
                  <input type="text" class="form-control" name="title" id="title" value="<?php echo $item['title'];?>">
                </div>

                <div class="form-group">
                  <label class="col-form-label col-form-label-lg" >Description</label>
                  <input class="form-control form-control-lg" type="text" name="description" id="description" value="<?php echo $item['description'];?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

          </div>