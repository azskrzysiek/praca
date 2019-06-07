<?php

namespace App\Http\Controllers;

use App\Club;
use App\Profile;
use Illuminate\Http\Request;

class ClubsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('index','show','addtransfer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = CLub::all();

        if ($clubs->count() > 11) {
            return back();
        } else {
            return view('clubs.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->isAdmin())
        {
            $data = request()->validate([
                'name' => 'required',
                'logo' => 'required|image'
                ],
                [
                    'name.required' => 'Wprowadź nazwę drużyny',
                    'logo.required' => 'Dodaj logo drużyny',
                    'logo.image' => 'Logo musi być w zdjęciem',
                ]);
    
                if (request('logo'))
                {
                    //Get filename with the extension
                    $filenameWithExt = request()->file('logo')->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just extension
                    $extension = request()->file('logo')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    // Upload
                    $path = request('logo')->storeAs('public/logos', $fileNameToStore);
                    
                    $logoArray = ['logo' => $fileNameToStore];
                } 
    
    
            
    
            Club::create(array_merge(
                $data,
                $logoArray,
            ));
            
            toast('Drużyna została dodana pomyślnie','success','top-right');
            return redirect('/admin/clubs');
        } else {
            return back();
        }
    }

    public function addtransfer(Club $club)
    {
        $user = auth()->user();

        $user->profile->update([
            'transfer' => $club->id,
        ]);

        toast('Twoja prośba została wysłana','info','top-right');
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {

        $players = Profile::where('club_id',$club->id)->get();



        return view('clubs.show', compact('club','players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        // $this->authorize('update', $post);


        return view('clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Club $club)
    {
        // $this->authorize('update', $post);

        $user = auth()->user();

        if ($user->isAdmin())
        {
            $data = request()->validate([
                'name' => 'required',
                'logo' => 'image'
                ],
                [
                    'name.required' => 'Wprowadź nazwę drużyny',
                    // 'logo.required' => 'Dodaj logo drużyny',
                    'logo.image' => 'Logo musi być w zdjęciem',
                ]);
    
                if (request('logo'))
                {
                    //Get filename with the extension
                    $filenameWithExt = request()->file('logo')->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just extension
                    $extension = request()->file('logo')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    // Upload
                    $path = request('logo')->storeAs('public/logos', $fileNameToStore);
                    
                    $logoArray = ['logo' => $fileNameToStore];
                } 
    
    
            
    
            $club->update(array_merge(
                $data,
                $logoArray ?? []
            ));
            
            toast('Drużyna została zaktualizowana pomyślnie','info','top-right');
            return redirect('/admin/clubs');
        } else {
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {

        // $this->authorize('delete', $post);

        $club->delete();

        toast('Drużyna została usunięta','success','top-right');
        return back();
    }
}
