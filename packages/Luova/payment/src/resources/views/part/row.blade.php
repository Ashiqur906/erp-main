<tr id="{{'row-'.$i}}">
    <td>
        <button class="btn btn-danger btn-sm removeRow" style="margin-top: 7px; width: 40px;" type="button" data-id="{{$i}}">
            <span class="material-icons"> remove_circle </span>
        </button>
    </td>
    <td>
        {{ Form::select('item['.$i.'][type]',  [
             'Dr' => 'Dr',
             'Cr' => 'Cr'
        ], null,
        ['class' => 'form-control item-type', 'onchange'=>'selectType(this);']) }}
    </td>
    <td>
        {{ Form::select('item['.$i.'][account]',  AccountSelect(), null,
            ['class' => 'form-control select2 item-account', 'placeholder' => ' Select Account','onchange'=>'selectAccount(this);']) }}
    </td>
    <td>
        <span class="item-balance"></span>
    </td>
    <td></td>
    <td class="input-group">
        {{ Form::number('item['.$i.'][debit]', null, ['class' =>'form-control item-debit', 'onkeyup'=>'insertDebit(this);', 'data-debit' => '' ,'readonly' => true, 'step' => 'any' ]) }}
        <div class="input-group-prepend">
            <span class="input-group-text item-currency"></span>
        </div>
    </td>

    <td>
        <div class="input-group">
            {{ Form::number('item['.$i.'][credit]', null, ['class' => 'form-control item-credit',  'onkeyup'=>'insertCredit(this);', 'data-credit' => '','readonly' => true, 'step' => 'any' ]) }}
        
            <div class="input-group-prepend">
                <span class="input-group-text item-currency"></span>
            </div>
        </div>
    </td>

</tr>