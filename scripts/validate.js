validate = {
    name        : (name) => {
        const re = /^\w+$/g;
        if (!re.test(String(name))) {
            return 'Should consist only of alphabet';
        } else {
            return '';
        }
    },
    rollNumber  : (number) => {
        const re = /^\d{6, 7}/g;
        if (!re.test(String(number))) {
            return 'Invalid roll number';
        } else {
            return '';
        }
    },
    phoneNumber : (number) => {
        const re = /^\d{10}/g;
        if (!re.test(String(number))) {
            return 'Should have only 10 digits';
        } else {
            return '';
        }
    },
    email       : (email) => {
        const re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (!re.test(String(email))) {
            return 'Invalid email id';
        } else {
            return '';
        }
    },
    password    : (password) => {
        const re = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
        if (!re.test(String(password))) {
            return 'Should have one special, one numeric and more than 7 characters';
        } else {
            return '';
        }
    }
};
