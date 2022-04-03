<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Livewire\WithPagination;

class Genres extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;

	public $ids;

    public $search;

    public function clearform(){
        $this->age = '';
        $this->bio = '';
        $this->name = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create(){
    	$this->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Wajib diisi !!',
        ]);

        $genres = [
            'name' => $this->name,
        ];

        DB::beginTransaction();
        DB::table('genres')
        ->insert($genres);
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
		$genres = DB::table('genres')
        ->where('genre_id', '=', $id)
        ->first();

		$this->ids = $genres->genre_id;
		$this->name = $genres->name;
	}

    public function update(){
		$this->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Wajib diisi !!',
        ]);

        $genres = [
            'name' => $this->name,
        ];

        DB::beginTransaction();
        DB::table('genres')
        ->where('genre_id', '=', $this->ids)
        ->update($genres);
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
        DB::table('genres')
        ->where('genre_id', '=', $id)
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
        return view('livewire.genres', [
            'genres' => DB::table('genres')
            ->where('name','LIKE',"%".$this->search."%")
            ->paginate(10),
        ]);
    }
}
