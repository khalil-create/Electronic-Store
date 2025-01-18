function downData(response) {
    $('#name').val(response.data['name']);
    $('#phone_no').val(response.data['phone_no']);
    $('#username').val(response.data['username']);
    $('#status').val(response.data['status']).change();
    $('#type').val(response.data['type']).change();
    $('#email').val(response.data['email']);

    $('#myform').attr('action', response.data2.update);
}

$(document).ready(function() {
    $('.activateBtn').click(function(e) {
        e.preventDefault();
        urlactivate = $(this).closest("tr").find('.url-activate').val();

        $.ajax({
            url: urlactivate,
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                if (response.status == 1) {
                    swal(response.msg, {
                            icon: "success",
                            button: "Ok",
                        })
                        .then((result) => {
                            location.reload();
                        });
                } else {
                    swal(response.msg, {
                        icon: "error",
                        button: "Ok",
                    })
                }
            },
            error: function(response) {
                console.log('error: function(response)');
                if (response.responseJSON.message) {
                    swal('Error', response.responseJSON.message, 'error')
                        .then((result) => {
                            location.reload();
                        });
                }
            }
        });
    });
});