@extends("layouts.main")


@section('main-content')     

<div class="row mb-2 mt-4">
    <div class="col-6">
        <a href="{{ route('admin.products.create')}}" class="btn btn-success"> Create</a>
    </div>

    <div class="col-6"></div>
</div>
    @if (!empty($data))
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <td>Id</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Image</td>
                <td>Category</td>
                <td colspan="2" class="content">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="text-center">
                <td>{{ $item->id}}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->price}}</td>
                <td>{{ $item->quantity}}</td>
                <td>
                    <img src="/img/{{$item->image}}" alt="" width="150" height="auto">
                </td>
                <td>
                    @foreach($categories as $category)
                        {{ $item->category_id == $category->id ? $category->name : ''}}
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.products.edit', ['product' => $item->id]) }}">Update</a>
                </td>
                <td>
                    <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id}}">Delete</button>
                    <div class="modal fade" id="confirm_delete_{{ $item->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                Xác nhận xóa bản ghi này?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <form method="POST" action="{{ route('admin.products.delete', [ 'product' => $item->id])}}">
                                
                                @csrf
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h2>Không có dữ liệu</h2>
@endif

        


   
@endsection