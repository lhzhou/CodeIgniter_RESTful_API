<nav class="navbar navbar-default navbar-static">
  		<a class="navbar-brand" href="<?php echo site_url() ?>">Weng Anchor</a>
  		<a class="navbar-brand pull-right" href="<?php echo site_url() ?>">退出登录</a>
		<div class="collapse navbar-collapse js-navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown dropdown-large">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理 <b class="caret"></b></a>		
				<ul class="dropdown-menu dropdown-menu-large row">
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">分类设置</li>
							<li><a href="#">添加分类</a></li>
							<li><a href="#">管理分类</a></li>
						</ul>
					</li>
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">用户管理</li>
							<li><a href="#">创建用户</a></li>
							<li><a href="#">管理用户</a></li>
						</ul>
					</li>


				</ul>
			</li>

			<li class="dropdown dropdown-large">
			
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">类别分类 <b class="caret"></b></a>		
				<ul class="dropdown-menu dropdown-menu-large row">
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">类别管理</li>
							<li><a href="<?php echo site_url('category/type/index') ?>">编辑类别</a></li>
							<li><a href="<?php echo site_url('category/type/add_type') ?>">添加管理</a></li>
						</ul>
					</li>
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">分类管理</li>
							<li><a href="<?php echo site_url('category/category') ?>">分类管理</a></li>

						</ul>
					</li>
				</ul>
			</li>

			<li class="dropdown dropdown-large">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">商品管理 <b class="caret"></b></a>		
				<ul class="dropdown-menu dropdown-menu-large row">
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">商品管理</li>
							<li><a href="<?php echo site_url('product/index') ?>">商品列表</a></li>
							<li><a href="<?php echo site_url('product/create') ?>">添加商品</a></li>
							<li><a href="<?php echo site_url('product/create') ?>">推荐商品</a></li>
						</ul>
					</li>

					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">商品属性</li>
							<li><a href="<?php echo site_url('product/attributes') ?>">添加属性</a></li>
							<li><a href="<?php echo site_url('product/attributes') ?>">管理属性</a></li>
						</ul>
					</li>
					<div class="clearfix">
						
					</div>
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">属性值管理</li>
							<li><a href="<?php echo site_url('product/attributes') ?>">添加属性值</a></li>
							<li><a href="<?php echo site_url('product/attributes') ?>">管理属性值</a></li>
						</ul>
					</li>

				</ul>
			</li>

			<li class="dropdown dropdown-large">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">订单管理 <b class="caret"></b></a>		
				<ul class="dropdown-menu dropdown-menu-large row">
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">类别管理</li>
							<li><a href="<?php echo site_url('category/type/index') ?>">编辑类别</a></li>
							<li><a href="<?php echo site_url('category/type/add_type') ?>">添加管理</a></li>
						</ul>
					</li>
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">分类管理</li>
							<li><a href="<?php echo site_url('category/category') ?>">分类管理</a></li>

						</ul>
					</li>
				</ul>
			</li>


			<li class="dropdown dropdown-large">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">系统设置 <b class="caret"></b></a>		
				<ul class="dropdown-menu dropdown-menu-large row">
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">短信设置</li>
							<li><a href="<?php echo site_url('category/type/index') ?>">编辑类别</a></li>
							<li><a href="<?php echo site_url('category/type/add_type') ?>">添加管理</a></li>
						</ul>
					</li>
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">快递设置</li>
							<li><a href="<?php echo site_url('category/category') ?>">分类管理</a></li>

						</ul>
					</li>
					<li class="col-sm-6">
						<ul>
							<li class="dropdown-header">支付设置</li>
							<li><a href="<?php echo site_url('category/category') ?>">分类管理</a></li>
						</ul>
					</li>
				</ul>
			</li>


		</ul>
		
	</div><!-- /.nav-collapse -->
</nav>
