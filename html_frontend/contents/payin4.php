<link rel="stylesheet" href="./assets/css/Pay.css">
<div class="slider" style = "background: white">
    <div class="form-left">
        <div class="information">
            <div class="information-bill">
                <h3 class="billing">Pay information</h3>
                <div class="input-information">
                    <p class="name">
                        <label>
                            <font>Full name&nbsp;</font>
                            <font>*</font>
                        </label>
                        <span>
                            <input class="form-control" id="name" required type="text" name="name" value="<?php echo $fullname ?>"><br>
                        </span>
                    </p>
                    <p class="address">
                        <label>
                            <font>Address&nbsp;</font>
                            <font>*</font>
                        </label>
                        <span>
                            <input class="form-control" id="address" required type="text" name="address" value="<?php echo $address ?>"><br>
                        </span>
                    </p>
                    <p class="phone-number">
                        <label>
                            <font>Phone number&nbsp;</font>
                            <font>*</font>
                        </label>
                        <span>
                            <input class="form-control" id="phone" required type="text" name="phone" value="<?php echo $phone ?>"><br>
                        </span>
                    </p>
                    <p class="email-address">
                        <label>
                            <font>Email address&nbsp;</font>
                            <font>*</font>
                        </label>
                        <span>
                            <input readonly class="form-control" required type="text" name="email" value="<?php echo $email ?>"><br>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>