<div>
    @if(empty(auth()->user()->id))

    @elseif(!empty(auth()->user()->id))

    @endif
</div>
