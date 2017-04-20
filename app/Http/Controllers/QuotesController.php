<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitQuote;
use App\Http\Requests\SubmitQuoteRequest;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotesController extends Controller
{
    /**
     * Show the quote submit view
     *
     * @return \Illuminate\Http\Response
     */
    public function submitView()
    {
        return view('submit');
    }

    /**
     * Handle Quote Form submissiongetAuthIdentifier
     * Store Quote
     *
     * @param SubmitQuoteRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SubmitQuoteRequest $request)
    {
        $file = $request->file('image');
        $filename = $file->hashName();
        $file->storePubliclyAs('public', $filename);

        $quote = new Quote();
        $quote->quote = $request->input('quote');
        $quote->quotee = $request->input('quotee');
        $quote->image_name = $filename;
        $quote->user_id = Auth::user()->id;
        $quote->save();

        //TODO: Change redirect to the created Quote that is not visible yet
        return redirect(
            'quotes/'. $quote->id
        );
    }

    /**
     * Show single quote
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        if (!$quote = Quote::where('id', $id)->with('user')->first())
        {
            return redirect('errors/404');
        }

        return view('single_quote')->with('quote', $quote);
    }


}
