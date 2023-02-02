<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogGenre;
use Session;
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $genres = BlogGenre::latest()->paginate(5);
        return view('admin.blog_genre.index',compact("genres"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.blog_genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$inputs = $request->all();

//        $validator = \Validator::make($inputs, array(
//            'catagory' => 'required|max:25',
//        ));
//        if ($validator->fails()) {
//            return Redirect()->back()->withErrors($validator)->withInput();
//        }

        $validator = $request->validate([
            'catagory' => 'required|max:25',
        ],
            [
                'catagory.min' => 'not gonna work',
            ]
        );

        $catagory = new BlogGenre;
        $data = array(
            'catagory' => $request->catagory,
            'status' => (int)$request->status,
        );
        $catagory->fill($data)->save();
        Session::flash('success', 'The category was created successfully!');
        return Redirect()->route('admin.genre.index');

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
        $genres = BlogGenre::find($id);

        $statuses = array(
            '1' => 'Active',
            '2' => 'Inactive'
        );

        return view('admin.blog_genre.edit',compact('genres','statuses'));

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
        //return $request->all();
        $validator = $request->validate([
            'catagory' => 'required|max:25',
            'status' => 'required',
        ]);

        $genre = BlogGenre::find($id)->update([
            'catagory' => $validator['catagory'],
            'status' => $validator['status']
        ]);

        Session::flash('success', 'The genre was updated successfully!');
        return Redirect()->route('admin.genre.index');
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
