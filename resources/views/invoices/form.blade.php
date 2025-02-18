<div class="form-body row gy-4">
  {{--
  <!-- Section Dropdown -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="section" class="form-label">@lang('trans.section')</label>
    <select name="section_id" id="section" class="form-control">
      <option value="">Select Section</option>
      @foreach($sections as $section)
      <option value="{{ $section->id }}">{{ $section->name }}</option>
      @endforeach
    </select>
    @error('section_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <!-- Product Dropdown -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
    <label for="product" class="form-label">@lang('trans.product')</label>
    <select name="product" id="product" class="form-control">
      <option value="">Select Product</option>
    </select>
    @error('product')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div> --}}

  <div class="col">
    <label for="inputName" class="control-label">القسم</label>
    <select name="section_id" class="form-control SelectBox" onclick="console.log($(this).val())"
      onchange="console.log('change is firing')">
      <!--placeholder-->
      <option value="" selected disabled>حدد القسم</option>
      @foreach ($sections as $section)
      <option value="{{ $section->id }}"> {{ $section->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="col">
    <label for="inputName" class="control-label">المنتج</label>
    <select id="product" name="product_id" class="form-control">
    </select>
  </div>
</div>

{{-- @push('scripts')
<script>
  $(document).ready(function() {
    $('select[name="section_id"]').on('change', function() {
        var SectionId = $(this).val();
        if (SectionId) {
            $.ajax({
                url: "/get-products/" + SectionId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var productDropdown = $('select[name="product"]');
                    productDropdown.empty();
                    productDropdown.append('<option value="">Select Product</option>');
                    $.each(data, function(key, value) {
                        productDropdown.append('<option value="' + key + '">' + value + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching products:", error);
                }
            });
        } else {
            $('select[name="product"]').empty().append('<option value="">Select Product</option>');
        }
    });
});

</script>
@endpush --}}

@section('js')
<script>
  $(document).ready(function() {
      $('select[name="section_id"]').on('change', function() {
          var sectionId = $(this).val();
          if (sectionId) {
              $.ajax({
                  url: "{{ URL::to('sections') }}/" + sectionId + '/get-products',
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                      $('select[name="product_id"]').empty();
                      $.each(data, function(key, value) {
                          $('select[name="product_id"]').append('<option value="' +
                              key + '">' + value + '</option>');
                      });
                  },
              });

          } else {
              console.log('AJAX load did not work');
          }
      });

  });

</script>
@endsection