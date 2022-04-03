<div>
    <form class="d-flex mb-5" wire:poll>
        <input wire:model="search" class="form-control me-2 border-warning" type="text" name="search" placeholder="Cari berdasarkan judul" aria-label="Search" value="">
        <span class="btn btn-outline-warning" value="cari"><i class="fas fa-fw fa-search"></i></span>
      </form>

    <div class="row">
    @foreach ($movies as $value)

    <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="{{$value->poster}}" width="150" alt="movie" />
        <h4 class="mb-3">{{$value->title}}</h4>
        <p class="mb-0 fw-medium text-secondary">Genre : {{$value->name}}</p>
        <p class="mb-0 fw-medium text-secondary">Deskripsi : {{$value->summary}}</p>
        @if(empty(auth()->user()->id))

        @elseif(!empty(auth()->user()->id))
        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$value->movie_id}}" aria-expanded="false" aria-controls="collapseExample">
            Lihat Masukan
          </button>
          <div class="collapse" id="collapseExample{{$value->movie_id}}" wire:ignore.self>
            <form wire:submit.prevent="createCritic({{$value->movie_id}})" class="mb-3">
                {{-- <div class="form-group">
                    <label class="text-white" for="">Movie</label>
                    <input type="text" name="movie_id" wire:model="movie_id" class="form-control" value="{{$value->movie_id}}">
                    @error('movie_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
                  </div> --}}

                <div class="form-group">
                    <label class="text-white" for="">Masukan</label>
                    <input type="text" name="content" wire:model="content" class="form-control" placeholder="Beri Masukkan">
                    @error('content') <div class="alert alert-danger">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label class="text-white" for="">Poin</label>
                    <input type="text" name="point" wire:model="point" class="form-control" placeholder="Beri Poin">
                    @error('point') <div class="alert alert-danger">{{ $message }}</div> @enderror
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary" wire:submit.prevent="createCritic({{$value->movie_id}})">Kirim</button>
            </form>
              @foreach ($critics as $values)
                @if ($value->movie_id == $values->movie_id)
                <h4 class="fw-bold fs-1">{{$values->name}}</h4>
                <p class="fw-medium text-secondary">Review : <br> {{$values->content}}</p>
                <p class="mb-4 fw-medium text-secondary">Point : {{number_format($values->point)}}%</p>
                @if(empty(auth()->user()->id))

                @elseif(!empty(auth()->user()->id == $values->id))
                <button type="submit" class="btn btn-sm btn-danger" wire:click.prevent="destroyCritic({{$values->critic_id}})">Hapus</button>
                @endif
                @endif
              @endforeach
          </div>

        @endif
      </div>


    @endforeach
    </div>
    {{ $movies->links() }}
    </div>
    </div>

</div>
