// Toast Functions
function toast({ 
        title = '',
        message = '',
        type = 'info',
        duration = 3000
    }) {
        const main = document.getElementById('toast');
        if (main) { 
            const toast = document.createElement('div');

            //Auto remove toast
            const autoRemove = setTimeout(function() {
                main.removeChild(toast);
            }, duration + 1000);

            //Remove toast when clicked
            toast.onclick = function(e) {
                if(e.target.closest('.toast__close')) {
                    main.removeChild(toast);
                    clearTimeout(autoRemove);
                }
            }

            const icons = {
                success : 'fa-circle-check',
                info : 'fa-circle-info',
                warning : 'fa-circle-exclamation',
                error: 'fa-circle-exclamation',
            };
            const icon = icons[type];
            const delay = (duration/1000).toFixed(2);

            toast.classList.add('toast', `toast--${type}`);
            toast.style.animation = `slideInLeft ease .5s,
                                    fadeOut linear 1s ${delay}s forwards`;
            
            toast.innerHTML = `
                <div class="toast__icon">
                    <i class="fa-solid ${icon}"></i>
                </div>

                <div class="toast__body">
                    <h3 class="toast__title">${title}</h3>
                    <p class="toast__msg">${message}</p>
                </div>

                <div class="toast__close">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
            `;
            main.appendChild(toast);
        }
}


function showSuccessToast() {
    toast({
        title:'Thành Công!',
        message: 'Đăng Kí Thành Công!',
        type: 'success',
        duration: 1000,
    })
}

function showErrorToast() {
    toast({
        title:'Thất bại!',
        message: 'Vui lòng điền đầy đủ thông tin!',
        type: 'error',
        duration: 3000,
    })
}