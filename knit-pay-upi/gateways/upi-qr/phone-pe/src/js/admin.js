// Function to sanitize and limit input to a specified number of digits
function knit_pay_upi_phonepe_sanitize_number(event, maxLength) {
    // Get the current value of the input
    let value = event.target.value;

    // Remove all non-digit characters
    value = value.replace(/[^0-9]/g, '');

    // Limit the length to the specified number of digits
    if (value.length > maxLength) {
        value = value.substring(0, maxLength);
    }

    // Set the sanitized and truncated value back to the input field
    event.target.value = value;
}

// Add event listeners to both input fields with their respective length limits
document.getElementById('_pronamic_gateway_upi_qr_phonepe_phone_number').addEventListener('input', function(event) {
    knit_pay_upi_phonepe_sanitize_number(event, 10);
});

document.getElementById('_pronamic_gateway_upi_qr_phonepe_otp').addEventListener('input', function(event) {
    knit_pay_upi_phonepe_sanitize_number(event, 5);
});

// Send Phone OTP
document.getElementById("phonepe-send-phone-otp").addEventListener("click", function(event) {
    event.preventDefault();

    let phone = document.getElementById("_pronamic_gateway_upi_qr_phonepe_phone_number").value.trim();

	if (phone.length !== 10) {
        alert("Please enter a valid 10 digit supervisor phone number (without +91)");
        return;
    }
    
    document.getElementById("publish").click();
});

// Submit OTP
document.getElementById("phonepe-submit-otp").addEventListener("click", function(event) {
    event.preventDefault();

    let phone = document.getElementById("_pronamic_gateway_upi_qr_phonepe_phone_number").value.trim();
    let otp = document.getElementById("_pronamic_gateway_upi_qr_phonepe_otp").value.trim();

    if (phone.length !== 10) {
        alert("Please enter a valid 10 digit supervisor phone number (without +91)");
        return;
    }
    if (otp.length !== 5) {
        alert("Please enter a valid 5 digit OTP");
        return;
    }

    document.getElementById("publish").click();
});