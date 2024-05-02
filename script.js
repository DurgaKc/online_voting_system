function sendDeatails() {
    const name = document.getElementById('name').value;
    const surname = document.getElementById('surname').value;
    const address = document.getElementById('address').value;
    const citizenshipNumber = document.getElementById('citizenship-number').value;
    const dob = document.getElementById('dob').value;

    console.log("your Name ;", name);
    console.log("your surname ;", surname);
    console.log("your address ;", address);
    console.log("your citizenship-number ;", citizenshipNumber);
    console.log("your DOB ;", dob);
}