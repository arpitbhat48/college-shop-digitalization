const roll = document.querySelector('input[name="roll"]');
const pwd = document.querySelector('input[name="pwd"]');

function validateForm() {
    let err = '';
    eroll = validate.rollNumber(roll.value);
    epwd = validate.password(pwd.value);

    if (eroll) err += eroll + '\n';
    if (epwd) err += epwd + '\n';

    if (err === '') {
        return True;
    }

    alert(err);
    return False;
}
