@props(['selected' => ''])
<div class="form-group">
    <label for="exampleSelect1">Parent Email</label>
    <select class="form-control
    @error('parentEmail') is-invalid @enderror
    " id="exampleSelect1"
        name="parentEmail">
        @foreach ($parentsEmail as $item)
            <option value="{{ $item }}" @selected($item == $selected)>{{ $item }}</option>
        @endforeach
    </select>
    <x-form.error-feedback name="parentEmail" />
</div>
