@extends('layouts.viewpage')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">All Jobs</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0 ml-5">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">description</th>
                            <th scope="col">status</th>
                            <th scope="col">deadline</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $key => $job)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>{{ ++$key }}</td>
                                <td>{{ $job->name }}</td>
                                <td>{{ $job->description }}</td>
                                <td>{{ $job->status }}</td>
                                <td>{{ $job->deadline }}</td>
                                <td>{{ $job->created_at }}</td>
                                <td><a class="btn btn-sm btn-primary" href="#">view</a>|<a class="btn btn-sm btn-primary" href="#">Delete</a>|<a class="btn btn-sm btn-primary" href="#">update</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                 
                </table>
               <a href="{{route('admindashboard') }}"><button  class="btn btn-primary ml-2 mt-3">back</button></a>    
            </div>
        </div>
    </div>


    <!-- Sign Up Start -->
    {{-- <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="table-responsive">
                    <table class="table-stripped table-boarded">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>description</th>
                                <th>status</th>
                                <th>deadline</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $key => $job)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $job->name }}</td>
                                    <td>{{ $job->description }}</td>
                                    <td>{{ $job->status }}</td>
                                    <td>{{ $job->deadline }}</td>
                                    <td>{{ $job->created_at }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
