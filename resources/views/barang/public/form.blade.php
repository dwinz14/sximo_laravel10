

		 {!! Form::open(array('url'=>'barang', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Barang</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group row  " >
										<label for="Nama Barang" class=" control-label col-md-4 "> Nama Barang </label>
										<div class="col-md-8">
										  <input  type='text' name='nama_barang' id='nama_barang' value='{{ $row['nama_barang'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Jenis Barang" class=" control-label col-md-4 "> Jenis Barang </label>
										<div class="col-md-8">
										  <select name='jenis_barang[]' multiple rows='5' id='jenis_barang' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Tanggal" class=" control-label col-md-4 "> Tanggal </label>
										<div class="col-md-8">
										  
					{!! Form::text('created_at', $row['created_at'],array('class'=>'form-control form-control-sm datetime')) !!}
				 
										 </div> 
										 
									  </div> </fieldset></div>

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-default btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-default btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 <input type="hidden" name="action_task" value="public" />
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#jenis_barang").jCombo("{!! url('barang/comboselect?filter=tb_jenis:id:jenis_barang') !!}",
		{  selected_value : '{{ $row["jenis_barang"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
