<div class="form-body row gy-4">

  {{-- Invoice Number --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="invoice_number" class="form-label">@lang('trans.invoice_number')</label>
    <input type="text" name="invoice_number" id="invoice_number" class="form-control"
      value="{{ $code ?? ($invoice->invoice_number ?? old('invoice_number')) }}">
    @error('invoice_number')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  {{-- Invoice Date --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="invoice_Date" class="form-label">@lang('trans.invoice_Date')</label>
    <input type="date" name="invoice_Date" id="invoice_Date" class="form-control"
      value="{{ old('invoice_Date', $invoice->invoice_Date ?? date('Y-m-d')) }}">
    @error('invoice_Date')
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

  <!-- Section -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="section_id" class="form-label">@lang('trans.section')</label>
    <select name="section_id" id="section_id" class="form-control">
      <option value="">@lang('trans.select_section')</option>
      @foreach($sections as $section)
      <option value="{{ $section->id }}" {{ ($invoice->section_id ?? old('section_id')) == $section->id ? 'selected' :
        '' }}>
        {{ $section->name }}
      </option>
      @endforeach
    </select>
    @error('section_id')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Product -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="product_id" class="form-label">@lang('trans.product')</label>
    <select name="product_id" id="product_id" class="form-control">
      <option value="">@lang('trans.select_product')</option>
      @foreach($products as $product)
      <option value="{{ $product->id }}" {{ ($invoice->product_id ?? old('product_id')) == $product->id ? 'selected' :
        '' }}>
        {{ $product->name }}
      </option>
      @endforeach
    </select>
    @error('product_id')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Amount Collection -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="amount_collection" class="form-label">@lang('trans.amount_collection')</label>
    <input type="text" name="amount_collection" id="amount_collection" class="form-control"
      value="{{ $invoice->amount_collection ?? old('amount_collection') }}">
    @error('amount_collection')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Amount Commission -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="amount_commission" class="form-label">@lang('trans.amount_commission')</label>
    <input type="text" name="amount_commission" id="amount_commission" class="form-control"
      value="{{ $invoice->amount_commission ?? old('amount_commission') }}" oninput="myFunction()">
    @error('amount_commission')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Discount -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="discount" class="form-label">@lang('trans.discount')</label>
    <input type="text" name="discount" id="discount" class="form-control"
      value="{{ $invoice->discount ?? old('discount', 0) }}" oninput="myFunction()">
    @error('discount')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Rate VAT -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="rate_vat" class="form-label">@lang('trans.rate_vat')</label>
    <input type="text" name="rate_vat" id="rate_vat" class="form-control"
      value="{{ $invoice->rate_vat ?? old('rate_vat') }}" oninput="myFunction()">
    @error('rate_vat')
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
  </div>

  <!-- Value VAT -->
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    <label for="value_vat" class="form-label">@lang('trans.value_vat')</label>
    <input type="text" name="value_vat" id="value_vat" class="form-control" readonly>
  </div>

  <!-- Total -->
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    <label for="total" class="form-label">@lang('trans.total')</label>
    <input type="text" name="total" id="total" class="form-control" readonly>
  </div>


  {{-- Payment Date --}}
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="payment_date" class="form-label">@lang('trans.payment_date')</label>
    <input type="date" name="payment_date" id="payment_date" class="form-control"
      value="{{ $invoice->payment_date ?? old('payment_date') }}">
    @error('payment_date')
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

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function() {
    function myFunction() {
      let amount_commission = parseFloat(document.getElementById("amount_commission").value) || 0;
      let discount = parseFloat(document.getElementById("discount").value) || 0;
      let rate_vat = parseFloat(document.getElementById("rate_vat").value) || 0;

      let amount_commission2 = amount_commission - discount;

      if (amount_commission2 < 0) {
          alert('Discount cannot exceed commission amount!');
          document.getElementById("discount").value = 0;
          return;
      }

      let value_vat = (amount_commission2 * rate_vat) / 100;
      let total = amount_commission2 + value_vat;

      document.getElementById("value_vat").value = value_vat.toFixed(2);
      document.getElementById("total").value = total.toFixed(2);
    }

    // Attach function to inputs
    document.getElementById("amount_commission").addEventListener("input", myFunction);
    document.getElementById("discount").addEventListener("input", myFunction);
    document.getElementById("rate_vat").addEventListener("input", myFunction);
  });
</script>
@endpush