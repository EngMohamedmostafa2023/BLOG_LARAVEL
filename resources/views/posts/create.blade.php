@extends('layouts.app')
@section('title' )  create @endsection
@section('content')

<div class="mx-5">


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">title</label>
      <input type="text"  value="{{ old('title  ') }}"   name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">description</label>
        <textarea class="form-control"  name="description"  id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div>
        <label for="posted_by">posted creater</label>


        <select name="posted_by" id="posted_by" class="form-control">
            @foreach (    $allUsers as $alluser )

            <option value="{{ $alluser->id }}">{{ $alluser->name }}</option>
            @endforeach


          </select>

    <button type="submit" class="btn btn-primary mt-5">Submit</button>
</form>


</div>
















@endsection
