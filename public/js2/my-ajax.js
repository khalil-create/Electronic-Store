/*------------------------ Start Duplicate Rows ----------------------------------------------------------------*/
var clone;
var isIE = /*@cc_on!@*/ false; //IE detector
function addRow() {
    var tbody = document.getElementById('mytable').getElementsByTagName('tbody')[0];
    tbody.appendChild(clone);
    cloneRow();
}

function deleteRow(e, total = false) {
    var rows = document.getElementById('mytable').getElementsByTagName('tr');
    // var rows = $('#mytable tbody').find('tr');
    if (rows.length > 3)
        $(e).parent('td').parent('tr').remove();
    if (total)
        getTotalPrice();
}

function cloneRow() {
    var rows = document.getElementById('mytable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    // var rows = $('#mytable tbody').find('tr');
    // console.log(rows);
    // console.log('rows.length = '+rows.length);
    var index = rows.length + 1;
    clone = rows[rows.length-1].cloneNode(true);
    // clone = rows[rows.length - 2].cloneNode(true);
    clone.className = index;
    // 2 == 0 ? 'two' : 'one';
    var inputs = clone.getElementsByTagName('input'), inp, i = 0;
    while (inp = inputs[i++]) {
        inp.id = inp.id.replace(/\d{1,}/g, index);
        // if (isIE) { // solve for IE "new name in DOM bug"
        //     document.forms['myform'].elements[inp.name] = inp;
        // }
    }
    var selects = clone.getElementsByTagName('select'), slct, i = 0;
    while (slct = selects[i++]) {
        slct.id = slct.id.replace(/\d{1,}/g, index);
    }
}
// onload = cloneRow;
/*------------------------ End Duplicate Rows ----------------------------------------------------------------*/
$(document).ready(function () {

});
