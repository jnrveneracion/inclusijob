
function formatCurrency(input) {
    // Remove non-numeric characters
    let value = input.value.replace(/[^\d.]/g, '');

    // Split value into integer and decimal parts
    let [integerPart, decimalPart] = value.split('.');

    // Add commas to the integer part
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

    // Combine integer and decimal parts with a dot
    if (decimalPart) {
        input.value = integerPart + '.' + decimalPart;
    } else {
        input.value = integerPart;
    }
}