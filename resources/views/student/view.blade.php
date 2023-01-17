<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>student table</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>
        @if (session('status'))
            <div class="alert alert-success w-75 text-center mx-auto mt-5" role="alert">
                <h5 class=" text-center">{{ session('status') }}</h5>
            </div>
        @endif

        <table class="table table-bordered w-50 table-success mx-auto mt-5 caption-top align-middle">
            <caption> <a href="{{ route('student.create') }}" class="btn btn-success">add recored</a> </caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($student_data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ get_date($item->dob,"d-M-Y") }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>
                            <img src="{{ URL::asset('/storage/image/' . $item->image) }}" alt="" width="250"
                                height="150">
                        </td>
                        <td><a href="{{ 'student/' . $item['id'] . '/edit' }}" class="btn btn-success">edit</a></td>
                        <td>
                            <form action="{{ 'student/' . $item['id'] }}" method="post">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-success">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <span class="d-flex justify-center"> {{ $student_data->links() }} </span>
        <div class="d-flex justify-content-center">
            <div class=" pe-3 fs-3" >
                <a href="{{ $student_data->previousPageUrl() }} ">prev</a>
            </div>
            <div class=" fs-3"> 
                <a href="{{ $student_data->nextPageUrl() }} ">next</a>
            </div>
        </div>


        <style>
            .w-5 {
                display: none;
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </body>



    </html>
