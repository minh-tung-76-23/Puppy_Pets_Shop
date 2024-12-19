const iconLoading = document.getElementById("loading");

const hideError = (element) => {
    element.style.display = "none";
};

const showLoading = () => {
    iconLoading.style.display = "flex";
};

const hideLoading = () => {
    iconLoading.style.display = "none";
};

const onSubmitForm = () => {
    showLoading();
    setTimeout(() => {
            swal(
            "",
            "Tên đăng nhập hoặc mật khẩu không chính xác !",
            "error"
        );
        hideLoading();
    }, 1000);
};
