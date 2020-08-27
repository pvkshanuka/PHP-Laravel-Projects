
@foreach($cvmodel as $cdata)
    

<div class="row">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Update Guarantor</strong>
        </div>
        <div class="card-body">

            
            <div class="row">
                <div class="col-md-3">
                    <div class="container">
                        <div class="row  text-center">
                            <img src="{{ asset($cdata->img) }}" width="400px;"
                                class="avatar img-circle img-thumbnail">
                        </div><br>

                        {{-- <div class="row  text-center">
                            <span>Select Customer Image</span>
                        </div>
                        <div class="row  text-center">
                            <input type="file" class="text-center center-block file-upload">
                        </div> --}}

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlInput1">Name</label>
                        <input type="text" id="cusname" class="form-control" value="{{$cdata->name}}" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="form-row">
                      
                        <div class="form-group col-md-5">
                            <label>NIC</label>
                            <input type="text" id="cusnic" value="{{$cdata->nic}}" class="form-control" placeholder="nic" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                          
                        </div>
                        <div class="form-group col-md-4">
                            <label>Mobile1</label>
                            <input type="number" value="{{$cdata->pno}}" id="mob1" class="form-control" placeholder="mobile Number">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Mobile2</label>
                            <input type="number" id="mob2" value="{{$cdata->pno2}}" class="form-control" placeholder="mobile Number">
                        </div>
                    </div>

                </div>
            </div>
         
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Address 1</label>
                    <input type="text" id="cusad1" value="{{$cdata->line1}}" class="form-control" placeholder="address 1">
                    <input type="hidden" id="cusadId" value="{{$cdata->addressId}}" class="form-control" placeholder="address 1">
                </div>
                <div class="form-group col-md-4">
                    <label>Address 2</label>
                    <input type="text" id="cusad2" value="{{$cdata->line2}}" class="form-control" placeholder="address 2">
                </div>
                <div class="form-group col-md-4">
                    <label>City</label>
                    <input type="text" id="cuscity" value="{{$cdata->city}}" class="form-control" placeholder="city">
                </div>
            </div>
        
       
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Note</label>
                    <textarea  name="textarea-input" id="cusnote" rows="5"
                        placeholder="{{$cdata->details}}" class="form-control"></textarea>
                </div>
            </div>

            <div id="pay-invoice">
                <div class="card-body">

                    <button id="payment-button" type="submit" onclick="updatecustomer({{$cdata->guarantorId}});" class="btn btn-sm btn-info btn-block">
                        <i class="fa fa-plus fa-sm"></i>&nbsp;
                        <span id="payment-button-amount">Update</span>
                    </button>
                </div>

            </div>
        </div> <!-- .card -->

    </div>
</div>
@endforeach