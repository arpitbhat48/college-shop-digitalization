const fname = document.querySelector('input[name="fname"]');
const lname = document.querySelector('input[name="lname"]');
const roll = document.querySelector('input[name="roll"]');
const phone = document.querySelector('input[name="phone"]');
const email = document.querySelector('input[name="email"]');
const pwd = document.querySelector('input[name="pwd"]');
const confPwd = document.querySelector('input[name="confPwd"]');

function validateForm() {
    let err = '';

    efname = validate.name(fname.value);
    elname = validate.name(lname.value);
    eroll = validate.rollNumber(roll.value);
    ephone = validate.phoneNumber(phone.value);
    eemail = validate.email(email.value);
    epwd = validate.password(pwd.value);
    ematch = pwd.value === confPwd.value ? '' : "Passwords don't match";

    if (efname) err += efname + '\n';
    if (elname) err += elname + '\n';
    if (eroll) err += eroll + '\n';
    if (ephone) err += ephone + '\n';
    if (eemail) err += eemail + '\n';
    if (epwd) err += epwd + '\n';
    if (ematch) err += ematch + '\n';

    if (err === '') {
        return True;
    }

    alert(err);
    return False;
}
