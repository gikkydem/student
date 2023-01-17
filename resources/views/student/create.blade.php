<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('student.index') }}" method="post" enctype="multipart/form-data"
        class="w-50 mx-auto border p-5 m-5 rounded border-info border-3">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name"
                value="{{ old('name') }}">
            @error('name')
                <p class="invalid-feedback ">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" >
            @error('email')
                <p class="invalid-feedback ">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <p class="invalid-feedback ">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Date of Birth</label>
            <input class="form-control @error('dob') is-invalid @enderror" type="date" name="dob" value="{{ old('dob') }}">
            @error('dob')
                <p class="invalid-feedback ">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Gender</label><br>
            <input type="radio" name="gender" value="female">female
            <input type="radio" name="gender" value="male">male
        </div>

        <div class="mb-3">
            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" value="{{ old('image') }}">
            @error('image')
                <p class="invalid-feedback ">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="submit" name="submit">
        </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
