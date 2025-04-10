@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.reply.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Reply">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reply.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reply.fields.nik') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reply.fields.komitmen') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($replies as $key => $reply)
                                    <tr data-entry-id="{{ $reply->id }}">
                                        <td>
                                            {{ $reply->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reply->nik ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reply->komitmen->name ?? '' }}
                                        </td>
                                        <td>



                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Reply:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection