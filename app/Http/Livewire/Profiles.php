<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Livewire\WithPagination;

class Profiles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user_id;
    public $age;
    public $bio;
    public $address;

	public $ids;

    public $search;

    public function clearform(){
        $this->user_id = '';
        $this->age = '';
        $this->bio = '';
        $this->address = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create(){
    	$this->validate([
            'user_id' => 'required',
            'address' => 'required',
            'age' => 'required',
            'bio' => 'required',
        ], [
            'user_id.required' => 'Wajib diisi !!',
            'address.required' => 'Wajib diisi !!',
            'age.required' => 'Wajib diisi !!',
            'bio.required' => 'Wajib diisi !!',
        ]);

        $profiles = [
            'user_id' => Auth::user()->id,
            'address' => $this->address,
            'age' => $this->age,
            'bio' => $this->bio,
        ];

        DB::beginTransaction();
        DB::table('profiles')
        ->insert($profiles);
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
		$profiles = DB::table('profiles')
        ->where('profile_id', '=', $id)
        ->first();

		$this->ids = $profiles->profile_id;
		$this->address = $profiles->address;
		$this->age = $profiles->age;
		$this->bio = $profiles->bio;
	}

    public function update(){
		$this->validate([
            'user_id' => 'required',
            'address' => 'required',
            'age' => 'required',
            'bio' => 'required',
        ], [
            'user_id.required' => 'Wajib diisi !!',
            'address.required' => 'Wajib diisi !!',
            'age.required' => 'Wajib diisi !!',
            'bio.required' => 'Wajib diisi !!',
        ]);

        $profiles = [
            'user_id' => Auth::user()->id,
            'address' => $this->address,
            'age' => $this->age,
            'bio' => $this->bio,
        ];

        DB::beginTransaction();
        DB::table('profiles')
        ->where('profile_id', '=', $this->ids)
        ->update($profiles);
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
        DB::table('profiles')
        ->where('profile_id', '=', $id)
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
        return view('livewire.profiles', [
            'profiles' => DB::table('profiles')
            ->leftJoin('users','users.id','=','profiles.user_id')
            ->where('users.name','LIKE',"%".$this->search."%")
            ->paginate(5),
        ]);
    }
}
