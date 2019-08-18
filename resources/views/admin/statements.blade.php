@extends('../layouts/dash')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <a href="{{route('admin.index',app()->getLocale())}}">Dashboard</a> / Statements
        </div>
        <div class="card-body">
           @if (!empty($statements))
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Image')}}</th>
                    <th>{{__('Make-Model')}}</th>
                    <th>{{__('Year')}}</th>
                    <th>{{__('status')}}</th>
                    <th>{{__('Cust_')}}</th>
                    <th>{{__('User')}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($statements as $item)
                    <tr>
                        <td class="align-middle">{{$item->id}}</td>
                        <td> <img src="{{asset($item->thumb)}}" alt="" width="120px" class="img-thumbnail"> </td>
                        <td class="align-middle">{{$item->make_title}} {{$item->car_title}}</td>
                        <td class="align-middle">{{$item->year}}</td>
                        <td class="align-middle">
                            @if ($item->status === 0)
                                <span class="bg-secondary px-2 pb-1 text-white rounded d-block">{{__('status_pending')}}</span>
                            @elseif($item->status === 1)
                                <span class="bg-primary px-2 pb-1 text-white rounded">{{__('status_approved')}}</span>
                            @elseif($item->status === -1)
                                <span class="bg-danger px-2 pb-1 text-white rounded">{{__('status_rejected')}}</span>
                            @else
                                <span class="bg-success px-2 pb-1 text-white rounded">{{__('status_payed')}}</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($item->customs)
                            <span class="bg-success px-2 py-1">{{__('Yes')}}</span>
                            @else
                            <span class="bg-danger">{{__('No')}}</span>
                            @endif
                            {{-- {{$item->customs?'':'No'}} --}}
                        </td>
                        <td class="align-middle">
                            {{$item->name}}
                            {{$item->last_name}}<br>
                            {{$item->phone}}
                        </td>
                        <td class="align-middle">
                            <div class="btn-group">
                                <a class="btn btn-info" 
                                href="{{route('admin.statements.item',['locale'=>app()->getLocale(),$item])}}">
                                    {{-- <i class="material-icons">border_color</i> --}}
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="row justify-content-center">{{$statements->links()}}</div>
                        </td>
                    </tr>
                </tfoot>
            </table>
               
           @else
           <strong>There is no any Statement.</strong>
           @endif


        </div>
    </div>
</div>
@endsection