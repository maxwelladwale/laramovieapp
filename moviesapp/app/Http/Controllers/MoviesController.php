<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Comments;
use DB;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $popularMovies = $this->getDataFromApi('https://api.themoviedb.org/3/movie/popular');
            $nowPlayingMovies = $this->getDataFromApi('https://api.themoviedb.org/3/movie/now_playing');
            $genreArray = $this->getDataFromApi('https://api.themoviedb.org/3/genre/movie/list');
            $genres = collect($genreArray)->mapWithKeys(function($genre) {
                return [$genre['id'] => $genre['name']];
            });

            return view('movies.index', [
                'popularMovies' => $popularMovies,
                'nowPlayingMovies' => $nowPlayingMovies,
                'genres' => $genres,
            ]);
        }

        private function getDataFromApi($endpoint)
        {
            try {
                $response = Http::withToken(config('services.tmdb.token'))->get($endpoint)->json();
                return $response['results'];
            } catch (\Exception $e) {
                // handle error and return proper response
            }
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
        ->json();

        // $fetchinitialcomments = Comments::all();

        // $fetchinitialcomments = DB::table('comments')->pluck('body','user_id');

        return view ('movies.show',[
            'movie' => $movie,
            // 'comments'=> $fetchinitialcomments,
        ]);
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
