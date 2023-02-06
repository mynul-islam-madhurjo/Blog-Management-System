<?php

namespace App\Http\Controllers;

use App\Models\BlogGenre;
use App\Models\posttag;
use App\Models\tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Session;
use File;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('user')->latest()->paginate(5);
        return view('blog.index',compact("blogs"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $blogs = Blog::with('tags')->latest()->paginate(5);
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
            'blog_image'    => 'required|mimes: jpg,jpeg,png',
        ])->validate();

/*        $inputs = $request->all();
        dd($inputs);*/

        $blog_image = $request->file('blog_image');
        //random id
        $name_gen = hexdec(uniqid());
        //jpg
        $img_ext = strtolower($blog_image->getClientOriginalExtension());
        $img_name = $name_gen. '.' . $img_ext;
        $img_loc = 'images/blog/';
        //$var = File::isDirectory($img_loc);
        //dd(!File::isDirectory($img_loc));

        if (!File::isDirectory($img_loc)){
            File::makeDirectory($img_loc, 0777, true, true);
        }

        $img_upload = $img_loc.$img_name;
        $blog_image->move($img_loc,$img_name);


//        if ($validator->fails()) {
//            return Redirect()->back()->withErrors($validator)->withInput();
//        }

        $data['title']         = $validator['title'];
        $data['blog_genre_id'] = $validator['blog_genre_id'];
        $data['status']        = $validator['status'];
        $data['description']   = $validator['description'];
        $data['user_id']       = auth()->user()->id;
        $data['blog_image']    = $img_upload;

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
        $blog = Blog::with('tags')->with('user')->with('genre')->find($id);



        return view('admin.show', compact('blog'));
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
        $tags = tag::all();
        $genres = BlogGenre::all();
        $blogs = Blog::with('tags')->find($id);

        //$tags = tag::where();



        $statuses = array(
            '1' => 'Active',
            '2' => 'Inactive'
        );

        //return $blogs;


/*        $tags = DB::table('blog_tag')
            ->join('blog', 'blog_tag.blog_id', '=', 'blog.id')
            ->join('tags','blog_tag.tag_id','=','tags.name')
            ->where('blog.id',$id)
            ->select('tags.name')
            ->get();*/

        return view('admin.edit', compact('tags','blogs','genres','statuses'));

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
        $validator = $request->validate([
            'title'         => 'required|max:255',
            'blog_genre_id' => 'required|integer',
            'description'   => 'required',
            'status'        => 'required',
            'tags'          => 'required|array',
        ]);

        // Start Image process

        $old_image = $request->old_image;


        $blog_image = $request->file('blog_image');
        //random id
        $name_gen = hexdec(uniqid());
        //jpg
        $img_ext = strtolower($blog_image->getClientOriginalExtension());
        $img_name = $name_gen. '.' . $img_ext;
        $img_loc = 'images/blog/';
        //$var = File::isDirectory($img_loc);
        //dd(!File::isDirectory($img_loc));

        if (!File::isDirectory($img_loc)){
            File::makeDirectory($img_loc, 0777, true, true);
        }
        $img_upload = $img_loc.$img_name;
        $blog_image->move($img_loc,$img_name);

        if($old_image!=null){
            unlink($old_image);
        }
        // End Image process
        $updated_blog = Blog::query()->findOrFail($id);
        $tags = $validator['tags'];
//        $updated_blog->tags()->where('blog_id', $id)->detach($tags);
        $updated_blog->update([
            'title' => $validator['title'],
            'blog_genre_id' => $validator['blog_genre_id'],
            'description' => $validator['title'],
            'status' => $validator['status'],
            'blog_image' => $img_upload,
        ]);

        $updated_blog->tags()->sync($tags);

        Session::flash('success', 'The blog was updated successfully!');
        return Redirect()->back();

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
        $blog = Blog::find($id);
        if(!empty($blog->blog_image)){
            $image = $blog->blog_image;
            unlink($image);
        }
        $blog->delete();
        return redirect()->back()->with('success','The blog was deleted was deleted successfully');
    }
}
