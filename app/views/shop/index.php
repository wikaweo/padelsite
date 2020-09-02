<?php require APPROOT . '/views/increments/header.php'; ?>
<div><?php flash('post_message'); ?></div>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Shop</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/shop/checkout" class="btn btn-primary pull-right">
            <!-- <i class="fa fa-checkout"></i> -->
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-basket" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z">
                </path>
            </svg> Till Kassan >
        </a>
    </div>
</div>


<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">

            <?php foreach($data['shopitems'] as $shopitem) : ?>

            <form action="<?php echo URLROOT; ?>/shop/checkout" method="post">
                <div class="col-md-7 col-sm-6">
                    <div class="card mb-4 shadow-sm">
                    <div class="bd-placeholder-img card-img-top" width="100%" height="225" ></div>
                    <img height="225" width="251" src="<?php echo URLROOT; ?>/img/padel.png"/>
                        <div class="card-body">
                            <p class="card-text">
                            <h4 class="card-title"><?php echo $shopitem->name; ?></h4>

                            <textarea readonly="true" hidden="true"
                                name="name"> <?php echo $shopitem->user_id; ?></textarea>
                            <textarea readonly="true" hidden="true"
                                name="name"> <?php echo $shopitem->name; ?></textarea>
                            <textarea readonly="true"
                                name="description"> <?php echo $shopitem->description; ?></textarea>
                            <textarea readonly="true" name="price"> <?php echo $shopitem->price; ?></textarea>

                            <input type="submit" value="Lägg till" class="btn btn-success">

                        </div>
                    </div>
                </div>
            </form>

            <?php endforeach; ?>
        </div>
    </div>
</div>





<?php require APPROOT . '/views/increments/footer.php'; ?>