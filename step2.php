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
</head>

<body class="">
    <div class="body">
        <div class="sky-form">
            <header>
                <h5>Session Token</h5>
            </header>
            
            <fieldset>
                <div class="row">
                    <label class="label col col-2">Token SCT</label>
                    <section class="col col-10">
                        <label class="input">
                            <i class="icon-append fa fa-bars"></i>
                            <label class="input">
                                <i class="icon-append fa fa-bars"></i>
                                <input id="tokenseguridad" type="text" readonly name="tokenseguridad" value="<?php echo $_SESSION['tokenSeguridad'] ?>" placeholder="Token Seguridad">
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
                    <label class="label col col-2">Merchant</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-briefcase"></i>
                            <input id="merchantid" type="text" name="merchantid" value="456879852" placeholder="Merchant Id">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <label class="label col col-2">Amount</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-dollar"></i>
                            <input id="amount" type="text" name="amount" value="10.50" placeholder="Amount">
                        </label>
                    </section>

                    <label class="label col col-2">ClientIp</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-globe"></i>
                            <input id="clientip" type="text" name="amount" value="24.252.107.29" placeholder="ClientIp">
                        </label>
                    </section>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <label class="label col col-2">MDD15</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-bars"></i>
                            <label class="input">
                                <i class="icon-append fa fa-bars"></i>
                                <input id="mdd15" type="text" name="mdd15" value="Valor MDD15" placeholder="MDD15">
                            </label>
                    </section>

                    <label class="label col col-2">MDD20</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-bars"></i>
                            <input id="mdd20" type="text" name="mdd20" value="Valor MDD20" placeholder="MDD20">
                        </label>
                    </section>

                    <label class="label col col-2">MDD33</label>
                    <section class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-bars"></i>
                            <input id="mdd33" type="text" name="mdd33" value="Valor MDD33" placeholder="MDD33">
                        </label>
                    </section>
                </div>
            </fieldset>

            <footer>
                <button onclick="cancel()" class="button btn-black text-left">Cancel</button>
                <button onclick="tokenSesion()" class="button">Accept</button>
                <div class="progress"></div>
            </footer>
        </div>
    </div>
</body>
<script src="main.js"></script>

</html>