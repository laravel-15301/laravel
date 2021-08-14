@extends("layouts.main")

@section('title')
{{-- , 'Create User' --}}
@endsection

@section('main-content')  
<form method="POST" class="mt-5" action="{{ route('admin.products.update',[ 'product' => $data->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->name}}" name="name">
    </div>
    <div>
        <label>price</label>
        <input class="mt-3 form-control" type="number" value="{{ $data->price}}" name="price">
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" type="number" value="{{ $data->quantity}}" name="quantity">
    </div>
    <div>
        <label>Category</label>
        <select name="category_id" class="mt-3 form-control">
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $data->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
            @endforeach
            <span class="text-danger">{{ $errors->first('category_id') }}</span>
        </select>
    </div>
    <div>
        <label class="d-block">Image</label>
        <img src="/img/{{$data->image}}" alt="" class="mt-5" width="150" height="auto">
        <input type="file" class="mt-3 form-control" name="image_new">
    </div>
    {{-- <div>
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
    </div> --}}
    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection


