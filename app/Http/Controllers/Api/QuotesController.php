<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitQuoteRequest;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotesController extends Controller
{
    public function index(Request $request)
    {
        //dd(json_encode(Quote::with('user')->first()));
        $quotes = Quote::with('user')->first();

        return response()->json($quotes, 200);
    }

    public function show(Request $request)
    {
        return "show";
    }

    public function store(SubmitQuoteRequest $request)
    {
        $file = $request->file('image');
        $filename = $file->hashName();
        $file->storePublicly($filename, ['disk' => 'public']);

        $quote = new Quote();
        $quote->quote = $request->input('quote');
        $quote->quotee = $request->input('quotee');
        $quote->image_name = $filename;

        dd(Auth::check());
        // find way to auth
        $quote->user_id = Auth::user()->id;
        $quote->save();

        dd('re');
        //TODO: Change redirect to the created Quote that is not visible yet
        return response($quote, 200);
    }
}
