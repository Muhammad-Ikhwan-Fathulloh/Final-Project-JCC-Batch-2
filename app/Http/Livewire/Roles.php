<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $movie_id;
	public $cast_id;
	public $name;

	public $ids;

    public $search;

    public function clearform(){
        $this->movie_id = '';
        $this->cast_id = '';
        $this->name = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create(){
    	$this->validate([
            'movie_id' => 'required',
            'cast_id' => 'required',
            'name' => 'required',
        ], [
            'movie_id.required' => 'Wajib diisi !!',
            'cast_id.required' => 'Wajib diisi !!',
            'name.required' => 'Wajib diisi !!',
        ]);

        $roles = [
            'movie_id' => $this->movie_id,
            'cast_id' => $this->cast_id,
            'name' => $this->name,
        ];

        DB::beginTransaction();
        DB::table('roles')
        ->insert($roles);
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
		$roles = DB::table('roles')
        ->where('role_id', '=', $id)
        ->first();

		$this->ids = $roles->role_id;
		$this->movie_id = $roles->movie_id;
		$this->cast_id = $roles->cast_id;
		$this->name = $roles->name;
	}

    public function update(){
		$this->validate([
            'movie_id' => 'required',
            'cast_id' => 'required',
            'name' => 'required',
        ], [
            'movie_id.required' => 'Wajib diisi !!',
            'cast_id.required' => 'Wajib diisi !!',
            'name.required' => 'Wajib diisi !!',
        ]);

        $roles = [
            'movie_id' => $this->movie_id,
            'cast_id' => $this->cast_id,
            'name' => $this->name,
        ];

        DB::beginTransaction();
        DB::table('roles')
        ->where('role_id', '=', $this->ids)
        ->update($roles);
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
        DB::table('roles')
        ->where('role_id', '=', $id)
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
        return view('livewire.roles', [
            'roles' => DB::table('roles')
            ->leftJoin('movies','movies.movie_id','=','roles.movie_id')
            ->leftJoin('casts','casts.cast_id','=','roles.cast_id')
            ->where('movies.title','LIKE',"%".$this->search."%")
            ->paginate(5),
        ]);
    }
}
