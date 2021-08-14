@extends("layouts.main")

@section('title')
{{-- , 'Create User' --}}
@endsection

@section('main-content')  
<form method="POST" class="mt-5" action="{{ route('admin.categories.store') }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name">
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
    <button type="submit" class="mt-3 btn btn-primary">Create</button>
</form>
@endsection


