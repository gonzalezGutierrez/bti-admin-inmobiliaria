let timesKeyword = document.getElementById('times-keyword');
let inputKeyWord = document.getElementById('inputKeyWord');

let timesTypeCustomer = document.getElementById('times-type-customer');
let inputTipoCliente  = document.getElementById('tipoCliente');

let timesStatus = document.getElementById('times-status');
let inputStatus  = document.getElementById('status');

let formFilter   = document.getElementById('formFilter');

timesKeyword.addEventListener("click", ( ) => {
    inputKeyWord.value = "";
    formFilter.submit();
});

timesTypeCustomer.addEventListener("click", () => {
    inputTipoCliente.value = "";
    formFilter.submit();
});


timesStatus.addEventListener("click", () => {
    inputStatus.value = "";
    formFilter.submit();
});
