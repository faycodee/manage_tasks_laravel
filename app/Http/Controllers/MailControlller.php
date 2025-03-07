<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\TestMail;
class MailControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('emails.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emails.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images',"public"); 
if ( $photoPath) {
     DB::table("clients")->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'photo' => $photoPath,
            ]) ;
            Mail::to("faysalomzil5@gmail.com")->send(new TestMail([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'age' => $request->age,
                'photoPath' => $photoPath,
            ]));

        return redirect()->route('mail2.index'); 
}
      
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
