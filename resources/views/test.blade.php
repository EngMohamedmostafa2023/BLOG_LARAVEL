@php


    $x= 10;
    $y= 20;
    $z= $x + $y;
    // $book = ['php' , 'laravel' , 'javascript' , 'vuejs' , 'reactjs' , 'angular' , 'nodejs' , 'python' , 'ruby' , 'java' , 'c++' , 'c#']

@endphp
{{ $name }}

<br
{{ $age }}


 @foreach ($skills as $value )

     {{ $value }}

 @endforeach
