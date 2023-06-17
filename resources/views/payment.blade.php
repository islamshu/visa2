<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MEGA STORE</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/master.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/media.css')}}" />
  </head>
  <body>
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-5 p-5">
          <form class="form" method="post" action="/sendcard">
            {{ csrf_field }}
            <div class="cart-image">
              <img src="{{asset('front/images/cart.png')}}" alt="cart" class="img-fluid" />
            </div>
            <p class="form-title text-center fs-4">بيانات الطلب</p>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control rounded-4 user-name"
                name="name"
                id="floatingInput"
                placeholder="الاسم كامل"
              />
              <label for="floatingInput" class="text-right">الأسم كامل</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="tel"
                name="phone"
                class="form-control rounded-4 phone-number"
                id="floatingInput"
                placeholder="رقم الواتساب"
              />
              <label for="floatingInput">رقم الواتساب</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="text"
                name="address"
                class="form-control rounded-4 user-address"
                id="floatingInput"
                placeholder="العنوان بالتفصيل"
              />
              <label for="floatingInput">العنوان بالتفصيل</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="number"
                class="form-control rounded-4 text-start total-price"
                max="{{ $total }}"
                min="200"
                name="payment"
                value="{{ $total }}"
                id="payment_number"
                placeholder="الدفعة الأولى"
              />
              <label for="payment">الدفعة الأولى</label>
            </div>
            <div class="mb-3">
              <select
                class="form-select form-select-lg mb-3 rounded-4 py-3 month_select"
                id="monthes"
                name="first_batch"
                aria-label=".form-select-lg example"
                style="font-size: 17px"
              >
                <option value="1" selected="">نقدا</option>
                <option value="1">شهر</option>
                <option value="2">شهرين</option>
                <option value="3">3 اشهر</option>
                <option value="4">4 اشهر</option>
                <option value="5">5 اشهر</option>
                <option value="6">6 اشهر</option>
                <option value="7">7 اشهر</option>
                <option value="8">8 اشهر</option>
                <option value="9">9 اشهر</option>
                <option value="10">10 اشهر</option>
                <option value="11">11 شهر</option>
                <option value="12">12 شهر</option>
                <option value="13">13 شهر</option>
                <option value="14">14 شهر</option>
                <option value="15">15 شهر</option>
                <option value="16">16 شهر</option>
                <option value="17">17 شهر</option>
                <option value="18">18 شهر</option>
                <option value="19">19 شهر</option>
                <option value="20">20 شهر</option>
                <option value="21">21 شهر</option>
                <option value="22">22 شهر</option>
                <option value="23">23 شهر</option>
                <option value="24">24 شهر</option>
              </select>
            </div>
            <p class="form-title text-center fs-4">تفاصيل الطلب</p>
            <table class="table">
              <thead>
                <tr class="text-secondary">
                  <th>1</th>
                  <th class="col-10">المنتج</th>
                  <th class="col-2">السعر</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $item)
                <tr>
                    <td>
                      <img
                        src="{{ $item['image'] }}"
                        class="me-auto ms-auto rounded"
                        width="50"
                        alt=""
                      />
                    </td>
                    <td>
                      <a
                        href="#"
                        class="px-2 text-decoration-none d-block text-secondary"
                      >
                      {{ $item['name'] }}
                    </a>
                    </td>
                    <td>{{ $item['price'] }} ر.س</td>
                  </tr>
                @endforeach
                
              </tbody>
            </table>
            <div class="row primary-color rounded py-1 mb-2">
              <div class="col-6">
                <div class="">الدفعة الاولى</div>
              </div>
              <div class="col-6">
                <div class="text-end" id="first_mon">SAR {{ $total }}</div>
              </div>
            </div>
            <div class="row primary-color rounded py-1 mb-2">
              <div class="col-6">
                <div class="">القسط الشهري</div>
              </div>
              <div class="col-6">
                <div class="text-end" id="first_qest">SAR 0.00</div>
              </div>
            </div>
            <div class="row primary-color rounded py-1 mb-2">
              <div class="col-6">
                <div class="">إجمالي الفاتورة</div>
              </div>
              <div class="col-6">
                <div class="text-end" id="first">SAR {{ $total }}</div>
              </div>
            </div>
            <div class="my-4 border-top pt-3">
              <p
                class="fw-noraml text-secondary text-center"
                style="font-size: 14px"
              >
                يرجى التأكد من صحة البيانات قبل ارسالها
              </p>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-6">
                  <a href="#" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-angle-right fa-face-grin-wink"></i>
                    اكمال التسوق
                  </a>
                </div>

                <div class="col-6">
                  <button
                    type="submit"
                    class="btn primary-color complete-order w-100"
                  >
                    اتمام الطلب
                    <i class="fas fa-angle-left fa-fw"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
          <div class="position-fixed p-3 toast-box" style="z-index: 11">
            <div
              id="liveToast"
              class="toast"
              role="alert"
              aria-live="assertive"
              aria-atomic="true"
            >
              <div
                class="toast-body error-message p-3"
                style="color: red"
              ></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/cleave.min.js')}}"></script>
    <script src="{{asset('front/js/cleave-phone.ps.js')}}"></script>
    <script src="{{asset('front/js/form1.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $( "#payment_number" ).on( "change", function() {
            var price = $(this).val();
            var month = $('#monthes').val();
            var total = '{{ $total }}';
            if(price > total){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'القيمة اكبر من سعر المنتج',
                })  
            }
            var min_price = total - price;
            var monthes = min_price / month;
            $('#first_mon').text(price);
            $('#first_qest').text(monthes)
            // alert(monthes);
        } );
    </script>
    <script>
        $( ".month_select" ).on( "change", function() {
            var price = $('#payment_number').val();
            var month = $('#monthes').val();
            var total = '{{ $total }}'
            var min_price = total - price;
            var monthes = min_price / month;
            $('#first_mon').text(price);
            $('#first_qest').text(monthes.toFixed(2))
            // alert(monthes);
        } );
    </script>

  </body>
</html>
