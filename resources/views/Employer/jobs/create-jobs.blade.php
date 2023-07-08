@extends('layouts.main')
@section('content')



    <!-- Sign Up Start -->
    <div class="container-fluid position-relative d-flex p-0">
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-8">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        {{-- <a href="{{ url('/') }}" class=""> --}}
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Add Job</h3>
                        </a>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('employer.storejob') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInput" autocomplete="off"
                                value="{{ old('name') }}">
                            <label for="floatingInput">Task Tittle</label>
                        </div>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                            name="category">
                            <option value="">Open this select category</option>
                            <option value="Technology">Technology</option>
                            <option value="medicine">Medicine</option>
                            <option value="sports">Sports</option>
                            <option value="Nutrition">Nutrition</option>
                            <option value="Finance">Finance</option>
                        </select>



                        <div class="form-floating mb-3">
                            <input type="text" name="description" class="form-control" id="floatingInput"
                                placeholder="enter task description" autocomplete="off" value="{{ old('description') }}">
                            <label for="floatingInput">description</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="date" name="deadline" class="form-control" id="floatingInput"
                                placeholder="Enter deadline date" autocomplete="off" value="{{ old('deadline') }}">
                            <label for="floatingInput">Deadline</label>
                        </div>

                        <div class="form-floating mb-3">
                            <button type="submit"id="floatingInput"@class(['p-2', 'bg-success', 'font-bold' => true])>submit</button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Sign Up End -->

@endsection
