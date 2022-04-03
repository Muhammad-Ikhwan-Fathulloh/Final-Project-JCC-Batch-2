<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Livewire\WithPagination;

class Movies extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $genre_id;
	public $title;
	public $summary;
    public $year;
    public $poster;

	// public $movie_id;
	public $content;
    public $point;

	public $ids;

    public $search;

    public function clearform(){
        $this->genre_id = '';
        $this->title = '';
        $this->summary = '';
        $this->year = '';
        $this->poster = '';
        $this->content = '';
        $this->point = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function createCritic($movie_id){
        $critics = [
            'user_id' => Auth::user()->id,
            'movie_id' => $movie_id,
            'content' => $this->content,
            'point' => $this->point,
        ];

        DB::beginTransaction();
        DB::table('critics')
        ->insert($critics);
        DB::commit();
        $this->clearform();
        $this->alert('success', 'Berhasil Ditambah!', [
            'position' =>  'center',
            'timer' =>  3000,
            'toast' =>  false,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
      ]);
    }

    public function create(){
    	$this->validate([
            'genre_id' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'year' => 'required',
            'poster' => 'required',
        ], [
            'genre_id.required' => 'Wajib diisi !!',
            'title.required' => 'Wajib diisi !!',
            'summary.required' => 'Wajib diisi !!',
            'year.required' => 'Wajib diisi !!',
            'poster.required' => 'Wajib diisi !!',
        ]);

        $movies = [
            'genre_id' => $this->genre_id,
            'title' => $this->title,
            'summary' => $this->summary,
            'year' => $this->year,
            'poster' => $this->poster,
        ];

        DB::beginTransaction();
        DB::table('movies')
        ->insert($movies);
        DB::commit();


		$this->clearform();
        $this->alert('success', 'Berhasil Ditambah!', [
                  'position' =>  'center',
                  'timer' =>  3000,
                  'toast' =>  false,
                  'text' =>  '',
                  'confirmButtonText' =>  'Ok',
                  'cancelButtonText' =>  'Cancel',
                  'showCancelButton' =>  false,
                  'showConfirmButton' =>  false,
            ]);
    }

    public function show($id){
		$movies = DB::table('movies')
        ->where('genre_id', '=', $id)
        ->first();

		$this->ids = $movies->genre_id;
		$this->genre_id = $movies->genre_id;
		$this->title = $movies->title;
		$this->summary = $movies->summary;
	}

    public function update(){
		$this->validate([
            'genre_id' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'year' => 'required',
            'poster' => 'required',
        ], [
            'genre_id.required' => 'Wajib diisi !!',
            'title.required' => 'Wajib diisi !!',
            'summary.required' => 'Wajib diisi !!',
            'year.required' => 'Wajib diisi !!',
            'poster.required' => 'Wajib diisi !!',
        ]);

        $movies = [
            'genre_id' => $this->genre_id,
            'title' => $this->title,
            'summary' => $this->summary,
            'year' => $this->year,
            'poster' => $this->poster,
        ];

        DB::beginTransaction();
        DB::table('movies')
        ->where('movie_id', '=', $this->ids)
        ->update($movies);
        DB::commit();


        $this->alert('success', 'Berhasil Diubah!', [
                  'position' =>  'center',
                  'timer' =>  3000,
                  'toast' =>  false,
                  'text' =>  '',
                  'confirmButtonText' =>  'Ok',
                  'cancelButtonText' =>  'Cancel',
                  'showCancelButton' =>  false,
                  'showConfirmButton' =>  false,
            ]);
	}

	public function destroy($id){
        DB::table('movies')
        ->where('movie_id', '=', $id)
        ->delete();

		$this->alert('success', 'Berhasil Dihapus!', [
                  'position' =>  'center',
                  'timer' =>  3000,
                  'toast' =>  false,
                  'text' =>  '',
                  'confirmButtonText' =>  'Ok',
                  'cancelButtonText' =>  'Cancel',
                  'showCancelButton' =>  false,
                  'showConfirmButton' =>  false,
            ]);
	}

    public function destroyCritic($id){
        DB::table('critics')
        ->where('critic_id', '=', $id)
        ->delete();

		$this->alert('success', 'Berhasil Dihapus!', [
                  'position' =>  'center',
                  'timer' =>  3000,
                  'toast' =>  false,
                  'text' =>  '',
                  'confirmButtonText' =>  'Ok',
                  'cancelButtonText' =>  'Cancel',
                  'showCancelButton' =>  false,
                  'showConfirmButton' =>  false,
            ]);
	}

    public function render()
    {
        return view('livewire.movies', [
            'movies' => DB::table('movies')
            ->leftJoin('genres','genres.genre_id','=','movies.genre_id')
            ->where('movies.title','LIKE',"%".$this->search."%")
            ->paginate(4),
            'critics' => DB::table('critics')
            ->leftJoin('users','users.id','=','critics.user_id')
            ->get(),
        ]);
    }
}
