@extends('layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products </h4>
                        <a style="max-width:150px ; float:right; display:inline-block" href="{{url('admin/dashboard')}}" class="btn btn-block btn-primary ">View all product </a>
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
                                           
                                                @if (!empty($product['product_image']))
                                                <img style="width:80px; height:80px; " src="{{asset('admin/font/images/product_images/small/'.$product['product_image'])}}" />
                                                @endif
                                            
                                        </th>
                                        <thead>
                                        <th>
                                             ID :  {{$product->id}} 
                                        </th>
                                    </thead>
                                        
                                        <thead>
                                        <th>
                                            Prix achat : {{$product->prix_achat}}  
                                        </th>
                                    </thead>
                                        
                                        <thead>
                                        <th>
                                          prix vente : {{$product->prix_vente}}
                                        </th>
                                       
                                           
                                       
                                    </thead>
                                       
                                        <thead>
                                        <th>
                                            quantité :  {{$product->quantité}}
                                          </th>
                                         
                                            
                                       
                                        </thead>
                                      
                                       
                                       
                                    </tr>
                                </thead>
                               
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