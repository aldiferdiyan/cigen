<div class='row-fluid'>
<div class="span12">
    
    
<?php echo $this->load->view('_layouts/menus');?>


<div class="input-prepend input-append">
<form action='<?php echo base_url('Admintest/search');?>' method='get'>
<input class="span9" type="text" name='search'>                   
<select name='search_by' style='width:100px;'>
<option value='title' >title</option>
<option value='intro_content' >intro content</option>
<option value='content' >content</option>
<option value='credit_image' >credit image</option>
<option value='image' >image</option>
<option value='created' >created</option>
<option value='created_by' >created by</option>
<option value='created_alias' >created alias</option>
<option value='modified' >modified</option>
<option value='modified_by' >modified by</option>
<option value='modified_alias' >modified alias</option>
<option value='meta_key' >meta key</option>
<option value='meta_desc' >meta desc</option>
<option value='hits' >hits</option>
<option value='status' >status</option>
<option value='category_id' >category id</option>

</select>
<button class="btn" type="submit">Cari</button>
</form>
</div>
 
<select class="span2  pull-right" onchange="location = this.options[this.selectedIndex].value;">
<option selected='selected' disabled='disabled'>Pilih Rows</option>
<option value="<?php echo base_url('Admintest/index/rows/25');?>">25 Rows</option>
<option value="<?php echo base_url('Admintest/index/rows/50');?>">50 Rows</option>
<option value="<?php echo base_url('Admintest/index/rows/75');?>">75 Rows</option>
<option value="<?php echo base_url('Admintest/index/rows/100');?>">100 Rows</option>
<option value="<?php echo base_url('Admintest/index/rows/200');?>">200 Rows</option>
</select>
 

<?php
if($this->uri->segment(3) == 'rows'){
$per_page = $this->uri->segment(4);
$segment  = 5;
$url      = 'Admintest/index/rows/'.$this->uri->segment(4).'/';
}else{
$per_page = 25;
$segment  = 3;
$url      = 'Admintest/index';
}
?>

    <div class='table-responsive margin-table'>
<table class='table table-striped table-bordered table-hover table-condensed'>
<caption class='text-right'>
<?php $num_rows = core::get_all('ac_berita','ancient')->num_rows();?>
<small>Total data : <u class='text-error'><?php echo $num_rows;?></u></small>
</caption><thead>
<tr>
<th style='width:20px;'>No</th>
<th>title</th>
<th>intro content</th>
<th>content</th>
<th>credit image</th>
<th>image</th>
<th>created</th>
<th>created by</th>
<th>created alias</th>
<th>modified</th>
<th>modified by</th>
<th>modified alias</th>
<th>meta key</th>
<th>meta desc</th>
<th>hits</th>
<th>status</th>
<th>category id</th>
<th style='text-align:center;width:100px;'>Aksi</th>
</tr></thead>
<tbody>
<?php $i = $this->uri->segment($segment) + 1;?>
<?php foreach(core::get_all_pagination('ac_berita','ancient',$per_page,$segment,$url)->result() as $row): { ?><tr>
<td><?php echo $i;?></td>
			<td><?php echo $row->title ;?></td>
			<td><?php echo $row->intro_content ;?></td>
			<td><?php echo $row->content ;?></td>
			<td><?php echo $row->credit_image ;?></td>
			<td><?php echo $row->image ;?></td>
			<td><?php echo $row->created ;?></td>
			<td><?php echo $row->created_by ;?></td>
			<td><?php echo $row->created_alias ;?></td>
			<td><?php echo $row->modified ;?></td>
			<td><?php echo $row->modified_by ;?></td>
			<td><?php echo $row->modified_alias ;?></td>
			<td><?php echo $row->meta_key ;?></td>
			<td><?php echo $row->meta_desc ;?></td>
			<td><?php echo $row->hits ;?></td>
			<td><?php echo $row->status ;?></td>
			<td><?php echo $row->category_id ;?></td>
			<td>
		    <center><div class='btn-group' >
		    <a href='<?php echo base_url();?>Admintest/delete/<?php echo $row->id;?>' class='btn btn-small' data-confirm='Hapus data ini?'><i class='text-error fa fa-trash-o'></i></a>
                    <a  href='<?php echo base_url();?>Admintest/update/<?php echo $row->id;?>' class='btn   btn-small'><i class='text-warning fa fa-edit'></i></a>
                    <a href='<?php echo base_url();?>Admintest/detail/<?php echo $row->id;?>' class='btn btn-small'><i class='text-info fa fa-weibo'></i></a>
                    </div></center>
                    </td>
		   
</tr>
<?php } ?>
<?php $i++;?>
<?php endforeach;?>
</tbody>
</table>
</div>

    
      <?php echo $this->pagination->create_links(); ?>
        
  
</div>
</div>