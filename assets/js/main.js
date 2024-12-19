// Lấy tên trang hiện tại từ biến PHP
const currentPage = document.documentElement.getAttribute("data-current-page");

// Kiểm tra tên trang và thực hiện mã JavaScript chỉ trên trang đó
if (currentPage === "product.php") {
//------------------------ PRODUCT
  const countElements = document.querySelectorAll(".count");
  const decrementButtons = document.querySelectorAll(".decrement");
  const incrementButtons = document.querySelectorAll(".increment");

  function updateCount(event, index) {
    event.preventDefault();
    let count = parseInt(countElements[index].value, 10);
      if (event.target.classList.contains("decrement")) {
          if (count > 1) {
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

  const tabInfo = document.querySelector('.tab_info');
  const tabCustom = document.querySelector('.tab_custom');
  const tabEvaluate = document.querySelector('.tab_evaluate');
  const buyProduct = document.querySelector('.btn_buy-pdt');

  // Đến trang cart
      // Thêm sự kiện click cho button
  if (buyProduct) {
    buyProduct.addEventListener("click", function() {
      // Chuyển hướng trang đến delivery.html
      window.location.href = "cart.php";
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
} else if (currentPage === "delivery.php") {
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
      const paymentMethod= document.getElementById("payment_method");

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
        if (paymentMethod.value == "online") {
          // Nếu đã điền đầy đủ, chuyển hướng tới trang "payment.html"
          window.location.href = "payment.php";
        } 
      } else {
          // Nếu chưa điền đầy đủ, thông báo lỗi
          showErrorToast();
      }
  });
} else if (currentPage === "cart.php") {
  //------------------------ CART
  const returnPage = document.querySelector('.return_page');
  const nextPage = document.querySelector('.next_page');

  // Đến trang cart

  if(returnPage) {
    returnPage.addEventListener("click", function() {
      window.location.href = "category.php?quanly=category&id=7";
    });
  }

  if (nextPage) {
    nextPage.addEventListener('click', () => {
      window.location.href = "delivery.php";
    })
  }
} else if (currentPage === "service.php")  { 
  document.addEventListener('DOMContentLoaded', function () {
    // Lấy ra tất cả các phần tử cần sử dụng
    var itTops = document.querySelectorAll('.it-top');

    // Lặp qua từng phần tử và thêm sự kiện click
    itTops.forEach(function (itTop) {
        itTop.addEventListener('click', function () {
            // Lấy ra phần tử .service_bottom-item-ct tương ứng với .it-top được click
            var ctItem = itTop.nextElementSibling;

            // Lấy ra phần tử <i> tương ứng với .it-top được click
            var arrowIcon = itTop.querySelector('i');

            // Kiểm tra nếu có class select thì loại bỏ, ngược lại thêm vào
            if (itTop.classList.contains('select')) {
                itTop.classList.remove('select');
            } else {
                itTop.classList.add('select');
            }

            // Kiểm tra nếu đang ẩn hoặc có class select thì hiển thị và ngược lại
            if (ctItem.style.display === 'none' || itTop.classList.contains('select')) {
                ctItem.style.display = 'block';
                arrowIcon.className = 'fa-solid fa-angle-up'; // Đổi icon khi hiển thị
            } else {
                ctItem.style.display = 'none';
                arrowIcon.className = 'fa-solid fa-angle-down'; // Đổi icon khi ẩn
            }
        });
    });
  });
} else if (currentPage === "servicetronggiu.php") {
  document.addEventListener('DOMContentLoaded', function() {
      var txtTime = document.getElementsByName('txtinfo')[0];
      var txtTotal = document.getElementsByName('txttotal')[0];

      txtTime.addEventListener('input', function() {
          var timeValue = parseInt(txtTime.value);
          // Tính thành tiền: 60.000₫/ngày * số ngày
          var totalValue = 60000 * timeValue;

          // Hiển thị giá trị vào ô nhập liệu thành tiền
          txtTotal.value = totalValue.toLocaleString() + '₫';
      });
  });
} else if (currentPage === "servicetamthucung.php") {
  document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện thay đổi trên thẻ select
    document.querySelector('select[name="txtinfo"]').addEventListener('change', function (event) {
        // Lấy giá trị đã chọn
        var selectedOption = event.target.value;

        // Gán giá trị tương ứng vào thẻ "Thành tiền"
        var totalInput = document.querySelector('input[name="txttotal"]');
        if (selectedOption === "Tắm cơ bản") {
            totalInput.value = "270.000₫";
        } else if (selectedOption === "Tắm Combo") {
            totalInput.value = "400.000₫";
        } else if (selectedOption === "Sạch toàn thân") {
            totalInput.value = "500.000₫";
        }
    });
});
} else if (currentPage === "servicecattialong.php") {
  document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện thay đổi trên thẻ select
    document.querySelector('select[name="txtinfo"]').addEventListener('change', function (event) {
        // Lấy giá trị đã chọn
        var selectedOption = event.target.value;

        // Gán giá trị tương ứng vào thẻ "Thành tiền"
        var totalInput = document.querySelector('input[name="txttotal"]');
        if (selectedOption === "Chỉ cắt") {
            totalInput.value = "250.000₫";
        } else if (selectedOption === "Cắt tỉa cơ bản") {
            totalInput.value = "320.000₫";
        } else if (selectedOption === "Đẹp tòan diện") {
            totalInput.value = "550.000₫";
        } 
    });
});
} else if (currentPage === "servicecuuhothucung.php") {
  document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện thay đổi trên thẻ select
    document.querySelector('select[name="txtinfo"]').addEventListener('change', function (event) {
        // Lấy giá trị đã chọn
        var selectedOption = event.target.value;

        // Gán giá trị tương ứng vào thẻ "Thành tiền"
        var totalInput = document.querySelector('input[name="txttotal"]');
        if (selectedOption === "Đặt lịch") {
            totalInput.value = "250.000₫";
        } else if (selectedOption === "Tại nhà") {
            totalInput.value = "350.000₫";
        } else if (selectedOption === "Khẩn cấp") {
            totalInput.value = "500.000₫";
        } 
    });
});
} else if (currentPage === "servicespathucung.php") {
  document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện thay đổi trên thẻ select
    document.querySelector('select[name="txtinfo"]').addEventListener('change', function (event) {
        // Lấy giá trị đã chọn
        var selectedOption = event.target.value;

        // Gán giá trị tương ứng vào thẻ "Thành tiền"
        var totalInput = document.querySelector('input[name="txttotal"]');
        if (selectedOption === "Spa cơ bản") {
            totalInput.value = "150.000₫";
        } else if (selectedOption === "Spa toàn diện") {
            totalInput.value = "350.000₫";
        } 
    });
});
} else if (currentPage === "servicechamsocthucung.php") {
  document.addEventListener("DOMContentLoaded", function () {
    // Lắng nghe sự kiện thay đổi trên thẻ select
    document.querySelector('select[name="txtinfo"]').addEventListener('change', function (event) {
        // Lấy giá trị đã chọn
        var selectedOption = event.target.value;

        // Gán giá trị tương ứng vào thẻ "Thành tiền"
        var totalInput = document.querySelector('input[name="txttotal"]');
        if (selectedOption === "Chăm sóc lẻ") {
            totalInput.value = "80.000₫";
        } else if (selectedOption === "Chăm sóc cơ bản") {
            totalInput.value = "300.000₫";
        }  else if (selectedOption === "Chăm sóc toàn diện") {
          totalInput.value = "450.000₫";
        } 
    });
});
}

function showBrandInfo(categoryId) {
  // Thực hiện ajax request để lấy dữ liệu từ tbl_brand dựa trên category_id
  $.get("get_brand_info.php", { category_id: categoryId }, function (data) {
      // Hiển thị thông tin thương hiệu trong div có id tương ứng
      $("#brand-info-" + categoryId).html(data);
  });
}








