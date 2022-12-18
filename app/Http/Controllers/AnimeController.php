<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function create() {
        $data = request(['english_name', 'japanese_name', 'rating']);

        $anime = Anime::create($data);

        User::find(auth()->id())->animes()->attach($anime->id);

        return redirect("/profile/".auth()->id());
    }

    public function createKitsu() {
        $kitsuId = request('kitsu_id');

        if(!$anime = Anime::where('kitsu_id', $kitsuId)->first()) {
            $response = Http::get('https://kitsu.io/api/edge/anime/' . $kitsuId);
            $response = $response->json()['data']['attributes'];
            $data['english_name'] = $response['titles']['en'];
            $data['japanese_name'] = $response['titles']['ja_jp'];
            $data['thumbnail'] = $response['posterImage']['small'];
            $data['description'] = $response['description'];
            $data['premiere'] = $response['startDate'];
            $data['episode_count'] = $response['episodeCount'];
            $data['age_restriction'] = $response['ageRating'];
            $data['rating'] = $response['ratingRank'];
            $data['popularity'] = $response['popularityRank'];
            $data['score'] = $response['averageRating'];
            $data['nsfw'] = $response['nsfw'];
            $data['kitsu_id'] = $kitsuId;

            $anime = Anime::create($data);
        }

        User::find(auth()->id())->animes()->attach($anime->id);

        return redirect("/profile/".auth()->id());
    }

    public function destroy($id) {
        auth()->user()->animes()->detach($id);

        return redirect("/profile/".auth()->id());
    }
}
