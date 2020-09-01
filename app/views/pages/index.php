<?php require APPROOT . '/views/increments/header.php';?>
<!-- <div class="jumborton jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title'] ?></h1>
        <p class="lead"><?php echo $data['description']; ?></p>
    </div>
</div> -->

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

  <main role="main" class="inner cover jumborton jumbotron-fluid text-center">
    <h1 class="cover-heading"><?php echo $data['title'] ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
    <p class="lead">
      <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-lg btn-primary">Logga in</a>
      <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-lg btn-secondary">Registrera dig</a>
    </p>
  </main>
</div>


<?php require APPROOT . '/views/increments/footer.php';?>