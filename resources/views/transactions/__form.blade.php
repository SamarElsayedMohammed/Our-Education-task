<div class="form-group">
    <x-form.input type="number" class="form-control" id="trans-paidAmount" name="paidAmount" placeholder="trans paidAmount"
        id="trans-paidAmount" label='true' labelName='paidAmount' value="{{ $trans->paid_amount }}" required />
</div>
<div class="form-group">
    <x-form.input type="text" class="form-control" id="trans-currency" name="Currency"
        placeholder="ustranser currency" id="trans-currency" label='true' labelName='currency'
        value="{{ $trans->currency }}" required />
</div>
<div class="form-group">
    <x-form.input type="date" class="form-control" id="trans-paymentDate" name="paymentDate"
        placeholder="trans paymentDate" id="trans-paymentDate" label='true' labelName='paymentDate'
        value="{{ $trans->payment_date }}" required />
</div>
<div class="form-group">
    <label for="exampleSelect1">status code</label>
    {{-- @dd($trans->status_code) --}}
    <select class="form-control @error('statusCode') is-invalid @enderror " id="exampleSelect1" name="statusCode">
        <option value="1" @selected('authorized' == $trans->status_code)>authorized</option>
        <option value="2" @selected('decline' == $trans->status_code)>decline</option>
        <option value="3" @selected('refunded' == $trans->status_code)>refunded</option>

    </select>
    <x-form.error-feedback name="statusCode" />
</div>

<x-parent-email-component selected="{{ $trans->parent_email }}" />
