@foreach($ccmodel as $ccdetails)
<div class="container">

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Name</label>
            <input type="text" id="ccnmudt" value="{{$ccdetails->name}}" name="name" class="form-control"
                placeholder="Full Name">
        </div>
    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label>NIC</label>
            <input type="text" id="ccnicudt" name="nic" value="{{$ccdetails->nic}}" class="form-control"
                placeholder="nic">
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label>New Mobile</label>
                <input type="number" id="ccmobilenwudt" value="{{$ccdetails->pno}}" name="mobile" class="form-control"
                    placeholder="mobile">
                {{-- <small class="help-block form-text">If you need to update mobile, you can
                    update it by in this filed and also you need to confirm your mobile by
                    sending OTP to that entered number before update this.</small> --}}
            </div>
        </div>
    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
            <label>Address line 1</label>
            <input type="text" value="{{$ccdetails->line1}}" id="ccaddres1udt" name="address line 1"
                class="form-control" placeholder="address">
            <input type="text" value="{{$ccdetails->addressId}}" id="ccaddidudt" name="address line 1"
                class="form-control" hidden>
        </div>
        <div class="form-group col-md-4">
            <label>Address line 2</label>
            <input type="text" value="{{$ccdetails->line2}}" id="ccaddres2udt" name="address line 2"
                class="form-control" placeholder="address">
        </div>
        <div class="form-group col-md-4">
            <label>City</label>
            <input type="text" value="{{$ccdetails->city}}" id="cccityudt" name="city" class="form-control"
                placeholder="address">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
            <div class="input-group-btn"><button onclick="updateCashCollectorDetails({{$ccdetails->employeeId}})"
                    class="btn btn-info">Update
                    Basic Info</button>
            </div>
        </div>


    </div>
    <hr>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Username</label>
            <input type="text" value="{{$ccdetails->username}}" readonly id="ccunameudt" name="uname"
                class="form-control" placeholder="Username">
        </div>
        <div class="form-group col-md-6">
            <label>OTP Send</label>
            <div class="input-group-btn"><button class="btn btn-info">Send OTP</button>
            </div>
            <small class="help-block form-text">You need to send OTP to your entered
                mobile number, before you update any of your UserName,
                Password. </small>
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
            <label>Password</label>
            <input type="password" id="ccpw1" name="pw" class="form-control" placeholder="Password">
        </div>
        <div class="form-group col-md-4">
            <label>Confirm Password</label>
            <input type="password" id="ccpw1_confirmation" name="pw" class="form-control"
                placeholder="confirm Password">
        </div>
        <div class="form-group col-md-4">
            <label>OTP Code</label>
            <input type="text" id="ccotpudt" name="pw" class="form-control" placeholder="OTP">
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
            <div class="input-group-btn"><button onclick="updateCashCollectorCredintials({{$ccdetails->idlogin}})"
                    class="btn btn-info">Update Credential</button>
            </div>
        </div>


    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    {{-- <button type="button" onclick="updateCashCollectorDetails()" class="btn btn-primary">Update Info</button> --}}
</div>
@endforeach