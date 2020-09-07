const roll = document.querySelector('input[name="roll"]');
const pwd = document.querySelector('input[name="pwd"]');

function validateForm() {
    let err = '';
    err += validate.rollNumber(roll.value) + '\n';
    err += validate.password(pwd.value) + '\n';

    alert(err);
}
