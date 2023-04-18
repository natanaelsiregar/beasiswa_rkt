<?php

namespace App\Http\Controllers;

use App\Models\BeasiswaEksternal;
use App\Models\Posts;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Posts::get();
        return view('admindashboard.berita.index',compact('beritas'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admindashboard.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
        ]);

        // Explode tags
        $tags = $request->tags;
        $tags = json_decode($tags);
        $result = "";
        foreach ($tags as $tag) {
            $result .= $tag->value . " ";
        }

        // Get the thumbnail image
        $file = $request->hasFile('thumbnail');
        $file_name = "";
        if ($file) {
            $newFile = $request->file('thumbnail');
            $file_name .= $newFile->store('thumbnails');
        }

        $compare = preg_replace("/\s+/", "", $result);
        if ($compare == "Beasiswa") {
            BeasiswaEksternal::insert([
                'id_scholarship' => rand(10000, 100000),
                'title' => $request->title,
                'tags' => $result,
                'caption' => $request->caption,
                'thumbnail' => $file_name,
                'registration_link' => $request->regist,
                'description' => $request->description,
                'created_at' => now()
            ]);
        } else {
            Posts::insert([
                'id_article' => rand(10000, 100000),
                'title' => $request->title,
                'tags' => $result,
                'caption' => $request->caption,
                'thumbnail' => $file_name,
                'description' => $request->description,
                'created_at' => now()
            ]);
        }

        Alert::success('Sukses', 'Dokumen Anda Sudah Diposting.');
        return redirect()->route('home');
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
        $update = Posts::find($id);
        return view('admindashboard.berita.edit',compact('update'));
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
         $this->validate(
                $request,
                [
                   
                    'title' => 'required',
                    'caption' => 'required'
                ]
            );
        $update = Posts::find($id);
        $update->title = $request->title;
        $update->caption = $request->caption;
        // $update->description = $request->description;
        $update->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Posts::find($id);

        if($hapus->delete()){
           
        }
        return redirect()->back();
    }
}
