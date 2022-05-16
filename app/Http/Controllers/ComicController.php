<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    protected $validationRules = [
        'title'=> 'required|unique:comics|min:5|max:100',
        'thumb'=> 'nullable|url|max:250',
        'series'=> 'nullable|max:100',
        'description'=> 'nullable|max:1000',
        'sale_date'=> 'nullable',


    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics=Comic::paginate(4);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        $formData = $request->all();
        $newComic=Comic::create($formData);

        return redirect()->route('comics.show', $newComic->id)->with('status', 'Completed with success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', [
            'comic' => $comic,
            'pageTitle' => $comic->title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $this->validationRules['title'] = [
            'required',
            Rule::unique('comics')->ignore($comic),
            'min:5',
            'max:100',

        ];
        
        $request->validate($this->validationRules);

        $formData = $request->all();
        $comic->update($formData);
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $previousUrl=url()->previous();
        if($previousUrl == route('comics.edit', $comic->id)){
            $previousUrl = route('comics.index');
        }
        $comic->delete();

        return redirect($previousUrl)->with('deleted', 'Deleted post id: ' . $comic->id);
        

    }
}
