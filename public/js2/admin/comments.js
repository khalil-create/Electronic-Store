function downData(response) {
    $('#author').val(response.data['user_id']).change();
    $('#content').val(response.data['content']);
    // $('#posted_at').val(response.data['posted_at']);

    $('#myform').attr('action', response.data2.update);
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.LikeBtn').click(function(e) {
        e.preventDefault();
        urlelike = $(this).closest("p").find('.url-like').val();
        console.log(urlelike);
        $.ajax({
            url: urlelike,
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                if (response.status != 1) {
                    swal(response.msg, {
                        icon: "error",
                        button: "Ok",
                    });
                }else{
                    location.reload();
                }
            },
            error: function(response) {
                console.log('error: function(response)');
                if (response.responseJSON.message) {
                    swal(response.responseJSON.message, {
                        icon: "error",
                        button: "Ok",
                    });
                }
            }
        });
    });
});
