<?php

namespace App\Http\Controllers;


use BinshopsBlog\Models\BinshopsField;
use BinshopsBlog\Models\BinshopsPostTranslation;
use Illuminate\Http\Request;
use PDF;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function printlabel($slug, Request $request)
    {
        $data = [
            'post' => BinshopsPostTranslation::where('lang_id', 6)
                    ->where('binshops_post_translations.slug', '=', $slug)
                    ->with(['post' => function($query){
                        $query->where("is_published" , '=' , true);
                    }])->first(),
            'startSgField' => BinshopsField::where('name', 'startsg')->first(),
            'eindSgField' => BinshopsField::where('name', 'eindsg')->first(),
            'alcoholField' => BinshopsField::where('name', 'alcohol')->first()
        ];

        return view('posts.printlabel', $data);

        $pdf = PDF::loadView('posts.printlabel', $data);
        return $pdf->download('document.pdf');

    }
}
