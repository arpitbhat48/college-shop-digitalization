const fname = document.querySelector('input[name="fname"]');
const lname = document.querySelector('input[name="lname"]');
const roll = document.querySelector('input[name="roll"]');
const phone = document.querySelector('input[name="phone"]');
const email = document.querySelector('input[name="email"]');
const pwd = document.querySelector('input[name="pwd"]');
const confPwd = document.querySelector('input[name="confPwd"]');

function validateForm() {
    let err = '';
    err += validate.name(fname.value) + '\n';
    err += validate.name(lname.value) + '\n';
    err += validate.rollNumber(roll.value) + '\n';
    err += validate.phoneNumber(phone.value) + '\n';
    err += validate.email(email.value) + '\n';
    err += validate.password(pwd.value) + '\n';

    if (pwd.value !== confPwd.value) {
        err += "Passwords don't match";
    }
    alert(err);
}
