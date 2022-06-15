let tokenSeguridad = (username, password) => {
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
            addResult(response);
        })
        .catch(err => console.error(err));
};
// tokenSeguridad('integraciones@niubiz.com.pe', '_7z3@8fF')