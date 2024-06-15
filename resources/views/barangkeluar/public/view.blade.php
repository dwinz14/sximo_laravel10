<div class="container" class="pt-3 pb-3">
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-container" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
			
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Nama Barang', (isset($fields['nama_barang']['language'])? $fields['nama_barang']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->nama_barang,'nama_barang','1:tb_barang:id:nama_barang') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Jenis Barang', (isset($fields['jenis_barang']['language'])? $fields['jenis_barang']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->jenis_barang,'jenis_barang','1:tb_jenis:id:jenis_barang') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Qty Keluar', (isset($fields['qty_keluar']['language'])? $fields['qty_keluar']['language'] : array())) }}</td>
						<td>{{ $row->qty_keluar}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Created At', (isset($fields['created_at']['language'])? $fields['created_at']['language'] : array())) }}</td>
						<td>{{ $row->created_at}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	