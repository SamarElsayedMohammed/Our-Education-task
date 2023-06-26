<div class="form-group">
    <x-form.input type="number" class="form-control" id="user-balance" name="balance" placeholder="user balance"
        id="user-balance" label='true' labelName='balance' value="{{ $user->balance }}" required />
</div>
<div class="form-group">
    <x-form.input type="text" class="form-control" id="user-currency" name="currency" placeholder="user currency"
        id="user-currency" label='true' labelName='currency' value="{{ $user->currency }}" required />
</div>
<div class="form-group">
    <x-form.input type="email" class="form-control" id="user-email" name="email" placeholder="user email"
        id="user-email" label='true' labelName='email' value="{{ $user->email }}" required />
</div>
