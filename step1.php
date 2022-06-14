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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.form.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
    </head>
    <body class="">
        <div class="body">		
            <div class="sky-form">
                <header><h5>Security Token</h5></header>
                <fieldset>					
                    <div class="row">
                        <label class="label col col-4">Username</label>
                        <section class="col col-8">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input id="username" type="text" name="username" value="integraciones@niubiz.com.pe" placeholder="Username">
                            </label>
                        </section>
                        <label class="label col col-4">Password</label>
                        <section class="col col-8">
                            <label class="input">
                                <i class="icon-append fa fa-lock"></i>
                                <input id="password" type="text" name="password" value="_7z3@8fF" placeholder="Password">
                            </label>
                        </section>
                    </div>
                </fieldset>
                <footer>
                    <button onclick="tokenSeguridad();" class="button">Validate</button>
                    <div class="progress"></div>
                </footer>	
            </div>
        </div>
    </body>
    <script src="main.js"></script>
</html>