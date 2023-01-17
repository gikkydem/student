<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blade template</title>
</head>

<body>
    <p>welcome</p>{!! $name !!}


    @if ($name == '')
        {{ 'name is empty' }}
    @elseif($name == 'bhumi')
        {{ 'name is correct' }}
    @else
        {{ 'name is not correct' }}
    @endif
    <br>
    <br><b>isset</b>
    <br>
    @isset($name)
        {{ $name }}
    @endisset
    <br>
    <br><b>for</b>
    <br>

    @for ($i = 1; $i < 6; $i++)
        {{ $i }}
    @endfor


    @php
        $i = 1;
    @endphp


    @while ($i <= 5)
        <h5>{{ $i }}</h5>
        @php
            $i++;
        @endphp
    @endwhile
    <br> <br> <br>
    @php
        $arr = [1, 2, 3, 4, 5, 6];
    @endphp
    @foreach ($arr as $item)
        {{ $item }}
    @endforeach
</body>

</html>
