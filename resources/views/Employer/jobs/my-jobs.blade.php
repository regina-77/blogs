@extends('layouts.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">All Jobs</h6>
                <a href="{{ route('employer.createjob') }}">Add New Job</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0 ml-5">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">id</th>
                            <th scope="col">Tittle</th>

                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $key => $job)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>{{ ++$key }}</td>
                                <td>{{ $job->name }} <br>
                                    <span class="bg-success badge">{{ $job->category }}</span>
                                </td>
                                @php
                                    $payment = App\Models\PayPalPayment::where('user_id', Auth::user()->id)
                                        ->where('order_id', $job->id)
                                        ->first();
                                @endphp
                                <td>{{ $job->description }}</td>
                                <td>{{ $job->status }}</td>
                                <td>{{ $job->deadline }}</td>
                                @if ($payment)
                                    <td>{{ $payment->payment_status }}</td>
                                    <td>{{ $payment->payment_amount }}</td>
                                @else
                                    <td>Not Paid</td>
                                    <td><a href="{{ route('employer.payorder',$job->slug) }}" class="btn btn-success" >Pay Now</a></td>
                                @endif

                                <td><a class="btn btn-sm btn-primary" href="#">view</a>|<a
                                        class="btn btn-sm btn-primary" href="#">Delete</a>|<a
                                        class="btn btn-sm btn-primary" href="#">update</a></td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>



    </div>
@endsection
