<div class="list-group">
	@foreach($classes as $class)

	<a 
		class="list-group-item" 
		title="{{ $class->totalStudents() }} students enrolled"
		href="{{ route('show_class', $class->date->toDateString()) }}"
		data-toggle="popover"
	>
		<p class="list-group-item-heading text-center">
            <strong>
                {{{ date("F d, Y", strtotime($class->date)) }}}
            </strong>
        </p>
        <div class="row">
            <div class="col-md-6">
                <p class="list-group-item-text">
                    {{{ $class->location->address }}}
                </p>
            </div>
            <div class="col-md-6">
                <p>9am - 3pm</p>
            </div>
        </div>

	</a>
	
	@endforeach
</div>