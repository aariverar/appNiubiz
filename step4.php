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
</head>
<body class="">
    <div class="body">
        <div class="sky-form">
            <header>Authorize Transaction</header>
            
            <fieldset style="padding-bottom: 25px">
                <div class="row"><label class="label col col-2">Channel: </label><label class="label col col-10"><?php echo $_SESSION['channel']; ?></label></div>
                <div class="row">
                    <label class="label col col-2">Token: </label><label class="label col col-10"><?php echo $_POST['transactionToken']; ?></label>
                    <input id='transactionToken' name='transactionToken' type='hidden' value='<?php echo $_POST['transactionToken']; ?>'>
                </div>
                <div class="row"><label class="label col col-2">Email: </label><label class="label col col-10"><?php echo $_POST['customerEmail']; ?></label></div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <label class="label col col-2">Token SCT</label>
                    <section class="col col-10">
                        <label class="input">
                            <i class="icon-append fa fa-bars"></i>
                            <label class="input">
                                <i class="icon-append fa fa-bars"></i>
                                <input id="tokenseguridad" type="text" readonly name="tokenseguridad" value="<?php echo $_SESSION['tokenSeguridad2'] ?>" placeholder="Token Seguridad">
                            </label>
                    </section>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <label class="label col col-2">Channel</label>
                    <section class="col col-4">
                        <label class="select">
                            <i class="icon-append fa fa-user"></i>
                            <select id="channel" name="channel">
                                <option value="web" selected>Web</option>
                                <option value="pasarela">Pasarela</option>
                                <option value="mobile">Mobile</option>
                                <option value="callcenter">Call Center</option>
                                <option value="recurrent">Recurrent</option>
                            </select>
                        </label>
                    </section>
                    <label class="label col col-2">Countable</label>
                    <section class="col col-4">
                        <label class="select">
                            <i class="icon-append fa fa-user"></i>
                            <select id="countable" name="countable">
                                <option value="true" selected>true</option>
                                <option value="false">false</option>
                            </select>
                        </label>
                    </section>
                </div>
                <div class="row">
                   <label class="label col col-2">Merchant</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-briefcase"></i>
                            <input id="merchantid" type="text" name="merchantid" readonly value="<?php echo $_SESSION['merchantid']; ?>" placeholder="Merchant Id">
                        </label>
                    </section>
                    <!--  <label class="label col col-2">Sponsored</label>
                    <section class="col col-4">
                        <label class="select">
                            <i class="icon-append fa fa-user"></i>
                            <select id="sponsored" name="sponsored">
                                <option value="true">true</option>
                                <option value="false" selected>false</option>
                            </select>
                        </label>
                    </section> -->
                </div>
                <div class="row">
                    <label class="label col col-2">Amount</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-dollar"></i>
                            <input id="amount" type="text" name="amount" readonly value="<?php echo $_SESSION['amount']; ?>" placeholder="Amount">
                        </label>
                    </section>
                    <label class="label col col-2">Currency</label>
                    <section class="col col-4">
                        <label class="select">
                            <i class="icon-append fa fa-user"></i>
                            <select id="currency" name="currency">
                                <option value="PEN" selected>PEN</option>
                                <option value="USD">USD</option>
                            </select>
                        </label>
                    </section>
                </div>

                <div class="row">
                    <label class="label col col-2">Purchase Number</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-barcode"></i>
                            <input id="purchasenumber" type="text" name="purchasenumber" readonly value="<?php echo $_SESSION['purchasenumber']; ?>" placeholder="Purchase Number">
                        </label>
                    </section>
                    <!-- <label class="label col col-2">Product Id</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-print"></i>
                            <input id="productid" type="text" name="productid" value="170" placeholder="Product">
                        </label>
                    </section> -->
                </div>
            </fieldset>
            <footer>
                <button onclick="cancel()" class="button btn-black text-left">Cancel</button>
                <button onclick="autorize()" class="button">Authorize</button>
                <div class="progress"></div>
            </footer>
        </div>
    </div>
    <script src="main.js"></script>
</body>
</html>