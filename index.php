<?php
//product.php

include('database_connection.php');
include('function.php');
include('header.php');


?>
        <span id='alert_action'></span>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                                <h3 class="panel-title">Modal List</h3>
                            </div>
                        
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="product_data" class="table table-bordered table-striped">
                                <thead><tr>
                                     <th>ID</th>
                                    <th>Manufacturer</th>
                                    <th>Model</th>
                                    <th>Color</th>
                                    <th>Resgiatraion Date</th>
                                    <th>Quantity</th>
                                    <th>View</th>
                                    <th>Sold</th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
            </div>
        </div>

       

          <div id="categoryModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="category_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Manufacturer</h4>
                    </div>
                    <div class="modal-body">
                        <label>Enter Manufacturer Name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" required />
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="category_id" id="category_id"/>
                        <input type="hidden" name="btn_action" id="btn_action"/>
                        <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


        <div id="brandModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="brand_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Model</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                <?php echo fill_category_list($connect); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Enter Model Name</label>
                            <input type="text" name="brand_name" id="brand_name" class="form-control" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="brand_id" id="brand_id" />
                        <input type="hidden" name="btn_action" id="btn_action" />
                        <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div id="productModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Select Manufacturer</label>
                                <select name="category_ids" id="category_ids" class="form-control" required>
                                    <option value="">Select Manufacturer</option>
                                    <?php echo fill_category_list($connect);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Model</label>
                                <select name="brand_ids" id="brand_ids" class="form-control" required>
                                    <option value="">Select Model</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Enter Model color</label>
                                <input type="text" name="color" id="product_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Enter Model Description</label>
                                <textarea name="product_description" id="product_description" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Enter Product Quantity</label>
                                    <input type="text" name="product_quantity" id="product_quantity" class="form-control" rows="5" required pattern="[+-]?([0-9]*[.])?[0-9]+" /> 
                            </div>
                             <div class="form-group">
                                <label>Enter Registration Number</label>
                                
                                    <input type="text" name="registration" id="registration" class="form-control" rows="5" required pattern="[+-]?([0-9]*[.])?[0-9]+" /> 

                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="product_id" id="product_id" />
                            <input type="hidden" value="Add" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div id="productdetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Product Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="product_details"></Div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<script>
$(document).ready(function(){
    var productdataTable = $('#product_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"product_fetch.php",
            type:"POST"
        },
        "columnDefs":[
            {
                "targets":[7, 8, 9],
                "orderable":false,
            },
        ],
        "pageLength": 10
    });

    $('#add_button').click(function(){
        $('#productModal').modal('show');
        $('#product_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Product");
        $('#action').val("Add");
        $('#btn_action').val("Add");
    });

     $('#category_ids').change(function(){
        
        var category_id = $('#category_ids').val();
        var btn_action = 'load_brand';
        $.ajax({
            url:"model_details.php",
            method:"POST",
            data:{category_id:category_id, btn_action:btn_action},
            success:function(data)
            {
                $('#brand_ids').html(data);
            }
        });
    });
    

    $(document).on('submit', '#product_form', function(event){
        event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
    
        $.ajax({
            url:"model_details.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
                $('#product_form')[0].reset();
                $('#productModal').modal('hide');
                $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
                $('#action').attr('disabled', false);
                productdataTable.ajax.reload();
            }
        })
    });

    $(document).on('click', '.view', function(){

        var product_id = $(this).attr("id");
        var btn_action = 'product_details';
        $.ajax({
            url:"model_details.php",
            method:"POST",
            data:{product_id:product_id, btn_action:btn_action},
            success:function(data){
                $('#productdetailsModal').modal('show');
                $('#product_details').html(data);
            }
        })
    });

   

    $(document).on('click', '.delete', function(){
        var product_id = $(this).attr("id");
        var status = $(this).data("status");
        var btn_action = 'delete';
        if(confirm("Are you sure you want to Delete Model?"))
        {
            $.ajax({
                url:"model_details.php",
                method:"POST",
                data:{product_id:product_id, status:status, btn_action:btn_action},
                success:function(data){
                    $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
                    productdataTable.ajax.reload();
                }
            });
        }
        else
        {
            return false;
        }
    });




    $('#add_button').click(function(){
        $('#category_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Category");
        $('#action').val('Add');
        $('#btn_action').val('Add');
    });

    $(document).on('submit','#category_form', function(event){
        event.preventDefault();
        $('#action').attr('disabled','disabled');
        var form_data = $(this).serialize();

        $.ajax({
            url:"Manufacturer.php",
            method:"POST",
            data:form_data,

            success:function(data)
            {   

                $('#category_form')[0].reset();
                $('#categoryModal').modal('hide');
                $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
                $('#action').attr('disabled', false);
                productdataTable.ajax.reload();
            }
        })
    });

        $('#add_button').click(function(){
        $('#brandModal').modal('show');
        $('#brand_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Brand");
        $('#action').val('Add');
        $('#btn_action').val('Add');
    });

    $(document).on('submit','#brand_form', function(event){
        event.preventDefault();
        $('#action').attr('disabled','disabled');
        var form_data = $(this).serialize();
        $.ajax({
            url:"Model.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
                $('#brand_form')[0].reset();
                $('#brandModal').modal('hide');
                $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
                $('#action').attr('disabled', false);
                productdataTable.ajax.reload();
            }
        })
    });


   
    

});
</script>
