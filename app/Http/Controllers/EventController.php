<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Symfony\Component\HttpFoundation\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return Inertia::render('Events/index', ['events' => $events] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Events/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Validator::make($request->all(), [
            'titre' => ['required'],
            'start_at' => ['required'],
            'end_at' => ['required'],
            'important'=>['required']
        ])->validate();

        // dd($request);
        Event::create($request->all());
        return redirect()->route('events.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return Inertia::render('Events/Edit', [
            'event'=> $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        Validator::make($request->all(), [
            'titre' => ['required'],
            'start_at' => ['required'],
            'end_at' => ['required'],
            'important'=>['required']
        ])->validate();

        // dd($request);
        Event::find($id)->update($request->all());

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy( Event $event)
    {
        // if($event->delete()){
        //     return redirect('events.index');
        // }else{
        //     return redirect('events.index');
        // }

        // dd($id);
        
        // Event::find($id)->delete();
        $event->delete();
        return redirect()->route('events.index');
    }

    public function eventBetween($start, $end){

        // requette pour recuperer les evenements
        // return event
    }
}
