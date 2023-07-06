@extends('layouts.admin')

@section('content')
    {{-- <div class="contaner ">
        {{-- <div class="col-md-8">

            <form action="" method="POST" class="">
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Enter email">
                    <label for="floatingInput">Email address</label>
                    <div>


                        <label for="floatingInput">Category</label>
                        <input class="form-control" list="datalistOptions" id="floatingInput" name="category"
                            placeholder="Type to search..." value="{{ old('name') }} ">
                        <datalist id="datalistOptions">
                            <option value="Technology">
                            <option value="medicine">
                            <option value="sports">
                            <option value="Nutrition">
                            <option value="Finance">
                        </datalist>
                    </div>
                    <div>
                        <label class="form-label">Task name</label>
                        <input type="email" class="form-control" name="name" placeholder="enter task name"
                            autocomplete="off" value="{{ old('name') }}">
                    </div>
                    <div>
                        <label class="form-label">Deadline</label>
                        <input type="date" class="form-control" name="deadline" placeholder="enter Due date"
                            autocomplete="off" value="{{ old('deadline') }}">
                    </div>
                    <div>
                        <label class="form-label">status</label>
                        <input type="text" class="form-control" name="status" autocomplete="off"
                            value="{{ old('status') }}">
                    </div>
                    <div><button type="submit" class="btn-btn-success">Submit</button></div>



            </form>



        </div> 
    </div> --}}

    <div class="container-fluid position-relative d-flex p-2">

        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-8">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            {{-- <a href="{{ url('/') }}" class=""> --}}
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Add Job</h3>
                            </a>

                        </div>

                        <form method="POST" action="#">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingInput"
                                autocomplete="off" value="{{ old('name')}}">
                                <label for="floatingInput">Task name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="name"  list="datalistOptions" class="form-control" id="floatingInput" autocomplete="off" value="{{ old('category')}}">
                            
                                    <datalist id="datalistOptions">
                                        <option value="Technology">
                                        <option value="medicine">
                                        <option value="sports">
                                        <option value="Nutrition">
                                        <option value="Finance">
                                    </datalist>
                                
                                <label for="floatingInput">Category</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" name="description" class="form-control" id="floatingInput"
                                    placeholder="enter task description" autocomplete="off" value="{{ old('description')}}">
                                <label for="floatingInput">description</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="date" name="deadline" class="form-control" id="floatingInput"
                                    placeholder="Enter deadline date" autocomplete="off" value="{{ old('deadline')}}">
                                <label for="floatingInput">Deadline</label>
                            </div>

                            <div class="form-floating mb-3">
                         <button type="submit"id="floatingInput"@class(['p-2','bg-success', 'font-bold' => true])  >submit</button>
                        </div>
                         


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
@endsection
