@foreach($rows as $row)
@include('payment::part.row', ['i' => $row])
@endforeach