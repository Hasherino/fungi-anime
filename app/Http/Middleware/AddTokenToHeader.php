<?php

namespace App\Http\Middleware;

use App\Models\Phrase;
use App\Models\Token;
use Closure;
use Illuminate\Http\Request;

class AddTokenToHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($access_token = Token::where('session_id', session('id'))->first()) {
            $request->headers->add(['Authorization' => "Bearer $access_token->value"]);
        }

        $content = Phrase::find(1)->get()[0]->content;
        config(['phrase.value' => $content]);

        return $next($request);
    }
}
