@extends('layouts.admin')
@section('title', 'Client Create')
@section('content')
<div class="card mb-4">
   <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      DataTable Example
      <p style="float: right;">  <a class="btn btn-primary" href="{{route('client-index')}}" role="button">Back</a>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <div class="container">
            <div id="accordion">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="text-center">
                        <h3>High School Admission Recommendation Form</h3>
                     </div>
                  </div>
               </div>
               <div class="card card-default">
                  <div class="card-header">
                     <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <i class="glyphicon glyphicon-search text-gold"></i>
                        <b>SECTION I: TO BE COMPLETED BY APPLICANT</b>
                        </a>
                     </h4>
                  </div>
                  <div id="collapse1" class="collapse show">
                     <div class="card-body"> 
                        <form action="{{route('main_category-update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data" >
                           @csrf
                           <div class="row">
                              <div class="col-md-3 col-lg-6">
                                 <div class="form-group">
                                    <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Enter Category Name" />
                                 </div>
                              </div>
                              <div class="col-md-3 col-lg-6 ">
                                 <div class="form-group">
                                    <input type="submit" value="submit" class="btn btn-primary">
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection