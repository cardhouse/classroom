@extends('layouts.main')

@section('scripts')
<script type="text/javascript">
	$(function () {
		$('[data-toggle="popover"]').popover(
			placement: "bottom",
			trigger: "hover focus"
		)
	})
</script>
@stop

@section('content')
	<h1>List the classes</h1>
	@include('layouts.partials.class_list')
@stop

<!-- <div class="container">
  <h2>List Group With Custom Content</h2>
  <div class="list-group">
	<a href="#" class="list-group-item active">
	  <h4 class="list-group-item-heading">First List Group Item Heading</h4>
	  <p class="list-group-item-text">List Group Item Text</p>
	</a>
	<a href="#" class="list-group-item">
	  <h4 class="list-group-item-heading">Second List Group Item Heading</h4>
	  <p class="list-group-item-text">List Group Item Text</p>
	</a>
	<a href="#" class="list-group-item">
	  <h4 class="list-group-item-heading">Third List Group Item Heading</h4>
	  <p class="list-group-item-text">List Group Item Text</p>
	</a>
  </div>
</div> -->