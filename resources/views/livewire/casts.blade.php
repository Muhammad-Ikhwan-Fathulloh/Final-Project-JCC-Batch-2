<div>
    <form class="d-flex mb-5" wire:poll>
        <input wire:model="search" class="form-control me-2 border-warning" type="text" name="search" placeholder="Cari berdasarkan nama" aria-label="Search" value="">
        <span class="btn btn-outline-warning" value="cari"><i class="fas fa-fw fa-search"></i></span>
      </form>
    @foreach ($casts as $value)
    <h4 class="fw-bold fs-1">{{$value->name}}</h4>
              <p class="mb-4 fw-medium text-secondary">{{$value->bio}}</p>
    @endforeach
</div>
