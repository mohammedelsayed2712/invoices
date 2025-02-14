@extends('layouts.master')
@section('title', __('trans.sections'))
@section("breadcrumb")
<li class="breadcrumb-item">{{ __('trans.sections') }}</li>
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session()->get('Add') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ session()->get('delete') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session()->get('edit') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<!-- row -->
<div class="row">
  <div class="col-xl-12">
    <div class="card mg-b-20">
      <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
          <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal"
            href="#modaldemo8">اضافة قسم</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="file-export" class="table table-bordered text-nowrap" style="width: 100%">
            <thead>
              <tr>
                <th class="border-bottom-0">#</th>
                <th class="border-bottom-0">اسم القسم</th>
                <th class="border-bottom-0">الوصف</th>
                <th class="border-bottom-0">العمليات</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 0; ?>
              @foreach ($sections as $x)
              <?php $i++; ?>
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $x->name }}</td>
                <td>{{ $x->description }}</td>
                <td>
                  <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $x->id }}"
                    data-name="{{ $x->name }}" data-description="{{ $x->description }}" data-toggle="modal"
                    href="#exampleModal" title="تعديل"><i class="las la-pen"></i></a>

                  <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $x->id }}"
                    data-name="{{ $x->name }}" data-toggle="modal" href="#modaldemo9" title="حذف"><i
                      class="las la-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Section Modal -->
  <div class="modal" id="modaldemo8">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title">اضافة قسم</h6>
          <button aria-label="Close" class="close" data-dismiss="modal" type="button">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sections.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">اسم القسم</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">ملاحظات</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">تاكيد</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Section Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sections.update') }}" method="post" autocomplete="off">
            @method('patch')
            @csrf
            <div class="form-group">
              <input type="hidden" name="id" id="id" value="">
              <label for="recipient-name" class="col-form-label">اسم القسم:</label>
              <input class="form-control" name="name" id="name" type="text">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">ملاحظات:</label>
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">تاكيد</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Section Modal -->
  <div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title">حذف القسم</h6>
          <button aria-label="Close" class="close" data-dismiss="modal" type="button">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('sections.destroy') }}" method="post">
          @method('delete')
          @csrf
          <div class="modal-body">
            <p>هل انت متاكد من عملية الحذف ؟</p><br>
            <input type="hidden" name="id" id="id" value="">
            <input class="form-control" name="name" id="name" type="text" readonly>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-danger">تاكيد</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script>
  $('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');
    var description = button.data('description');
    var modal = $(this);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #description').val(description);
  });

  $('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');
    var modal = $(this);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
  });
</script>
@endsection