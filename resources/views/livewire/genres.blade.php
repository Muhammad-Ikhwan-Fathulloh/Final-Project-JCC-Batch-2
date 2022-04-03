<div>
    @foreach ($genres as $value)
      <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
        <p class="fw-medium mb-0 text-secondary">{{$value->name}}</p>
      </div>
    @endforeach
</div>
