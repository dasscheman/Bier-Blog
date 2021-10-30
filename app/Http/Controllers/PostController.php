<?php

namespace App\Http\Controllers;


use BinshopsBlog\Models\BinshopsField;
use BinshopsBlog\Models\BinshopsPostTranslation;
use Illuminate\Http\Request;
use PDF;
use QrCode;
use Illuminate\Support\Facades\Storage;

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
        $post = BinshopsPostTranslation::where('lang_id', 6)
            ->where('binshops_post_translations.slug', '=', $slug)
            ->with(['post' => function($query){
                $query->where("is_published" , '=' , true);
            }])->first();

        $image = \QrCode::format('png')
            ->size(200)->errorCorrection('L')->margin(1)
            ->generate($post->url('nl'));
        $output_file = '/images/qr-code/img-' . $slug . '.png';
        Storage::disk('public')->put($output_file, $image); //storage/app/public/img/qr-code/img-1557309130.png

        $data = [
            'post' => $post,
            'qr_file' => $output_file,
            'startSgField' => BinshopsField::where('name', 'startsg')->first(),
            'eindSgField' => BinshopsField::where('name', 'eindsg')->first(),
            'alcoholField' => BinshopsField::where('name', 'alcohol')->first(),
            'url' => preg_replace('#^https?://#', '', rtrim(url()->to('/'),'/'))
        ];
        // return view('posts.printlabel', $data);
        $pdf = PDF::loadView('posts.printlabel', $data);
        return $pdf->stream('labels.pdf');

    }
}
