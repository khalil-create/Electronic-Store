/*---------------------- start popForm ----------------------------------------------------*/
function openForm() {
    document.getElementById("popupForm").style.display = "block";
}

function closeForm() {
    document.getElementById("popupForm").style.display = "none";
}
/*---------------------- end popForm ----------------------*/


/*---------------------- start check password ----------------------------------------------------*/
function checkPassword() {
    var password = document.getElementById("password");
    var password_confirmation = document.getElementById("password_confirmation");
    var masgError = document.getElementById("inalidPasswordConfirmation");

    if (password.value == password_confirmation.value) {
        masgError.hidden = true;
        password_confirmation.style.border = "1px solid #007bff";
    } else {
        masgError.hidden = false;
        password_confirmation.style.border = "1px solid #dc3545";
    }
}

/*---------------------- End check password ----------------------------------------------------*/ //

/*---------------------- start --------------------------------------------------------------------------*/
function checkPhoneNumber() {
    var phone_number = document.getElementById("phonenumber");
    var ee = document.getElementById("invalidPhoneNo");
    let seven = phone_number.value;
    // $seven = Math.trunc($seven);
    let ss = num => Number(num);
    let intArr = Array.from(String(seven), ss);
    ee.hidden = true;
    if (phone_number.value >= 700000000 && phone_number.value <= 799999999) {
        ee.hidden = true;
        phone_number.style.border = "1px solid #007bff";

    } else if (phone_number.value > 799999999) {
        if (intArr[0] != 7)
            ee.textContent = "يجب ان يبدأ برقم 7";
        else
            ee.textContent = "يجب ان لا يتجاوز العدد لأكثر من 9 ارقام ";
        phone_number.style.border = "1px solid #dc3545";
        ee.hidden = false;
    } else {
        if (intArr[0] != 7)
            ee.textContent = "يجب ان يبدأ برقم 7";
        else
            ee.textContent = "ادخل 9 ارقام";
        phone_number.style.border = "1px solid #dc3545";
        ee.hidden = false;
    }
}
//*---------------------- end --------------------------------------------------------------------------*/
function clearAllInputs() {
    // var allInputs = document.getElementById('myform').querySelectorAll('input');
    $('#myform :input:not([name="number"])').val('');

    // console.log($('#myform :input:not([name="number"])'));
    // allInputs.forEach(singleInput => singleInput.value = '');
    location.reload();
    console.log('Form submitted and cleared successfully!');
}

function clearErrorValidation() {
    var inp = $('.help-block').closest('#myform').find('input.form-control,select.form-control');
    // var select = $('.help-block').closest('#myform').find('select.form-control');
    $(inp).on('keyup change', function() { $(this).next('.help-block').hide(); });
}

// function addStarRequired() {
// }
$(function() {
    clearErrorValidation();
})