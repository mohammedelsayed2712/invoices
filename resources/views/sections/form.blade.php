<div class="form-body row gy-4">

  {{-- Invoice Number --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="invoice_number" class="form-label">@lang('trans.invoice_number')</label>
    <input type="text" name="invoice_number" id="invoice_number" class="form-control"
      value="{{ $invoice->invoice_number ?? old('invoice_number') }}">
    @error('invoice_number')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  {{-- Invoice Date --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="invoice_date" class="form-label">@lang('trans.invoice_date')</label>
    <input type="date" name="invoice_date" id="invoice_date" class="form-control"
      value="{{ $invoice->invoice_date ?? old('invoice_date') }}">
    @error('invoice_date')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  {{-- Due Date --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="due_date" class="form-label">@lang('trans.due_date')</label>
    <input type="date" name="due_date" id="due_date" class="form-control"
      value="{{ $invoice->due_date ?? old('due_date') }}">
    @error('due_date')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Product Field -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="product" class="form-label">@lang('trans.product')</label>
    <input type="text" name="product" id="product" class="form-control"
      value="{{ $invoice->product ?? old('product') }}">
    @error('product')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Section Field -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="section" class="form-label">@lang('trans.section')</label>
    <input type="text" name="section" id="section" class="form-control"
      value="{{ $invoice->section ?? old('section') }}">
    @error('section')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Discount Field -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="discount" class="form-label">@lang('trans.discount')</label>
    <input type="text" name="discount" id="discount" class="form-control"
      value="{{ $invoice->discount ?? old('discount') }}">
    @error('discount')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Rate Vat -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="rate_vat" class="form-label">@lang('trans.rate_vat')</label>
    <input type="text" name="rate_vat" id="rate_vat" class="form-control"
      value="{{ $invoice->rate_vat ?? old('rate_vat') }}">
    @error('rate_vat')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  {{-- Value Vat --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="value_vat" class="form-label">@lang('trans.value_vat')</label>
    <input type="text" name="value_vat" id="value_vat" class="form-control"
      value="{{ $invoice->value_vat ?? old('value_vat') }}">
    @error('value_vat')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  {{-- Total --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="total" class="form-label">@lang('trans.total')</label>
    <input type="number" name="total" id="total" class="form-control" value="{{ $invoice->total ?? old('total') }}">
    @error('total')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Value Status -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="value_status" class="form-label">@lang('trans.value_status')</label>
    <input type="number" name="value_status" id="value_status" class="form-control"
      value="{{ $invoice->value_status ?? old('value_status') }}">
    @error('value_status')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- User -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="user" class="form-label">@lang('trans.user')</label>
    <input type="text" name="user" id="user" class="form-control" value="{{ $invoice->user ?? old('user') }}">
    @error('user')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Status -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="status" class="form-label">@lang('trans.status')</label>
    <select name="status" id="status" class="form-control">
      <option value="active" {{ ($invoice->status ?? old('status')) == 'active' ? 'selected' : ''
        }}>@lang('trans.active')</option>
      <option value="inactive" {{ ($invoice->status ?? old('status')) == 'inactive' ? 'selected' : ''
        }}>@lang('trans.inactive')</option>
    </select>
    @error('status')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <!-- Note -->
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="note" class="form-label">@lang('trans.note')</label>
    <textarea name="note" id="note" class="form-control" rows="1">{{ $invoice->note ?? old('note') }}</textarea>
    @error('note')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

</div>