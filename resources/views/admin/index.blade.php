@extends('../layouts/dash')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-info">Last 3 Users</div>
        <div class="card-body">
            @if ($total_users)                
                <table class="table table-responsive-sm table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users3 as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}} {{$item->last_name}}</td>
                            <td>{{$item->phone_number}}</td>
                            <td>{{$item->email}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="total-badge-wrap">
                                <em>Total:</em> <span class="badge badge-info rounded-circle">{{$total_users}}</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            @else
            <div class="alert alert-danger alert-dismissible mb-0">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>There is no any registered user.</strong>
            </div>
            @endif
        </div>
    </div>


    <div class="card mt-4 shadow">
        <div class="card-header bg-info">Last 3 Statements</div>
        <div class="card-body">
            @if($total_statements)                
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Make-Model</th>
                        <th>Year</th>
                        <th>Status</th>
                        <td>Customs</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($statements3 as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td> <img src="{{asset($item->thumb)}}" alt="" width="120px" class="img-thumbnail"> </td>
                            <td>{{$item->make_title}} {{$item->car_title}}</td>
                            <td>{{$item->year}}</td>
                            <td>
                                @if ($item->status === 0)
                                <span class="bg-secondary px-2 pb-1 text-white rounded">pending</span>
                                @elseif($item->status === 1)
                                <span class="bg-primary px-2 pb-1 text-white rounded">approved</span>
                                @elseif($item->status === -1)
                                <span class="bg-danger px-2 pb-1 text-white rounded">rejected</span>
                                @else
                                <span class="bg-success px-2 pb-1 text-white rounded">billed</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->customs)
                                <span class="text-success px-2 py-1">Yes</span>
                                @else
                                <span class="text-danger">No</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="total-badge-wrap">
                                <em>Total:</em> <span class="badge badge-info rounded-circle">{{$total_statements}}</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            @else
            <div class="alert alert-danger alert-dismissible mb-0">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>There is no any Statement.</strong>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection