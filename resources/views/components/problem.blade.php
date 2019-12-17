
@for($i = 1; $i <= 10; $i++)
    <div class="form-group row">
        <label for="problem0" class="col-md-4 col-form-label text-md-right">{{ __('Problem').$i  }}</label>

        <div class="col-md-6">
            <input
                id="problem{{ $i - 1 }}"
                type="text"
                class="form-control @error('problem'.($i - 1)) is-invalid @enderror"
                name="problem{{ $i - 1 }}"
                value="{{ $problem_value }}"
                autocomplete="problem{{ $i - 1 }}"
                autofocus
            >

            @error('problem'.($i - 1))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>
@endfor
