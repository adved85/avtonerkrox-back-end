@extends('../layouts/dash')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <a href="{{route('admin.index',app()->getLocale())}}">Dashboard</a> / Users
        </div>
        <div class="card-body">

                @if (!empty($users))
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Has statements</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td class="align-middle">{{$item->id}}</td>
                            <td class="align-middle">{{$item->name}} {{$item->last_name}}</td>
                            <td class="align-middle">{{$item->email}}</td>
                            <td class="align-middle">{{$item->phone_number}}</td>
                            <td class="align-middle">{{$item->statement()->count()}}</td>                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="row justify-content-center">{{$users->links()}}</div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                   
               @else
               <strong>There is no any User.</strong>
               @endif

        </div>
    </div>
</div>
@endsection