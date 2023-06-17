const userName = document.querySelector('.user-name');
const phoneNumber = document.querySelector('.phone-number');
const userAddress = document.querySelector('.user-address');
const totalPrice = document.querySelector('.total-price');
const errorMessage = document.querySelector('.error-message');
const completeOrderBtn = document.querySelector('.complete-order');

completeOrderBtn.addEventListener('click', (e) => {
    if (!userName.value || !phoneNumber.value || !userAddress.value || !totalPrice.value) {
        e.preventDefault()
        errorFunc('جميع الحقول مطلوبة')
    }
})

let cleave = new Cleave('.phone-number', {
    phone: true,
    phoneRegionCode: 'PS'
});

const errorFunc = (message) => {
    errorMessage.textContent = message;
    errorMessage.style.color = 'red'
    let toastLiveExample = document.getElementById('liveToast')
    let toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}