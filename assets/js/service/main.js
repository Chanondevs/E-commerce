function addCart(id){
    $.ajax({
        type: 'POST',
        url: '127.0.0.1/service/add-product.php',
        dataType: 'json',
        data: {
            id
        },
        success: function(data) {
            if (data.status == "success") {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true
                })
                Toast.fire({
                    icon: data.status,
                    title: data.message
                }).then((result) => {
                    if (result.isDismissed) {
                        window.location.href = data.href;
                    }
                })
            } else {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true
                })
                Toast.fire({
                    icon: data.status,
                    title: data.message
                }).then((result) => {
                    if (result.isDismissed) {
                        window.location.href = data.href;
                    }
                })
            }
        }
    })
}