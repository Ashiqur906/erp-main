
@foreach($rows as $i => $row)


<tr id="{{'row-'.$i}}">
    <td>
        <button class="btn btn-danger btn-sm removeRow" style="margin-top: 7px;" type="button" data-id="{{$i}}">
            <span class="material-icons"> remove_circle </span>
        </button>
    </td>
    <td>
        {{ Form::select('item['.$i.'][account]',  AccountSelect(),  $row['account'] ,
            ['class' => (($errors->has('item.'.$i.'.account'))?'is-invalid ':'' ).' form-control select2', 'placeholder' => ' Select account','onchange'=>'selectAccount(this);']) }}

    </td>
    <td>
        <span class="item-balance"></span>
    </td>
    <td></td>

    <td>
        <div class="input-group">
            {{ Form::number('item['.$i.'][debit]', $row['debit'] , ['class' => (($errors->has('item.'.$i.'.debit'))?'is-invalid ':'' ).'  form-control item-debit',  'onkeyup'=>'insertDebit(this);','readonly' => ($row['debit'])?false:true, 'step' => 'any' ]) }}
            <div class="input-group-prepend">
                <span class="input-group-text item-currency"></span>
            </div>
        </div>
    </td>
    <td>
        <div class="input-group">
            {{ Form::number('item['.$i.'][credit]', $row['credit'] , ['class' => (($errors->has('item.'.$i.'.credit'))?'is-invalid ':'' ).'  form-control item-credit',  'onkeyup'=>'insertCredit(this);','readonly' => ($row['credit'])?false:true, 'step' => 'any' ]) }}
            <div class="input-group-prepend">
                <span class="input-group-text item-currency"></span>
            </div>
        </div>
    </td>

</tr>
@endforeach
