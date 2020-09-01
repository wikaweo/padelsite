<nav class="navbar navbar-expand-lg navbar-dark mb-3" style="background-color: #2f5261;">
<div class="container">
  <a class="navbar-brand" href="<?php echo URLROOT ?>">
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>">Hem</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user_id'])) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logga ut</a>
      </li>

    <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Registrera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Logga in</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
  </div>
</nav>