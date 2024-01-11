<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class TestController extends Controller
{
    //  write application logic here
    public function test(){
          $name = "ahmed";
            $age = 20;
            $skills=["html","css","js"];

            return view('test',['name'=>$name,'age'=>$age,'skills'=>$skills]);
    }


    public function greet(){
        return "hello from greet";
    }




    public function index(){
        // select * from posts;  ways query builder
        // eloquent model


        // dd()   == return and die
        $allPosts = Post::all();   // collection of objects
        //   علشان اخذ property in object    $post->title    -> is  operator  arrow
    //  dd($allPosts);
//
        return  view('posts.index' , compact('allPosts'));
    }



    public function show($id){
        // way query builder
        // $post = DB::table('posts')->where('id',$id)->first();
        // select * form post where id = $postId;
        // way = 1
        // $singlePostFormDB= Post::find($id);   // single model object
        //  way 2
        // $singlePostFormDB= Post::where('id', $id)->first();  // (id , $id )   id == $id
        // way 3
        // $singlePostFormDB= Post::where('id', $id)->get();  // (id , $id )   id == $id
        // used this get()  select * form post where title = php  ;
        // used this get() return   collection of objects  and    more than one object or record
        // used this first() return   single object  and    one object or record

        // important     used find()  return   single object  and    one object or record
        $singlePostFormDB =Post::findorfail($id);

        // way slove error 404 not found
        // if(is_null($singlePostFormDB)){
        //     return view('posts.index');
        // }
        // dd($singlePostFormDB);
        return view('posts.show' ,compact('singlePostFormDB'));


    }



    public function create(){
        $allUsers = User::all();
        return view('posts.create',compact('allUsers'));
    }
    public function store(Request $request){
        // validation
        $request->validate([
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:10|max:1000',
            'posted_by' => 'required|exists:users,id',
        ]);
        // first way
        // $data = $request->all();
        // return $data;
        // second way
        // $title = $request->input('title');
        // $posted_by = $request->input('posted_by');
        // $description  = $request->input('description');
        //  return to_route('BLOG.index');

        // way 1 store in database used eloquent model
        // $post = new Post; // create object from model class
        // $post->title = $request->input('title');
        // $post->description = $request->input('description');
        // $post->save();  // save in database or insert into posts (title , description) values ($title , $description)
        // return to_route('BLOG.index');
        // way 2 store in database used eloquent model
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $request->input('posted_by'),

        ]);
        return to_route('BLOG.index');







    }
    public function edit(Post $post ){

        $allUsers = User::all();

        return  view('posts.update',compact(['post','allUsers']));
    }
    public function update( Request $request , $id){
        // validation
        $request->validate([
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:10|max:1000',
            'posted_by' => 'required|exists:users,id',
        ]);
        $singlePostFormDB =Post::findorfail($id);
        $singlePostFormDB->update([
            'title' => request()->input('title'),
            'description' => request()->input('description'),
            'user_id' => request()->input('posted_by'),
        ]);

        return redirect()->route('BLOG.index');



    }
    public function destroy($id){

        $singlePostFormDB =Post::findorfail($id);
        $singlePostFormDB->delete();
        return redirect()->route('BLOG.index');
    }

}
