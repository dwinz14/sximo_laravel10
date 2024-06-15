@if($setting['view-method'] =='native')
<div class="card">
	<div class="card-body">	
		<div class="toolbar-nav">
			<div class="row">
				<div class="col-md-6" >
					<a href="javascript://ajax" onclick="ajaxViewClose('#{{ $pageModule }}')" class="tips btn btn-sm btn-danger  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>	
				</div>
				<div class="col-md-6 text-right " >
					<div class="btn-group">
						<a href="{{ ($prevnext['prev'] != '' ? url('masterbarang/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-primary btn-sm" onclick="ajaxViewDetail('#masterbarang',this.href); return false; "><i class="fa fa-arrow-left"></i>  </a>	
						<a href="{{ ($prevnext['next'] != '' ? url('masterbarang/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-primary  btn-sm " onclick="ajaxViewDetail('#masterbarang',this.href); return false; "> <i class="fa fa-arrow-right"></i>  </a>
			   		</div>			
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Nama Barang', (isset($fields['nama_barang']['language'])? $fields['nama_barang']['language'] : array())) }}</td>
						<td>{{ $row->nama_barang}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Qty', (isset($fields['qty']['language'])? $fields['qty']['language'] : array())) }}</td>
						<td>{{ $row->qty}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Created At', (isset($fields['created_at']['language'])? $fields['created_at']['language'] : array())) }}</td>
						<td>{{ $row->created_at}} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	
		 
@if($setting['view-method'] =='native')
	</div>
</div>
@endif		