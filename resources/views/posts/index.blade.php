      @extends('layouts.app')
        @section('title' )  index @endsection

      @section('content')
      <div  class="w-100   text-center  mt-5">
        {{-- <button  class="btn btn-primary ">Create Posts</button> --}}
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Posts</a>
      </div>

      <div  class="mt-5 mx-5 ">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">posted by </th>
                <th scope="col">create at</th>
                <th scope="col">actions</th>



              </tr>
            </thead>

            @foreach ($allPosts  as $post )
            {{-- @dd($post , $allPosts) --}}
            <tbody>
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td >{{ $post->title }}</td>

                <td >{{ $post->user->name }}</td>
                <td >{{ $post->created_at->format('y-m-d') }}</td>
                <td >
                     <a class="btn btn-info"    href=" {{route('posts.show' , $post->id)}}">view</a>
                     <a  class="btn btn-primary"  href="{{ route('posts.edit' , $post->id) }}">edit</a>


                     <form  style="display: inline" action="{{ route('posts.destroy' ,$post->id) }}"  method="post">
                        @csrf
                        @method('delete')
                        <button onclick=" confirm('do you want to delete this post ')" type="submit"  class="btn btn-danger  "  href="{{ route('posts.destroy' , $post['id'])  }}">delete</button>

                     </form>



                </td>





              </tr>
            </tbody>
            @endforeach
          </table>
      </div>
        @endsection
