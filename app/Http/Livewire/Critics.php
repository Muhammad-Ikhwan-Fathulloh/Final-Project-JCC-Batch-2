<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Livewire\WithPagination;

class Critics extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id;
	public $movie_id;
	public $content;
    public $point;

	public $ids;

    public $search;

    public function clearforms(){
        $this->id = '';
        $this->movie_id = '';
        $this->content = '';
        $this->point = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create(){
        $critics = [
            'id' => Auth::user()->id,
            'movie_id' => $this->movie_id,
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

    public function show($id){
		$critics = DB::table('critics')
        ->where('critic_id', '=', $id)
        ->first();

		$this->ids = $critics->critic_id;
		$this->movie_id = $critics->movie_id;
		$this->content = $critics->content;
		$this->point = $critics->point;
	}

    public function update(){
		$this->validate([
            'id' => 'required',
            'movie_id' => 'required',
            'content' => 'required',
            'point' => 'required',
        ], [
            'id.required' => 'Wajib diisi !!',
            'movie_id.required' => 'Wajib diisi !!',
            'content.required' => 'Wajib diisi !!',
            'point.required' => 'Wajib diisi !!',
        ]);

        $critics = [
            'id' => Auth::user()->id,
            'movie_id' => $this->movie_id,
            'content' => $this->content,
            'point' => $this->point,
        ];

        DB::beginTransaction();
        DB::table('critics')
        ->where('critic_id', '=', $this->ids)
        ->update($critics);
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
        return view('livewire.critics', [
            'critics' => DB::table('critics')
            ->leftJoin('users','users.id','=','critics.id')
            ->where('critics.point','LIKE',"%".$this->search."%")
            ->paginate(5),
        ]);
    }
}
