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


    <form action="{{ url('student/' . $student->id) }}" method="post" enctype="multipart/form-data"
        class="w-50 mx-auto border p-5 m-5 rounded border-info border-3 caption-top">
        <caption>
            <h3>update recorde</h3>
        </caption>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input class="form-control  @error('name') is-valid @enderror" type="text" name="name"
                value="{{ $student->name }}">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input class="form-control @error('email') is-valid @enderror" type="email" name="email" id=""
                value="{{ $student->email }}">
            @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input class="form-control  @error('phone') is-valid @enderror" type="text" name="phone"
                value="{{ $student->phone }}">
            @error('phone')
                <p class="invalid-feedback ">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Date of Birth</label>
            <input class="form-control  @error('dob') is-valid @enderror" type="date" name="dob"
                value="{{ $student->dob }}">
            @error('dob')
                <p class="invalid-feedback ">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Gender</label><br>
            <input type="radio" name="gender" value="female"
                {{ old('gender', $student->gender) === 'female' ? 'checked' : '' }}>female
            <input type="radio" name="gender" value="male"
                {{ old('gender', $student->gender) === 'male' ? 'checked' : '' }}>male
        </div>

        <div class="mb-3">
            <input class="form-control  @error('image') is-valid @enderror" type="file" name="image"
                id="">
            <img src="{{ url('/uploads/students/' . $student->image) }}" alt="" width="250" height="150">
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
