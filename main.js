// TOKEN SEGURIDAD
let tokenSeguridad = () => {
    let username = $("#username").val();
    let password = $("#password").val();
    let AUTH = username + ':' + password;
    let ENCODE_AUTH = btoa(AUTH);
    let AUTH_HEADER = 'Basic ' + ENCODE_AUTH;

    let url = 'https://apitestenv.vnforapps.com/api.security/v1/security';
    const options = {
        method: 'GET',
        headers: {
            Accept: 'text/plain',
            Authorization: AUTH_HEADER
        }
    };

    fetch(url, options)
        .then(response => response.text())
        .then(response => {
            fetch(url, options)
                .then(response => response.text())
                .then(response1 => {
                    buildSeguridad(response, response1)
                })
                .catch(err => console.error(err));
        })
        .catch(err => console.error(err));
};

let buildSeguridad = (param1, param2, step) => {
    let url = 'action.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            APITokenSeguridad: 1,
            tokenSeguridad: param1,
            tokenSeguridad2: param2
        },
        success: function (response) {
            location.href = "step2.php";
        }
    });
}

// TOKEN SESION
let tokenSesion = () => {
    const data = {
        channel: $("#channel").val(),
        merchantid: $("#merchantid").val(),
        amount: $("#amount").val(),
        clientip: $("#clientip").val(),
        merchantDefineData: {
            mdd15: $("#mdd15").val(),
            mdd20: $("#mdd20").val(),
            mdd30: $("#mdd30").val(),
        }
    }

    const url = 'https://apisandbox.vnforappstest.com/api.ecommerce/v2/ecommerce/token/session/456879852';
    const options = {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            Authorization: $("#tokenseguridad").val()
        },
        body: JSON.stringify(data)
    };

    fetch(url, options)
        .then(response => response.json())
        .then(response => buildSesion(response.sessionKey))
        .catch(err => console.error(err));
}

let buildSesion = (param) => {
    const data = {
        APITokenSesion: 1,
        tokenSesion: param,
        channel: $("#channel").val(),
        merchantid: $("#merchantid").val(),
        amount: $("#amount").val(),
    }

    let url = 'action.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response) {
            location.href = "step3.php";
        }
    });
}

// build
let build = () => {
    let typeform = $('#typeform').val();
    const data = {
        generarBoton: 1,
        purchasenumber: $('#purchasenumber').val(),
        merchantlogo: $('#merchantlogo').val(),
        action: $('#action').val(),
        timeouturl: $('#timeouturl').val(),
        formbuttoncolor: $('#formbuttoncolor').val(),
        expirationminutes: $('#expirationminutes').val(),
    }

    const url = 'action.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response) {
            let data = JSON.parse(response);
            if (data.form == true) {
                $("#botonpago1").hide();
                $("#botonpago2").hide();

                $("#botonpago" + typeform).show();
                configureForm(data, typeform);
            }
        }
    });
}


let configureForm = (data, typeform) => {
    if (typeform == 1) {
        VisanetCheckout.configure({
            sessiontoken: data.tokenSesion,
            channel: data.channel,
            merchantid: data.merchantid,
            purchasenumber: data.purchasenumber,
            amount: data.amount,

            expirationminutes: data.expirationminutes,
            timeouturl: data.timeouturl,
            merchantlogo: data.merchantlogo,

            formbuttoncolor: '#000000',
            action: data.action,
            complete: function (params) {
                console.log(params);
            }
        });
        // VisanetCheckout.open();
    } else {
        // FORM DESACOPLADO
        const configuration = {
            callbackurl: data.action,
            sessionkey: data.tokenSesion,
            channel: data.channel,
            merchantid: data.merchantid,
            purchasenumber: data.purchasenumber,
            amount: data.amount,
            language: 'es',
            font: 'https://fonts.googleapis.com/css?family=Montserrat:400&display=swap',
            recurrencemaxamount: '8.5'
        };
        payform.setConfiguration(configuration);
    }
}

let openForm = () => {
    $(".progress").html('Cargando...');
    VisanetCheckout.open();
}

// EXCLUSIVO PARA DESACOPLADO
let openFormPay = () => {
    let cardNumber, cardExpiry, cardCvc;
    cardCvc = $("#cardCvc").val();
    cardExpiry = $("#cardExpiry").val();
    cardNumber = $("#cardNumber").val();

    var data = {
        name: 'Juan',
        lastName: 'Perez',
        email: 'jperez@test.com',
    };

    payform.createToken([cardNumber, cardExpiry, cardCvc], data).then(function (response) {
        console.log(response)
    }).catch(function (error) {
        console.log(error)
    });
}


let autorize = () => {
    let tokenSeguridad = $("#tokenSeguridad").val();
    let merchantid = $("#merchantid").val();

    console.log(tokenSeguridad)
    data = {
        channel: $("#channel").val(),
        captureType: 'manual',
        countable: $("#countable").val(),
        order: {
            tokenId: $("#transactionToken").val(),
            purchaseNumber: $("#purchasenumber").val(),
            amount: $("#amount").val(),
            currency: $("#currency").val(),
        }
    }

    let url = "https://apisandbox.vnforappstest.com/api.authorization/v3/authorization/ecommerce/" + merchantid
    const options = {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            Authorization: tokenSeguridad
        },
        body: JSON.stringify(data)
    };

    fetch(url, options)
        .then(response => response.json())
        .then(response => console.log(response))
        .catch(err => console.error(err));
}

let cancel = () => {
    const url = 'action.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: {cancel: 1},
        success: function (response) {
            if (response){
                location.href = "index.php";
            }
        }
    });
}