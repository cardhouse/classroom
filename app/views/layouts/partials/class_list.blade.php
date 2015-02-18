<div class="list-group">
	@foreach($classes as $class)

	<a 
		class="list-group-item" 
		title="{{ $class->totalStudents() }} students enrolled" 
		href="{{ route('show_class', $class->date) }}" 
		data-toggle="popover"
	>
		<h4 class="list-group-item-heading">{{{ date("F d, Y", strtotime($class->date)) }}}</h4>
		<p class="list-group-item-text">{{{ $class->location->address }}}</p>
	</a>
	
	@endforeach
</div>