@foreach($rows as $row)
@include('sale::part.row', ['i' => $row])
@endforeach