@foreach($ccmodel as $ccdetails)

<div class="container">

    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Note</label>
            <textarea name="customerdetilas" id="ccdetilasudt" rows="5" placeholder="About Customer..."
                class="form-control">{{$ccdetails->note}}</textarea>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="button" onclick="updateCashCollectorNote({{$ccdetails->idcollector}})" class="btn btn-primary">Update
        Note</button>
</div>

@endforeach