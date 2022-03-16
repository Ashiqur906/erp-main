@foreach($rows as $row)
@include('purchase::part.row', ['i' => $row])
@endforeach