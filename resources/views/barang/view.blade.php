@extends('layouts.app')

@section('content')
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div class="card">
	<div class="card-body">

		<div class="toolbar-nav">
			<div class="row">
				<div class="col-md-6 ">
					<div class="btn-group">
						<a href="{{ url('barang?return='.$return) }}" class="tips btn btn-danger  btn-sm  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
						@if($access['is_add'] ==1)
				   		<a href="{{ url('barang/'.$id.'/edit?return='.$return) }}" class="tips btn btn-info btn-sm  " title="{{ __('core.btn_edit') }}"><i class="icon-note"></i></a>
						@endif
					</div>	
				</div>
				<div class="col-md-6 text-right">			
					<div class="btn-group">
				   		<a href="{{ ($prevnext['prev'] != '' ? url('barang/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i>  </a>	
						<a href="{{ ($prevnext['next'] != '' ? url('barang/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-primary btn-sm "> <i class="fa fa-arrow-right"></i>  </a>			
					</div>			
				</div>	

				
				
			</div>
		</div>
	
		<div class="table-responsive">
			<table class="table  table-bordered " >
				<tbody>	
			
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Nama Barang', (isset($fields['nama_barang']['language'])? $fields['nama_barang']['language'] : array())) }}</td>
						<td>{{ $row->nama_barang}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Jenis Barang', (isset($fields['jenis_barang']['language'])? $fields['jenis_barang']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->jenis_barang,'jenis_barang','1:tb_jenis:id:jenis_barang') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tanggal', (isset($fields['created_at']['language'])? $fields['created_at']['language'] : array())) }}</td>
						<td>{{ $row->created_at}} </td>
						
					</tr>
				
				</tbody>	
			</table>   

		 	

		</div>
			
	</div>
</div>		
@stop
