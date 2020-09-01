<?php require APPROOT . '/views/increments/header.php';?>
<a href="<?php echo URLROOT; ?>/shop" class="btn btn-light"><i class="fa fa-backward"></i> Tillbaka</a>

<div class="container">
    <div class="py-5 text-center">
        <h2><?php echo $data['title'] ?></h2>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Kassa</span>
                <span class="badge badge-secondary badge-pill"></span>
            </h4>
            <ul class="list-group mb-3">
                <?php foreach($data['checkoutItems'] as $shopitem) : ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $shopitem->name; ?></h6>
                        <small class="text-muted"><?php echo $shopitem->description; ?></small>
                    </div>
                    <span class="text-muted"><?php echo $shopitem->price; ?> kr</span>
                </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Totalt</span>
                    <strong><?php echo $data['totalsum']; ?> kr</strong>
                </li>
            </ul>

        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Fakturaaddress</h4>
            <form action="<?php echo URLROOT; ?>/shop/charge" method="post" id="payment-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Förnamn</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Efternamn</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="email" class="form-control" name="email">
                </div>

                <input type="hidden" class="form-control" name="totalprice"
                    value=<?php echo $data['totalsum']; ?> />



                <!-- <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address">
                </div> -->
                <hr class="mb-4">

                <h4 class="mb-3">Betalning</h4>


                <div class="form-row">
                    <div id="card-element" class="form-control">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <button>Gå vidare</button>
            </form>

            <?php require APPROOT . '/views/increments/footer.php';?>