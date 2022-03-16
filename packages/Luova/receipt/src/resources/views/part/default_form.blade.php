@foreach($rows as $row)
@include('receipt::part.row', ['i' => $row])
@endforeach