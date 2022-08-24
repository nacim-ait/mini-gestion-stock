@extends('layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products </h4>
                   
             <form class="forms-sample"  action="{{url('admin/search-product')}}"   method="post" enctype="multipart/form-data">
                 @csrf
                 <div> 
                <input  style="max-width:150px ; float:left; display:inline-block" type="text" class="form-control" id="recherche" name="recherche" placeholder="recherche"     required="">
                        <button style="max-width:150px ; float:left; display:inline-block" class="btn btn-info">research</button>   
                    </div>
                    
                    </form>
             
                        <a style="max-width:150px ; float:right; display:inline-block" href="{{url('admin/create-product')}}" class="btn btn-block btn-primary ">Add product </a>
                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success</strong> {{Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table id="sections"  class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                             ID 
                                        </th>
                                        <th>
                                            Product Name 
                                        </th>
                                        <th>
                                            Prix achat
                                        </th>
                                        <th>
                                            Prix vente  
                                        </th>
                                        <th>
                                          quantité
                                        </th>
                                        <th>
                                            product image
                                        </th>
                                       
                                        <th>
                                            Actions   
                                        </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product )
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->prix_achat}}</td>
                                        <td>{{$product->prix_vente}}</td>
                                      
                                        <td>
                                            
                                            {{$product->quantité}}
                                            <a href="{{url('admin/edit-quantité/'.$product['id'])}}" class="btn btn-primary btn-sm">+</a>
                                            <a href="{{url('admin/edit-quantité-moin/'.$product['id'])}}" class="btn btn-primary btn-sm">-</a>
                                        </td>
                                        <td>
                                            @if (!empty($product['product_image']))
                                            <img style="width:80px; height:80px; " src="{{asset('admin/font/images/product_images/small/'.$product['product_image'])}}" />
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('admin/show-product/'.$product['id'])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{url('admin/add-edit-product/'.$product['id'])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{url('admin/delete-product/'.$product['id'])}}" onclick="return confirm('Are you sure to delete this data ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            
                                        </td>
                                    </tr>
                                    @endforeach
                                  
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
            
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    
    <!-- partial -->
</div>
<script src="{{asset("vendor/chart.js/Chart.min.js")}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset("js/demo/chart-area-demo.js")}}"></script>
<script src="{{asset("js/demo/chart-pie-demo.js")}}"></script>
@endsection