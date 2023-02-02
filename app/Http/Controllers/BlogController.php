<?php

namespace App\Http\Controllers;

use App\Models\BlogGenre;
use App\Models\posttag;
use App\Models\tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Blog;
use Session;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('blog.index',compact("blogs"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('admin.index',compact("blogs"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $genreLists   = $this->makeDD(BlogGenre::orderBy('catagory')->pluck('catagory', 'id'));
//        dd($genreList);
        $tagLists = tag::all();
        $genreLists = BlogGenre::all();

        return view('admin.create', compact('genreLists','tagLists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$inputs = $request->all();
        //dd(auth()->user()->id);
        //return($inputs);
//        $validator = \Validator::make($inputs, array(
//            'title' => 'required|max:255',
//            'blog_genre_id' => 'required',
//            'description' => 'required',
//        ));

        $validator = validator(request()->all(), [
            'title'         => 'required|max:255',
            'blog_genre_id' => 'required|integer',
            'description'   => 'required',
            'status'        => 'required',
            'tags'          => 'required|array',
        ])->validate();

//        if ($validator->fails()) {
//            return Redirect()->back()->withErrors($validator)->withInput();
//        }

        $data['title']         = $validator['title'];
        $data['blog_genre_id'] = $validator['blog_genre_id'];
        $data['status']        = $validator['status'];
        $data['description']   = $validator['description'];
        $data['user_id']       = auth()->user()->id;

        $create_post = Blog::query()->create($data);

        $tags = $validator['tags'];

        $create_post->tags()->attach($tags);


       // $blog = new Blog();
        //Blog
//        $data = array(
//            'title' => $request->title,
//            'blog_genre_id' => (int)$request->blog_genre_id,
//            'status' => (int)$request->status,
//            'description' => $request->description,
//            //'created_at' => Carbon::now(),
//            //'created_at' => date('Y-m-d H:i:s', strtotime(Carbon::now())),
//            'user_id' => auth()->user()->id,
//        );
//        return $create_post->load('tags');
//        dd($data);
//        $blog->fill($data)->save();
//        $var = $blog->id;
//        $arrTags = $request->tags;
//        foreach ($arrTags  as $arrTag){
//            $data = array(
//                'tag_id' => (int)$arrTag,
//                'blog_id' => $var,
//            );
//            $tag = new posttag();
//            $tag->fill($data)->save();
//        }

        Session::flash('success', 'The Blog was created successfully!');
        return Redirect()->route('admin.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
