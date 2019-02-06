<div class="left-sidebar">
	<h2>Category</h2>
	<!--category-products-->
	<div class="panel-group category-products" id="accordian">
		<div class="panel panel-default">
			<?php //echo $categories_menu; ?>
			@foreach($categories as $cat)
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
						<span class="badge pull-right"><i class="fa fa-plus"></i></span>
						{{$cat->category}}
					</a>
				</h4>
			</div>
			<div id="{{$cat->id}}" class="panel-collapse collapse">
				<div class="panel-body">
					<ul>
					 @foreach($cat->categories as $subcat)
						<li><a href="{{asset('/products/'.$subcat->url)}}">{{$subcat->category}}</a></li>
					  @endforeach
					</ul>
				</div>
			</div>
		   @endforeach
		</div>
	</div><!--/category-products-->
</div>
					
						