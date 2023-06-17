const cardName = document.querySelector('.card-name');
const cardNumber = document.querySelector('.card-number');
const cvv = document.querySelector('.cvv');
const errorMessage = document.querySelector('.error-message');
const paymentBtn = document.querySelector('.payment-btn');

let cardType = 'visa'
cardNumber.value.length = 16

paymentBtn.addEventListener('click', (e) => {
    if (!cardName.value) {
        e.preventDefault()
        errorFunc('اسم البطاقة مطلوب')
    } else if (!cardNumber.value) {
        e.preventDefault()
        errorFunc('رقم البطاقة مطلوب')
    } else if (getCardType() !== 'visa') {
        e.preventDefault()
        errorFunc('ادخل رقم بطاقة الفيزا بشكل صحيح')
    } else if (cardNumber.value.length !== 19) {
        e.preventDefault()
        errorFunc('لا يمكن ان يقل رقم البطاقة عن 16 خانة !!')
    } else if (cvv.value.length !== 3) {
        e.preventDefault()
        errorFunc('لا يمكن ان يقل رقم CVV عن 3 خانة !!')
    }
})

let cleave = new Cleave(".card-number", {
    creditCard: true,
    onCreditCardTypeChanged: function(type) {
        cardType = type
    },
});

const getCardType = () => {
    cardNumber.addEventListener('keyup', () => {
        return cardType
    })
    return cardType
};



const errorFunc = (message) => {
    errorMessage.textContent = message;
    errorMessage.style.color = 'red'
    let toastLiveExample = document.getElementById('liveToast')
    let toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}