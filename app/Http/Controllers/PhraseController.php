<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    public function update() {
        $content = request('content');

        Phrase::find(1)->update(['content' => $content]);

        return redirect("/");
    }
}
