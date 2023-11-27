@extends('layouts.default')

@section('content')

<form method="POST" action="{{route('clients.update',$client)}}">
    @method('put')
    @csrf
     

        @component('components.card')

        @component('components.card-body')
  
            @include('dashboard.clients.partials.fields')

        @endcomponent

        @component('components.card-footer')
            <a href="" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        @endcomponent
        @endcomponent
</form>

@endsection