<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Demo Boton de Pago</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/sky-forms.css">
    <link rel="stylesheet" href="css/sky-forms-red.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>

    <script type="text/javascript" src="https://static-content-qas.vnforapps.com/v2/js/checkout.js"></script>

    <link rel="stylesheet" href="https://pocpaymentserve.s3.amazonaws.com/payform.min.css">
    <script src="https://pocpaymentserve.s3.amazonaws.com/payform.min.js"></script>
</head>

<body class="">
    <div class="body">
        <div class="sky-form">
            <header>
                <h5>Configurar boton de pago - Regular</h5>
            </header>
            <fieldset>
                <div class="row">
                    <label class="label col col-2">Sesion Token</label>
                    <section class="col col-10">
                        <label class="input">
                            <i class="icon-append fa fa-chain-broken"></i>
                            <input id="sessiontoken" type="text" readonly name="sessiontoken" value="<?php echo $_SESSION['tokenSesion'] ?>" placeholder="Sesion Token">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <label class="label col col-2">Channel</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            <input id="channel" type="text" readonly name="channel" value="<?php echo $_SESSION['channel'] ?>" placeholder="Channel">
                        </label>
                    </section>
                    <label class="label col col-2">Merchant</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-briefcase"></i>
                            <input id="merchantid" type="text" readonly name="merchantid" value="<?php echo $_SESSION['merchantid'] ?>" placeholder="Merchant Id">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <label class="label col col-2">Purchase Number</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-barcode"></i>
                            <input id="purchasenumber" type="text" name="purchasenumber" value="84335" placeholder="Purchase Number">
                        </label>
                    </section>
                    <label class="label col col-2">Amount</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-dollar"></i>
                            <input id="amount" type="text" readonly name="amount" value="<?php echo $_SESSION['amount'] ?>" placeholder="Amount">
                        </label>
                    </section>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <label class="label col col-2">Logo</label>
                    <section class="col col-10">
                        <label class="input">
                            <i class="icon-append fa fa-image"></i>
                            <input id="merchantlogo" type="text" name="merchantlogo" value="img/comercio.png" placeholder="Logo">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <label class="label col col-2">Callback URL</label>
                    <section class="col col-10">
                        <label class="input">
                            <i class="icon-append fa fa-archive"></i>
                            <input id="action" type="text" name="action" value="step4.php" placeholder="Callback Merchant URL">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <label class="label col col-2">Timeout URL</label>
                    <section class="col col-10">
                        <label class="input">
                            <i class="icon-append fa fa-times"></i>
                            <input type="text" id="timeouturl" name="timeouturl" value="timeout.php" placeholder="Timeout URL">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <label class="label col col-2">Button Color</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-css3"></i>
                            <input id="formbuttoncolor" type="text" name="formbuttoncolor" value="#D80000" placeholder="Button Color">
                        </label>
                    </section>

                    <label class="label col col-2">Expiration Minutes</label>
                    <section class="col col-4">
                        <label class="select">
                            <select id="expirationminutes" name="expirationminutes">
                                <option value="20" selected>20</option>
                                <option value="15">15</option>
                                <option value="10">10</option>
                                <option value="5">5</option>
                            </select>
                            <i></i>
                        </label>
                    </section>

                    <label class="label col col-2">Mode</label>
                    <section class="col col-4">
                        <label class="select">
                            <select id="typeform" name="typeform">
                                <option value="1" selected>Button</option>
                                <option value="2">Disengaged</option>
                            </select>
                            <i></i>
                        </label>
                    </section>
                </div>
            </fieldset>

            <footer>
                <button onclick="cancel()" class="button btn-black text-left">Cancel</button>

                <button onclick="build()" class="button">Build</button>
                <a id="botonpago2" href="#miModal" class="button btn-black d-none">Pay</a>
                <button id="botonpago1" onclick="openForm()" class="button btn-black d-none">Pay</button>
                <div class="progress"></div>
            </footer>
        </div>
    </div>

    <!-- FORMULARIO DESACOPLADO -->
    <div id="miModal" class="modal">
        <div class="modal-contenido">
            <div class="sky-form">
                <header>
                    <h5>Form Pay</h5>
                </header>

                <fieldset>
                    <div class="row">
                        <section class="col col-12">
                            <label class="label">Card Number</label>
                            <label class="input">
                                <i class="icon-append fa fa-chain-broken"></i>
                                <input id="cardNumber" type="text" name="cardNumber" value="" placeholder="Card Number">
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-6">
                            <label class="label">Month/Year</label>
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input id="cardExpiry" type="text" name="cardExpiry" value="" placeholder="Month/Year">
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="label">CVV2</label>
                            <label class="input">
                                <i class="icon-append fa fa-briefcase"></i>
                                <input id="cardCvc" type="text" name="cardCvc" value="" placeholder="CVV2">
                            </label>
                        </section>
                    </div>
                </fieldset>
                <footer>
                    <a href="#" class="button btn-black">Cancel</a>
                    <button onclick="openFormPay()" class="button">Pay</button>
                </footer>
            </div>
        </div>
    </div>
</body>
<script src="main.js"></script>
</html>