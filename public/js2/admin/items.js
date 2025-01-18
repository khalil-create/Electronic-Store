function downData(response) {
    $('#name').val(response.data['name']);
    $('#description').val(response.data['description']);
    $('#price').val(response.data['price']);
    $('#model_no').val(response.data['model_no']);
    $('#category_id').val(response.data['category_id']).change();

    $('#myform').attr('action', response.data2.update);
}

function deletePost(urldelet) {
    var data = {
        "_token": $('input[name=_token]').val(),
    };
    $.ajax({
        type: "DELETE",
        url: urldelet,
        data: data,
        // dataType: "data"
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
                    // .then((result) => {
                    //     location.reload();
                    // });
            }
        },
        error: function(response) {
            console.log('error: function(response)');
            if (response.responseJSON.message) {
                // swal('Error', response.responseJSON.message,
                //     'error');
                swal(response.responseJSON.message, {
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    });
}

function make_search(search_value) {
    var ajax_search_url = $("#ajax_search_url").val();
    var token_search = $("#token_search").val();
    jQuery.ajax({
        url: ajax_search_url,
        type: 'post',
        dataType: 'html',
        cache: false,
        data: {
            search_value: search_value,
            "_token": token_search,
        },
        success: function(data) {
            // console.log('dataaaaaaaaaaaaaaaaaa');
            // console.log(data);
            $("#ajax_responce_serarchDiv").html(data);
        },
        error: function() {}
    });
}
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.LikeBtn').click(function(e) {
        e.preventDefault();
        urlelike = $(this).closest("p").find('.url-like').val();
        is_authenticated = $(this).closest("p").find('#is_authenticated').val();
        console.log(is_authenticated);
        if (is_authenticated == 0) {
            swal({
                // title: 'Error',
                text: 'You must be signed in to like. Login?',
                icon: 'error',
                buttons: true
            }).then(function(isConfirmed) {
                console.log(isConfirmed);
                if (isConfirmed) {
                    window.location.href = '/login'; // Replace with your login page route
                }
            });
        } else {
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
                    } else {
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
        }
        // if (is_authenticated == 0) {
        //     console.log('kkkkkkkkkjjjjjjjjjjjjjjjjj');
        //     swal("You must be signed in to comment. Login?", {
        //         icon: "error",
        //         buttons: true,
        //     }).then((willLoging) => {
        //         if (willLoging) {
        //             console.log('llllllllllllllll');
        //             $.ajax({
        //                 url: '/login',
        //                 type: "GET",
        //                 data: {
        //                     "_token": "{{ csrf_token() }}"
        //                 },
        //                 // dataType: "json",
        //                 success: function(response) {
        //                     // if (response.status != 1) {
        //                     //     swal(response.msg, {
        //                     //         icon: "error",
        //                     //         button: "Ok",
        //                     //     });
        //                     // } else {
        //                     //     location.reload();
        //                     // }
        //                 },
        //                 error: function(response) {
        //                     console.log('error: function(response)');
        //                     if (response.responseJSON.message) {
        //                         swal(response.responseJSON.message, {
        //                             icon: "error",
        //                             button: "Ok",
        //                         });
        //                     }
        //                 }
        //             });
        //         }
        //     });
        // swal({
        //         title: "Are you sure to delete selected item?",
        //         text: "When you delete the selected item, you cannot recover it!",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //     })
        //     .then((willDelete) => {
        //         if (willDelete) {
        //             deleteItem(urldelet);
        //         }
        //     });

    });
    $('.ItemDeleteBtn').click(function(e) {
        e.preventDefault();
        var urldelet = $(this).closest("p").find('.url-delet').val();
        console.log(urldelet);
        swal({
                title: "Are you sure to delete selected item?",
                text: "When you delete the selected item, you cannot recover it!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    deletePost(urldelet);

                }
            });
    });

    $(document).on('input', '#search', function(e) {
        console.log($(this).val());
        make_search($(this).val());
    });
    $(document).on('click', '#ajax_pagination_in_search a ', function(e) {
        e.preventDefault();
        var search_value = $("#search").val();
        var token_search = $("#token_search").val();
        var url = $(this).attr("href");
        jQuery.ajax({
            url: url,
            type: 'post',
            dataType: 'html',
            cache: false,
            data: {
                search_value: search_value,
                "_token": token_search,
            },
            success: function(data) {
                $("#ajax_responce_serarchDiv").html(data);
            },
            error: function() {}
        });
    });
});
