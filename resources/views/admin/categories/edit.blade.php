@extends("layouts.main")

@section('title')

@endsection
@section('main-content')  
<form method="POST" class="mt-5" action="{{ route('admin.categories.update',[ 'category' => $data->id]) }}">
    @csrf
    @method('PATCH')
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->name}}" name="name">
    </div>
    <button type="submit" class="mt-3 btn btn-primary">Update</button>
</form>
@endsection


