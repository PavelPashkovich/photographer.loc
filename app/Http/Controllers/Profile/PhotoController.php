<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Photo\StorePhotoRequest;
use App\Http\Requests\Profile\Photo\UpdatePhotoRequest;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::query()->where('user_id', '=', auth()->user()->id)->paginate(9);
        return view('profile.photo.index', ['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('profile.photo.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhotoRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = Storage::disk('public')->put('/photos', $data['photo']);
        Photo::query()->create($data);
        return redirect()->route('profile.photo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('profile.photo.show', ['photo' => $photo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $categories = Category::all();
        return view('profile.photo.edit', ['photo' => $photo, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        $data = $request->validated();
        if (isset($data['photo']) && !empty($data['photo'])) {
            $data['photo'] = Storage::disk('public')->put('/photos', $data['photo']);
        }
        $photo->update($data);
        return redirect()->route('profile.photo.show', ['photo' => $photo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('profile.photo.index');
    }
}
