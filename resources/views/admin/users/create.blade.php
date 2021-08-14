@extends("layouts.main")

@section('title')
{{-- , 'Create User' --}}
@endsection

@section('main-content')  
<form method="POST" class="mt-5" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="mt-3">
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name">
        @error('name')
            <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Email</label>
        <input class="mt-3 form-control" type="text" name="email">
        @error('email')
        <span class="text-danger">{{ $message}}</span>
    @enderror
    </div>
    <div class="mt-3">
        <label>Address</label>
        <input class="mt-3 form-control" type="text" name="address">
        @error('address')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Password</label>
        <input class="mt-3 form-control" type="password" name="password">
        @error('password')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Gender</label>
        <select name="gender">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>
        @error('gender')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Role</label>
        <select name="role">
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>
        @error('role')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection


