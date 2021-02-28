function valid() {
    let fio = document.getElementById('name').value;
    let login = document.getElementById('login').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let password_confirm = document.getElementById('password-confirm').value;

    let sb = email.indexOf('@');
    let tch = email.indexOf('.');

    if (sb < 1 || tch < 1) {
        document.getElementById('mes').innerHTML='Email введен неверно';
        document.getElementById('email').classList.add('is-invalid');
    }
    if(password !== password_confirm){
        document.getElementById('pas_val').innerHTML='Пароли не совпадают';
        document.getElementById('password-confirm').classList.add('is-invalid');
    }
}
