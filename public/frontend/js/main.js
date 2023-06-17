
var cleave = new Cleave('.creditCard', {
    creditCard: true,
    onCreditCardTypeChanged: function (type) {

    }
});


var cleave = new Cleave('.input-CVV', {
    blocks: [3],
    uppercase: true
})


var cleave = new Cleave('.input-expire', {
    date: true,
    datePattern: ['m', 'y']
});

// $(window).on("load",function(){
// 	$('.box').fadeOut("slow")
// })

// 	$('.box').fadeOut(3000)
