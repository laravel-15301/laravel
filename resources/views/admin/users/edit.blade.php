@extends("layouts.main")

@section('title')
{{-- , 'Create User' --}}
@endsection

@section('main-content')   
<form method="POST" class="mt-5" action="{{ route('admin.users.update',[ 'user' => $data->id]) }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->name}}" name="name">
    </div>
    <div>
        <label>Email</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->email}}" name="email">
    </div>
    <div>
        <label>Address</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->address}}" name="address">
    </div>
    <div>
        <label for="">Gender</label>
        <select name="gender">
            <option {{$data->gender == 1 ? "selected" : ""}} value="1">Male</option>
            <option {{$data->gender == 0 ? "selected" : ""}} value="0">Female</option>
        </select>
    </div>
    <div>
        <label for="">Role</label>
        <select name="role">
            <option {{$data->gender == 0 ? "selected" : ""}} value="0">User</option>
            <option {{$data->gender == 1 ? "selected" : ""}} value="1">Admin</option>
        </select>
    </div>
    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection


