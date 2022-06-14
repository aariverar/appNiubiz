<?php
session_start();

if(isset($_POST["APITokenSeguridad"])){
    $_SESSION["tokenSeguridad"] = $_POST["tokenSeguridad"];
    $_SESSION["tokenSeguridad2"] = $_POST["tokenSeguridad2"];
}

if(isset($_POST["APITokenSesion"])){
    $_SESSION["tokenSesion"] = $_POST["tokenSesion"];
    $_SESSION["channel"] = $_POST["channel"];
    $_SESSION["merchantid"] = $_POST["merchantid"];
    $_SESSION["amount"] = $_POST["amount"];
}

if(isset($_POST["generarBoton"])){
    $_SESSION["purchasenumber"] = $_POST['purchasenumber'];
    $_SESSION["merchantlogo"] = $_POST['merchantlogo'];
    $_SESSION["action"] = $_POST['action'];
    $_SESSION["timeouturl"] = $_POST['timeouturl'];
    $_SESSION["formbuttoncolor"] = $_POST['formbuttoncolor'];
    $_SESSION["expirationminutes"] = $_POST['expirationminutes'];
    $_SESSION["form"] = true;

    $data = array(
        'tokenSesion'   => $_SESSION['tokenSesion'],
        'channel'       => $_SESSION['channel'],
        'merchantid'    => $_SESSION['merchantid'],
        'amount'        => $_SESSION['amount'],
        'purchasenumber'=> $_SESSION['purchasenumber'],
        'merchantlogo'=> $_SESSION['merchantlogo'],
        'action'=> $_SESSION['action'],
        'timeouturl'=> $_SESSION['timeouturl'],
        'formbuttoncolor'=> $_SESSION['formbuttoncolor'],
        'expirationminutes'=> $_SESSION['expirationminutes'],
        'form' => true,
    );
    echo json_encode($data);
}
if(isset($_POST["responseTokenTransaction"])){
    $_SESSION["transactionToken"] = $_POST['transactionToken'];

}
if(isset($_POST["consolelog"])){
    $_SESSION["jsondata"] = $_POST['response'];
    echo true;
}
if(isset($_POST["cancel"])){
    session_destroy();
    echo true;
}
?>