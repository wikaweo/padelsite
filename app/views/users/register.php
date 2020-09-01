<?php require APPROOT . '/views/increments/header.php';?>
<div class="row">
    <div class="col-md6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Skapa ett konto</h2>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">

                <div class="form-group">
                    <label for="name">Namn: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg
    <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg
    <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="password">Lösenord: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg
    <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Bekräfta lösenord: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg
    <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Har du redan ett konto?</a>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/increments/footer.php';?>