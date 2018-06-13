
<div class="jumbotron">
  <h1 class="display-3"><?= $title?></h1>
  <p>This is a simple inventory management system.</p>
  <p><?php if(isset($_SESSION['logged_in'])): ?>
  	<a class="btn btn-primary btn-lg" href="users/logout">Logout</a>
  	<?php else: ?>
  	<a class="btn btn-primary btn-lg" href="users/login">Log in</a>
  <?php endif; ?></p>
</div>