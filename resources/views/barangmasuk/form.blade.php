@extends('layouts.app')

@section('content')
    <div class="page-titles">
        <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
    </div>
    <div class="card">
        <div class="card-body">


            {!! Form::open([
                'url' => 'barangmasuk?return=' . $return,
                'class' => 'form-horizontal  validated sximo-form',
                'files' => true,
                'id' => 'FormTable',
            ]) !!}
            <div class="toolbar-nav">
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{ url($pageModule . '?return=' . $return) }}" class="tips btn btn-danger  btn-sm "
                            title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>
                    </div>
                    <div class="col-md-6  text-right ">
                        <div class="btn-group">

                            <button name="apply" class="tips btn btn-sm btn-info  " title="{{ __('core.btn_back') }}">
                                {{ __('core.sb_apply') }} </button>
                            <button name="save" class="tips btn btn-sm btn-primary " id="saved-button"
                                title="{{ __('core.btn_back') }}"> {{ __('core.sb_save') }} </button>


                        </div>
                    </div>

                </div>
            </div>



            <ul class="parsley-error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div class="">
                <div class="col-md-12">
                    <fieldset>
                        <legend> Barangmasuk</legend>
                        {!! Form::hidden('id', $row['id']) !!}
                        <div class="form-group row  ">
                            <label for="Nama Barang" class=" control-label col-md-4 "> Nama Barang </label>
                            <div class="col-md-8">
                                <select name='nama_barang' rows='5' id='nama_barang' class='select2 '></select>
                            </div>

                        </div>
                        <div class="form-group row  ">
                            <label for="Jenis Barang" class=" control-label col-md-4 "> Jenis Barang </label>
                            <div class="col-md-8">
                                <select name='jenis_barang' rows='5' id='jenis_barang' class='select2 '></select>
                            </div>

                        </div>
                        <div class="form-group row  ">
                            <label for="Qty masuk" class=" control-label col-md-4 "> Qty masuk </label>
                            <div class="col-md-8">
                                <input type='text' name='qty_masuk' id='qty_masuk' value='{{ $row['qty_masuk'] }}'
                                    class='form-control form-control-sm ' />
                            </div>

                        </div>
                        <div class="form-group row  ">
                            <label for="Tanggal" class=" control-label col-md-4 "> Tanggal </label>
                            <div class="col-md-8">

                                {!! Form::text('created_at', $row['created_at'], ['class' => 'form-control form-control-sm datetime']) !!}

                            </div>

                        </div>
                    </fieldset>
                </div>

            </div>

            <input type="hidden" name="action_task" value="save" />
            {!! Form::close() !!}
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {



            $("#nama_barang").jCombo("{!! url('barangmasuk/comboselect?filter=tb_barang:id:nama_barang') !!}", {
                selected_value: '{{ $row['nama_barang'] }}'
            });

            $("#jenis_barang").jCombo("{!! url('barangmasuk/comboselect?filter=tb_jenis:id:jenis_barang') !!}", {
                selected_value: '{{ $row['jenis_barang'] }}'
            });



            $('.removeMultiFiles').on('click', function() {
                var removeUrl = '{{ url('barangmasuk/removefiles?file=') }}' + $(this).attr('url');
                $(this).parent().remove();
                $.get(removeUrl, function(response) {});
                $(this).parent('div').empty();
                return false;
            });

        });
    </script>
@stop
