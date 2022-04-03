<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Livewire\WithPagination;

class Casts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $age;
    public $bio;

	public $ids;

    public $search;

    public function clearforms(){
        $this->name = '';
        $this->age = '';
        $this->bio = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create(){
    	$this->validate([
            'name' => 'required',
            'age' => 'required',
            'bio' => 'required',
        ], [
            'name.required' => 'Wajib diisi !!',
            'age.required' => 'Wajib diisi !!',
            'bio.required' => 'Wajib diisi !!',
        ]);

        $casts = [
            'name' => $this->name,
            'age' => $this->age,
            'bio' => $this->bio,
        ];

        DB::beginTransaction();
        DB::table('casts')
        ->insert($casts);
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
		$casts = DB::table('casts')
        ->where('cast_id', '=', $id)
        ->first();

		$this->ids = $casts->cast_id;
		$this->name = $casts->name;
		$this->age = $casts->age;
		$this->bio = $casts->bio;
	}

    public function update(){
		$this->validate([
            'name' => 'required',
            'age' => 'required',
            'bio' => 'required',
        ], [
            'name.required' => 'Wajib diisi !!',
            'age.required' => 'Wajib diisi !!',
            'bio.required' => 'Wajib diisi !!',
        ]);

        $casts = [
            'name' => $this->name,
            'age' => $this->age,
            'bio' => $this->bio,
        ];

        DB::beginTransaction();
        DB::table('casts')
        ->where('cast_id', '=', $this->ids)
        ->update($casts);
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
        DB::table('casts')
        ->where('cast_id', '=', $id)
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
        return view('livewire.casts', [
            'casts' => DB::table('casts')
            ->where('name','LIKE',"%".$this->search."%")
            ->paginate(10),
        ]);
    }
}
