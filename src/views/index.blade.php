@extends('QueueView::master')

@section('content')
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Queue</th>
                <th>Payload</th>
                <th>Attempts</th>
                <th>Reserved</th>
				<th>Reserved At</th>
                <th>Available At</th>
                <th>Created At</th>
                <th>Action</th>
         	</tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        "pageLength":{{config('QueueView.perPage')}},
        ajax: '{!! route(config('QueueView.route').'.queue.get') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'queue', name: 'queue' },
            { data: 'payload', name: 'payload' },
            { data: 'attempts', name: 'attempts' },
            { data: 'reserved', name: 'reserved' },
            { data: 'reserved_at', name: 'reserved_at' },
            { data: 'available_at', name: 'available_at' },
            { data: 'created_at', name: 'created_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
           
        ]
    });
});
</script>
@endpush