function downData(response) {
    $('#name').val(response.data['name']);
    $('#description').val(response.data['description']);

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