@if($setting['view-method'] =='native')
<div class="card">
	<div class="card-body">	
		<div class="toolbar-nav">
			<div class="row">
				
				<div class="col-md-6  text-left" >
			   		<a href="{{ ($prevnext['prev'] != '' ? url('jenisbarang/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm btn-primary" onclick="ajaxViewDetail('#jenisbarang',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
					<a href="{{ ($prevnext['next'] != '' ? url('jenisbarang/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm btn-primary" onclick="ajaxViewDetail('#jenisbarang',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>					
				</div>	
				<div class="col-md-6 text-right" >
					<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm btn-danger  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
				</div>
				

				
			</div>
		</div>
	
@endif	


		<table class="table  table-bordered" >
			<tbody>	
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Jenis Barang', (isset($fields['jenis_barang']['language'])? $fields['jenis_barang']['language'] : array())) }}</td>
						<td>{{ $row->jenis_barang}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tanggal', (isset($fields['cretaed_at']['language'])? $fields['cretaed_at']['language'] : array())) }}</td>
						<td>{{ date('',strtotime($row->cretaed_at)) }} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	
		 
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		

@include('sximo.module.template.ajax.viewjavascript')