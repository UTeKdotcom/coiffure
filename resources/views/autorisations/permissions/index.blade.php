@extends('admin.master')
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@section('head')
    <title>{{config('appname', 'Utek-Template')}}</title>
@endsection

@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('admin.topbar')
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        <div class="wrapper wrapper-content">
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>permissions</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.html">Acceuil</a>
                            </li>
                            <li>
                                <a>Permissions</a>
                            </li>
                            <li class="active">
                                <strong>Listes des permissions</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5> Listes des permissions donnants droits a des actions. </h5>
                            <div class="ibox-tools">
                                <a href="{{route('permissions.create')}}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                     Nouveau
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Intitulé</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $key => $permission)
                        <tr class="gradeX">
                            <td>{{++$key}}</td>
                            <td>{{$permission->intitule}}</td>
                            <td>{{$permission->description}}</td>
                            <td class="center">
                                <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
        
                                    <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}"><i class="fa fa-eye"></i></a>

                                    <a class="btn btn-white" href="{{ route('permissions.edit',$permission->id) }}"><i class="fa fa-edit"></i></a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Intitulé</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        </table>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>
@endsection

@section('bottom')

    <!-- Mainly scripts -->
    <script src="{{asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/jeditable/jquery.jeditable.js')}}"></script>

    <script src="{{asset('admin/js/plugins/dataTables/datatables.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('admin/js/inspinia.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pace/pace.min.js')}}"></script>

@endsection