<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>


    <!-- Modal -->
    <div class="modal fade" id="addteacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">add teacher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="save_errorlist"></ul>
                    {{-- form --}}

                    <form action="{{ route('student.index') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input class="form-control name" type="text">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control email" type="email">

                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input class="form-control phone" type="text">
                        </div>

                        {{-- form --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_teacher">Save </button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit teacher model --}}

    <div class="modal fade" id="edittecher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">edit teacher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="update_errorlist"></ul>
                    {{-- form --}}

                    <form action="{{ route('student.index') }}" method="post">
                        @csrf
                        <input type="hidden" id="edit_teacher_id">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input class="form-control name" id="edit_name" type="text">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control email" id="edit_email" type="email">

                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input class="form-control phone" id="edit_phone" type="text">
                        </div>

                        {{-- form --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_teacher">update </button>
                </div>
            </div>
        </div>
    </div>

    {{-- end edit teacher model --}}
    {{-- delete teacher model --}}
    <div class="modal fade" id="deletetecher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">delete teacher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="update_errorlist"></ul>
                    {{-- form --}}
                    <form>
                        @csrf 
                        @method('DELETE')
                        <input type="text" id="delete_teacher_id">
                        <h4>Are you sure? want to delete this data?</h4>
                    </form>

                    {{-- form --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_teacher_btn">delete </button>
                </div>
            </div>
        </div>
    </div>

    {{-- delete teacher model --}}

    <div id=" success_message"></div>
    <div id="success"></div>
    <table class="table table-bordered w-50 table-success mx-auto mt-5 caption-top align-middle teacher-table">
        <caption><a href="" class="btn btn-info " data-bs-toggle="modal" data-bs-target="#addteacher">add
                teacher </a> </caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

        </tbody>
    </table>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {

            $.ajax({
                type: "GET",
                url: "/fetch-teacher",
                datatype: "json",
                success: function(response) {
                    $.each(response.teacher, function(key, item) {
                        $('tbody').append('<tr><td>' + item.id + '</td><td>' + item
                            .name +
                            ' </td><td>' + item.email + ' </td><td>' + item
                            .phone +
                            ' </td><td> <button type = "button" value = "' +
                            item.id +
                            '" class = "edit_techer btn btn-info" > edit </button></td ><td> <button type = "button" value = "' +
                            item.id +
                            '" class = "delete_techer btn btn-danger"> delete </button></td></tr>'
                        );
                    })


                }
            });


            // edit/ featch  teacher data  into form 

            $(document).on('click', '.edit_techer', function(e) {
                e.preventDefault();
                var techer_id = $(this).val();
                $('#edittecher').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/edit-teacher/" + techer_id,
                    success: function(response) {
                        if (response.status == 404) {
                            $('#success').html("");
                            $('#success').addClass('alert alert-danger');
                            $('#success').text(response.message);
                        } else {
                            $('#edit_name').val(response.teacher.name);
                            $('#edit_email').val(response.teacher.email);
                            $('#edit_phone').val(response.teacher.phone);
                            $('#edit_teacher_id').val(techer_id);
                        }
                    }
                });
            });

            // update  teacher data   

            $(document).on('click', '.update_teacher', function(e) {
                e.preventDefault();
                var techer_id = $('#edit_teacher_id').val();

                var data = {
                    'name': $('#edit_name').val(),
                    'email': $('#edit_email').val(),
                    'phone': $('#edit_phone').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/update-teacher/" + techer_id,
                    data: data,
                    datatype: "json",
                    success: function(response) {
                        //    console.log(response);

                        if (response.status == 400) {
                            $('#update_errorlist').html("");
                            $('#update_errorlist').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#update_errorlist').append('<li>' + err_values +
                                    '</li>');
                            });
                        } else if (response.status == 404) {
                            $('#update_errorlist').html("");
                            $('#success').addClass('alert alert-success w-50 mx-auto mt-5')
                            $('#success').text(response.message)
                        } else {
                            $('#update_errorlist').html("");
                            $('#success').html("");
                            $('#success').addClass('alert alert-success  w-50 mx-auto mt-5')
                            $('#success').text(response.message)
                            $('#edittecher').modal('hide');
                            // location.reload();
                        }
                    }
                });
            });


            // insert teacher data

            $(document).on('click', '.add_teacher', function(e) {
                e.preventDefault();
                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'phone': $('.phone').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "/teacher",
                    data: data,
                    datatype: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#save_errorlist').html("");
                            $('#save_errorlist').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#save_errorlist').append('<li>' + err_values +
                                    '</li>');
                            })
                        } else {

                            $('#save_errorlist').html("");
                            $('#success').addClass('alert alert-success')
                            $('#success').text(response.message)
                            $('#addteacher').modal('hide');
                            $('#addteacher').find('input').val("");
                            location.reload();
                        }
                    }
                })

            });


            // delete teacher data


            $(document).on('click', '.delete_techer', function(e) {
                e.preventDefault();
                var techer_id = $(this).val();
                console.log(techer_id);
                $('#delete_teacher_id').val(techer_id)
                $('#deletetecher').modal('show')
            });
            $(document).on('click', '.delete_teacher_btn', function(e) {
                e.preventDefault();
                var techer_id = $('#delete_teacher_id').val(techer_id)

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/delete-teacher/" + techer_id,
                    success: function(response) {
                        $('#success').addClass('alert alert-success w-50 mx-auto mt-5')
                        $('#success').text(response.message)
                        $('#deletetecher').modal('hide')
                    }
                });
            });     
        });
    </script>
</body>

</html>
