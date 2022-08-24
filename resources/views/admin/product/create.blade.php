@extends('layout')
@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">add product
                <a href="{{url('admin/dashboard')}}" class="float-right btn btn-success">view all</a>
            </h6>
        </div>
        <div class="card-body">
           
            <div class="table-responsive">

                <form class="forms-sample" @if(empty($product['id'])) action="{{url('admin/add-edit-product')}}" @else action="{{url('admin/add-edit-product/'.$product['id'])}}"  @endif method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                    
                    <div class="form-group">
                      <label for="product_name">Product Name</label>
                      <input type="text" class="form-control" id="product_name" name="name" @if(!empty($product['name'])) value="{{$product['name']}}"  @else  value="{{old('name')}}"  @endif  required="">
                    </div>
                   
                  
                   <div class="form-group">
                     <label for="prix_achat"> Prix achat</label>
                     <input type="text" class="form-control" id="product_price" name="prix_achat" @if(!empty($product['prix_achat'])) value="{{$product['prix_achat']}}"  @else  value="{{old('prix_achat')}}"  @endif  required="">
                   </div>
                   <div class="form-group">
                    <label for="prix_vente"> Prix vente</label>
                    <input type="text" class="form-control" id="prix_vente" name="prix_vente" @if(!empty($product['prix_vente'])) value="{{$product['prix_vente']}}"  @else  value="{{old('prix_vente')}}"  @endif  required="">
                  </div>
                  <div class="form-group">
                    <label for="quantité"> quantité</label>
                    <input type="text" class="form-control" id="quantité" name="quantité" @if(!empty($product['quantité'])) value="{{$product['quantité']}}"  @else  value="{{old('quantité')}}"  @endif  required="">
                  </div>
                   
                    
                   
                     <div class="form-group">
                       <label for="product_image">Product image</label>
                       <input type="file" class="form-control" id="product_image" name="product_image" required="">
                     </div>
                    @if (!empty($product['product_image']))
                     <a target="blank" href="{{url('admin/font/images/product_images/'.$product['product_image'])}}">View Image</a>&nbsp;&nbsp;
                     @endif
                     
                   

           
                         <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  
                  </form>
                
                
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
    <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2020</span>
    </div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>


@endsection