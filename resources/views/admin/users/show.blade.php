@extends("layouts.main")

@section('title')
    12345
@endsection

@section('main-content')   
    <div class="row mt-5 mb-5">
        <div class="col-12 row">
            <div class="col-6 d-inline-block">
                <label class="col-3"> Họ tên</label>
                <label class="col-8">{{ $user->name}}</label>
            </div>
            <div class="col-6 d-inline-block">
                <label class="col-3"> Email</label>
                <label class="col-8">{{ $user->email}}</label>
            </div>
        </div>
        <div class="col-12">
            <p>Lịch sử mua hàng</p>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Number</td>
                        <td>Address</td>
                        <td>Price</td>
                        <td>Invoice Status</td>
                        <td>Created At</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $invoice->number }}</td>
                            <td>{{ $invoice->address }}</td>
                            <td>{{ $invoice->total_price }}</td>
                            <td>{{ $invoice->status }}</td>
                            <td>{{ $invoice->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- {{ $user->name}} --}}
@endsection