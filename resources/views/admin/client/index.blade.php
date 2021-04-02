@extends('layouts.admin')
@section('title', 'Client')

@section('content')

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                              <p style="float: right;">  <a class="btn btn-primary" href="{{route('client-create')}}" role="button">Add new Client</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>sr no </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobail no</th>
                                                <th>Address</th>
                                                <th>Date of Birthday</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @php $i = 1;  @endphp
                                            @foreach($data as $data)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->phone}}</td>
                                                <td>{{$data->address}}</td>
                                                <td>{{date('d-m-Y', strtotime($data->birthday))}}</td>

                                                <td><img src="{{asset('images/'.$data->image)}}" height="100px" width="100px"></td>
                                                <td>
                                                <a href="{{route('client-edit',['id'=>$data->id])}}" class="btn btn-primary">edit</a>
                                                <a href="{{route('client-destroy',['id'=>$data->id])}}" class="btn btn-danger">Detele</a>

                                                </td>
                                               
                                            </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                
@endsection