<?php

namespace App\Http\Controllers;

use App\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
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

    public static function findOrCreate($keyword, $location) {
        $find = Keyword::where(['text' => $keyword, 'location' => $location])->get();
        if ($find->count()) {
            return $find->first();
        }
        $new = Keyword::create(['text' => $keyword, 'location' => $location]);
        $new->save();
        return $new;
    }
}
