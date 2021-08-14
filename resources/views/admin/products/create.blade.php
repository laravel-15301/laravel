@extends("layouts.main")

@section('title')
{{-- , 'Create Product' --}}
@endsection

@section('main-content')  
<form method="POST" class="mt-5" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name">
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
    <div>
        <label>Price</label>
        <input class="mt-3 form-control" type="number" name="price">
        <span class="text-danger">{{ $errors->first('price') }}</span>
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" type="number" name="quantity">
        <span class="text-danger">{{ $errors->first('quantity') }}</span>
    </div>
    <div>
        <label>Category</label>
        <select name="category_id" class="mt-3 form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            <span class="text-danger">{{ $errors->first('category_id') }}</span>
        </select>
    </div>
    <div>
        <label>Image</label>
        <input class="mt-3 form-control" type="file" name="image">
        <span class="text-danger">{{ $errors->first('image') }}</span>
    </div>
    <button type="submit" class="mt-3 btn btn-primary">Create</button>
</form>
@endsection


