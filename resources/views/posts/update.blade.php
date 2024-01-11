@extends('layouts.app')
@section('title' )  update @endsection
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
<form action="{{ route('posts.update' ,  $post->id) }}" method="post">
    @csrf
    @method('put')
    <div  class="text-center mt-5 mb-3">

         <h3> update Posts </h3>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">title</label>
      <input type="text"  name="title"  value="{{ $post->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">description</label>
        <textarea class="form-control"    name="description"  id="exampleFormControlTextarea1" rows="3"> {{ $post->description }}</textarea>
      </div>
      <div>
        <label for="posted_by">posted creater</label>
        <select name="posted_by" id="posted_by" class="form-control">
            @foreach (    $allUsers as $alluser )

            <option   @if ($alluser->id == $post->user_id)
                selected

            @endif value="{{ $alluser->id }}">{{ $alluser->name }}</option>
            @endforeach


          </select>

    <button type="submit" class="btn btn-primary mt-5">update</button>
</form>


</div>

@endsection
