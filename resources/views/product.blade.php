@extends('/partial/master')

@section('title','Products')

@section('container')

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h1 class="dashboard-title">Products</h1>
        </div>
        <div class="col-6 dashboard-title text-end">
            <button data-bs-toggle="modal" data-bs-target="#addInfo" class="btn-outline">+ Add Product</button>
        </div>
    </div>
</div>
<div class="container-fluid section-padding">
    <div class="row mb-5 g-4">
        <div class="col-12">
            <div class="card summary-card" style="width: 100%">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="productTable"
                                    class="table table-borderless align-middle text-center dashboardTable customTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Brand</th>
                                            <th scope="col">Product Slug</th>
                                            <th scope="col">Product Tag</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($product as $p)
                                        @foreach($product->slug as $s)
                                        @foreach($product->tag as $t)
                                        <tr >
                                            <td>{{$p->product_name}}</td>
                                            <td>{{$p->product_brand}}</td>
                                            <td>{{$s->slug}}</td>
                                            <td>{{$t->tag}}</td>
                                            
                                            <td class="actionBtn text-center">
                                                
                                                <button  data-bs-toggle="modal" data-bs-target="#viewInfo"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path fill="#BDBDBD"
                                                            d="M21.92 11.6C19.9 6.91 16.1 4 12 4s-7.9 2.91-9.92 7.6a1 1 0 000 .8C4.1 17.09 7.9 20 12 20s7.9-2.91 9.92-7.6a1 1 0 000-.8zM12 18c-3.17 0-6.17-2.29-7.9-6C5.83 8.29 8.83 6 12 6s6.17 2.29 7.9 6c-1.73 3.71-4.73 6-7.9 6zm0-10a4 4 0 100 8 4 4 0 000-8zm0 6a2 2 0 110-4 2 2 0 010 4z" />
                                                    </svg>
                                                </button>
                                                <!--<button data-bs-toggle="modal" data-bs-target="#editInfo">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path fill="#BDBDBD"
                                                            d="M5 18h4.24a1 1 0 00.71-.29l6.92-6.93L19.71 8a1 1 0 000-1.42l-4.24-4.29a1 1 0 00-1.42 0l-2.82 2.83-6.94 6.93a.999.999 0 00-.29.71V17a1 1 0 001 1zm9.76-13.59l2.83 2.83-1.42 1.42-2.83-2.83 1.42-1.42zM6 13.17l5.93-5.93 2.83 2.83L8.83 16H6v-2.83zM21 20H3a1 1 0 100 2h18a1 1 0 000-2z" />
                                                    </svg>

                                                </button>-->
                                                <button  data-bs-toggle="modal" data-bs-target="#deleteInfo"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path fill="#EB5757"
                                                            d="M10 16.8a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1zm10-12h-4v-1a3 3 0 00-3-3h-2a3 3 0 00-3 3v1H4a1 1 0 000 2h1v11a3 3 0 003 3h8a3 3 0 003-3v-11h1a1 1 0 100-2zm-10-1a1 1 0 011-1h2a1 1 0 011 1v1h-4v-1zm7 14a1 1 0 01-1 1H8a1 1 0 01-1-1v-11h10v11zm-3-1a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1z" />
                                                    </svg>

                                                </button> 
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Add Product -->
<div class="modal custom-modal add-modal fade" id="addInfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#BDBDBD"
                            d="M13.41 12l6.3-6.29a1.004 1.004 0 10-1.42-1.42L12 10.59l-6.29-6.3a1.004 1.004 0 00-1.42 1.42l6.3 6.29-6.3 6.29a1 1 0 000 1.42.998.998 0 001.42 0l6.29-6.3 6.29 6.3a.999.999 0 001.42 0 1 1 0 000-1.42L13.41 12z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id='profrm'>
                    @csrf
                    <div class="row">
                        <div class="col-12 form-input">
                            <label for="name">Product Name</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="product_name" name="product_name">
                        </div>
                        <div class="col-12 form-input">
                            <label for="name">Product Brand</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="product_brand" name="product_brand">
                        </div>
                        
                        <div class="col-12 form-input">
                            <label for="select" class=" form-control-label">Product Slug</label>
                            <select name="slug_id" id="slug_id" class="form-control">
                                <option value="0">Please select</option>
                                @foreach($slug as $s)
                                <option value="{{$s->id}}">{{$s->slug}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 form-input">
                            <label for="select" class=" form-control-label">Product Tag</label>
                            <select name="tag_id" id="tag_id" class="form-control">
                                <option value="0">Please select</option>
                                @foreach($tag as $t)
                                <option value="{{$t->id}}">{{$t->tag}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit">Add Product</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- End Product -->

<!-- Edit Product -->
<div class="modal custom-modal add-modal fade" id="editInfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#BDBDBD"
                            d="M13.41 12l6.3-6.29a1.004 1.004 0 10-1.42-1.42L12 10.59l-6.29-6.3a1.004 1.004 0 00-1.42 1.42l6.3 6.29-6.3 6.29a1 1 0 000 1.42.998.998 0 001.42 0l6.29-6.3 6.29 6.3a.999.999 0 001.42 0 1 1 0 000-1.42L13.41 12z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id='producteditfrm'>
                    @csrf
                    <input type="hidden" id="id" name="id" />
                    <div class="row">
                        <div class="col-12 form-input">
                            <label for="name">Product Name</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="product_name2" name="product_name2">
                        </div>
                        <div class="col-12 form-input">
                            <label for="name">Product Brand</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="product_brand2" name="product_brand2">
                        </div>
                        <div class="col-12 form-input">
                            <label for="name">Product Slug</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="productslug2" name="productslug2">
                        </div>
                        <div class="col-12 form-input">
                            <label for="name">Product Tag</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="producttag2" name="producttag2">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit">Update Product</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- End Edit Product -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Add -->
<script >
// add form validation
        $(document).ready(function() {
            $("#profrm").validate({
                rules: {
                    product_name: {
                        required: true,
                        maxlength: 15,
                    },
                    product_brand: {
                        required: true,
                        maxlength: 15,
                    },

                    slug_id: {
                    required: true,
                    },

                    tag_id: {
                    required: true,
                    },
                },
                messages: {
                    product_name: {
                        required: 'Please insert  name',
                    },
                    product_brand: {
                        required: 'Please insert brand',
                    },

                    slug_id: {
                    required: 'Please Select Slug',
                    },

                    tag_id: {
                    required: 'Please Select Tag',
                    },
                    
                },
                errorPlacement: function(label, element) {
                    label.addClass('mt-2 text-danger');
                    label.insertAfter(element);
                },
            });

            $("#producteditfrm").validate({
                rules: {
                    product_name: {
                        required: true,
                        maxlength: 15,
                    },
                    product_brand: {
                        required: true,
                        maxlength: 15,
                    },

                    slug_id: {
                    required: true,
                    },

                    tag_id: {
                    required: true,
                    },
                },
                messages: {
                    product_name: {
                        required: 'Please insert  name',
                    },
                    product_brand: {
                        required: 'Please insert brand',
                    },
                    slug_id: {
                    required: 'Please Select Slug',
                    },
                    tag_id: {
                    required: 'Please Select Tag',
                    },
                },
                errorPlacement: function(label, element) {
                    label.addClass('mt-2 text-danger');
                    label.insertAfter(element);
                },
            });
        });

jQuery('#profrm').submit(function(e){
        e.preventDefault();

        let product_name=$('#product_name').val();
        let product_brand=$('#product_brand').val();
        let slug_id=$('#slug_id').val();
        let tag_id=$('#tag_id').val();
        let _token=$('input[name=_token]').val();

        $.ajax({
            url:"{{url('/addproduct')}}",
            type:'POST',
            data:{
                product_name:product_name,
                product_brand:product_brand,
                slug_id:slug_id,
                tag_id:tag_id,
                _token:_token
            },
            success:function(response){
                console.log(response);
                if(response){
                    //alert(response.data.id);
                    $('#productTable tbody').prepend('<tr><td>'+ response.data.product_name +'</td><td>'+ response.data.product_brand +'</td><td>'+ response.data.slug +'</td><td>'+ response.data.tag +'</td><td class="actionBtn text-center"><button onclick="editproduct('+ response.data.id +')" data-bs-toggle="modal" data-bs-target="#viewInfo"><svg xmlns="http://www.w3.org/2000/svg" width="24"  height="24" fill="none" viewBox="0 0 24 24"><path fill="#BDBDBD"  d="M21.92 11.6C19.9 6.91 16.1 4 12 4s-7.9 2.91-9.92 7.6a1 1 0 000 .8C4.1 17.09 7.9 20 12 20s7.9-2.91 9.92-7.6a1 1 0 000-.8zM12 18c-3.17 0-6.17-2.29-7.9-6C5.83 8.29 8.83 6 12 6s6.17 2.29 7.9 6c-1.73 3.71-4.73 6-7.9 6zm0-10a4 4 0 100 8 4 4 0 000-8zm0 6a2 2 0 110-4 2 2 0 010 4z" /> </svg> </button></td></tr>');
                    $('#profrm')[0].reset();
                    $('#addInfo').modal('hide');
                }
            }
        })
    });
</script>

@endsection