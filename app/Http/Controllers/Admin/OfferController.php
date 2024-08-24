<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.offers.index' , [
            'offers' => offer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewOfferRequest $request)
    {
        offer::query()->create([
            'code' => $request->get('code'),
            'started_at' => $request ->get('started_at'),
            'expires_at' => $request ->get('expires_at')
        ]);


        return redirect(route('offers.index'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(offer $offer)
    {
        return view('admin.offers.edit',[
            'offer' => $offer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, offer $offer)
    {
        $CodeExists = offer::query()->where('code' , $request->get('code'))
            ->where('id','!=',$offer->id)
            ->exists();

        if ($CodeExists)
        {
            return redirect()->back()->withErrors(['code' => 'code already exists']);
        }

        $offer->update([
            'code' => $request->get('code'),
            'started_at' => $request->get('started_at'),
            'expires_at' => $request->get('expires_at')
        ]);

        return redirect(route('offers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(offer $offer)
    {
        $offer->delete();

        return back();
    }
}
