const countElements = document.querySelectorAll(".count");
const decrementButtons = document.querySelectorAll(".decrement");
const incrementButtons = document.querySelectorAll(".increment");

function updateCount(event, index) {
  let count = parseInt(countElements[index].value, 10);
    if (event.target.classList.contains("decrement")) {
        if (count > 0) {
            count--;
        }
    } else if (event.target.classList.contains("increment")) {
        count++;
    }
    countElements[index].value = count;
}

for (let i = 0; i < countElements.length; i++) {
    decrementButtons[i].addEventListener("click", (event) => updateCount(event, i));
    incrementButtons[i].addEventListener("click", (event) => updateCount(event, i));
}

// ---------------Select img
    // Lấy các phần tử cần sử dụng
    const bigImage = document.getElementById('big_Img');
    const smallImages = document.querySelectorAll('.small_Img');

    // Sử dụng vòng lặp để thêm xử lý sự kiện click cho các ảnh nhỏ
    smallImages.forEach(smallImage => {
        smallImage.addEventListener('click', () => {
            // Thay đổi src của ảnh lớn bằng src của ảnh nhỏ vừa click
            bigImage.src = smallImage.src;
        });
    });


//------------------------ PRODUCT
const tabInfo = document.querySelector('.tab_info');
const tabCustom = document.querySelector('.tab_custom');
const tabEvaluate = document.querySelector('.tab_evaluate');
const buyProduct = document.querySelector('.btn_buy-pdt');

// Đến trang cart
    // Thêm sự kiện click cho button
if (buyProduct) {
  buyProduct.addEventListener("click", function() {
    // Chuyển hướng trang đến delivery.html
    window.location.href = "cart.html";
});
}

//--- Di chuyển giữa các tab
if (tabCustom) {
  tabCustom.addEventListener("click", function() {
    document.querySelector('.product_info').style.display = "none";
    document.querySelector('.product_evaluate').style.display = "none";
    document.querySelector('.product_custom').style.display = "block";

    // Xóa lớp 'current' khỏi tất cả các tab
    document.querySelector('.tab_info').classList.remove('current');
    document.querySelector('.tab_evaluate').classList.remove('current');

    // Đánh dấu tab hiện tại là 'custom'
    tabCustom.classList.add('current');
  });
}

if (tabEvaluate) {
  tabEvaluate.addEventListener("click", function() {
    document.querySelector('.product_info').style.display = "none";
    document.querySelector('.product_custom').style.display = "none";
    document.querySelector('.product_evaluate').style.display = "block";

    // Xóa lớp 'current' khỏi tất cả các tab
    document.querySelector('.tab_info').classList.remove('current');
    document.querySelector('.tab_custom').classList.remove('current');

    // Đánh dấu tab hiện tại là 'evaluate'
    tabEvaluate.classList.add('current');
  });
}

if (tabInfo) {
  tabInfo.addEventListener("click", function() {
    document.querySelector('.product_custom').style.display = "none";
    document.querySelector('.product_evaluate').style.display = "none";
    document.querySelector('.product_info').style.display = "block";

    // Xóa lớp 'current' khỏi tất cả các tab
    document.querySelector('.tab_custom').classList.remove('current');
    document.querySelector('.tab_evaluate').classList.remove('current');

    // Đánh dấu tab hiện tại là 'info'
    tabInfo.classList.add('current');
  });
}

//------------------------ CART
const returnPage = document.querySelector('.return_page');
const nextPage = document.querySelector('.next_page');

// Đến trang cart

if(returnPage) {
  returnPage.addEventListener("click", function() {
    // Chuyển hướng trang đến product.html
    history.back();
  });
}
 
if (nextPage) {
  nextPage.addEventListener('click', () => {
    // Chuyển hướng trang đến delivery.html
    window.location.href = "delivery.html";
  })
}

// ---------------------DELIVERY
// Lấy tham chiếu đến button "ĐẶT HÀNG"
const placeOrderButton = document.querySelector(".place_order-btn");

// Thêm sự kiện click cho button "ĐẶT HÀNG"
placeOrderButton.addEventListener("click", function() {
    // Lấy tham chiếu đến tất cả các trường input
    const emailInput = document.getElementById("email");
    const fullnameInput = document.getElementById("fullname");
    const phoneInput = document.getElementById("phone");
    const addressInput = document.getElementById("address");
    const cityInput = document.getElementById("city");
    const districtInput = document.getElementById("district");
    const wardInput = document.getElementById("ward");

    // Kiểm tra xem tất cả các trường đã được điền đầy đủ hay chưa
    if (
        emailInput.value.trim() !== "" &&
        fullnameInput.value.trim() !== "" &&
        phoneInput.value.trim() !== "" &&
        addressInput.value.trim() !== "" &&
        cityInput.value.trim() !== "" &&
        districtInput.value.trim() !== "" &&
        wardInput.value.trim() !== ""
    ) {
        // Nếu đã điền đầy đủ, chuyển hướng tới trang "payment.html"
        window.location.href = "payment.html";
    } else {
        // Nếu chưa điền đầy đủ, thông báo lỗi
        alert("Vui lòng điền đầy đủ thông tin trước khi đặt hàng.");
    }
});





