<div class="col-sm-12">
	<ol class="breadcrumb">
	  <li><a href="#">首页</a></li>
	  <li><a href="#">类别分类</a></li>
	  <li class="active">添加分类</li>
	</ol>
	<?php
	    $attributes = array('class' => 'form-horizontal col-sm-offset-2 col-sm-8 ajax_form');
	    echo form_open_multipart(base_url('category/type/add_type'), $attributes);
	?>
		<fieldset class="scheduler-border">
            <legend class="scheduler-border">中文 - 简体</legend>

			<div class="form-group">
				<label class="col-sm-2 control-label">分类名称<sup class="red">*</sup></label>
				<div class="col-sm-10">
					<input type="text" name="type_name[cn]" class="form-control"  placeholder="分类名称" required>
				</div>
			</div>
		</fieldset>
		<fieldset class="scheduler-border">
            <legend class="scheduler-border">English - US</legend>
			<div class="form-group">
				<label class="col-sm-2 control-label">Type Name<sup class="red">*</sup></label>
				<div class="col-sm-10">
					<input type="text" name="type_name[en]" class="form-control" placeholder="Type Name" required>
				</div>
			</div>
		</fieldset>

		<fieldset class="scheduler-border">
            <legend class="scheduler-border">上传图标(Upload Icon)</legend>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="file" name="icon" class="form-control" required>
				</div>
			</div>
		</fieldset>




		<div class="form-group">
			<div class="col-sm-2 pull-right">
				<button type="submit" class="btn btn-success btn-block">添加数据</button>	
			</div>
			<div class="col-sm-2 pull-right">
				<button type="reset" class="btn btn-danger btn-block">取消</button>	
			</div>
			
		</div>
	</form>		

</div>