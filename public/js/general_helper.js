function format_phone_number(obj, event) {
    let cursorPos = event.target.selectionStart;
    let formatInput = autoFormatPhoneNumber(event.target);
    event.target.value = String(formatInput);
    let isBackspace = (event.originalEvent.key == 'Backspace') ? true: false
    let nextCusPos = nextDigit(formatInput, cursorPos, isBackspace)
    
    obj.setSelectionRange(nextCusPos+1, nextCusPos+1);
}

function autoFormatPhoneNumber(mobile) {
    try {
        let mobileNumberString = mobile.value
        var cleaned = ("" + mobileNumberString).replace(/\D/g, "");
        var match = cleaned.match(/^(\d{0,3})?(\d{0,3})?(\d{0,4})?/);

        let formatted = [match[1], match[2] ? "-" : "", match[2], match[3] ? "-" : "", match[3]].join("");

        return formatted;
    } catch (err) {
        console.error("Error formatting phone number:", err);
        return mobileNumberString; // Return unformatted phone number on error
    }
}

function nextDigit(input, cursorpos, isBackspace) {
    if (isBackspace){
        for (let i = cursorpos-1; i > 0; i--) {
            if(/\d/.test(input[i])){
                return i
            }
        }
    } else {
        for (let i = cursorpos-1; i < input.length; i++) {
            if(/\d/.test(input[i])){
                return i
            }
        }
    }
  
    return cursorpos
}