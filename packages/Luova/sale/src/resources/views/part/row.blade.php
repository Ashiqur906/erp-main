<tr id="{{'row-'.$i}}">
    <td>
        <button class="btn btn-danger btn-sm removeRow" style="margin-top: 7px;" type="button" data-id="{{$i}}" style="width: 40px">
            <span class="material-icons"> remove_circle </span>
        </button>
    </td>
    <td>
        {{ Form::select('item['.$i.'][product]',  productFA(), null,
            ['class' => 'form-control item-product', 'placeholder' => ' Select Product','onchange'=>'selectProduct(this);']) }}


    </td>
    <td>
        {{ Form::number('item['.$i.'][stock]', null, ['class' => 'form-control item-stock','disabled' => true ]) }}
    </td>
    <td class="input-group">
        {{ Form::number('item['.$i.'][qty]', null, ['class' =>'form-control item-qty', 'onkeyup'=>'insertQty(this);', 'readonly' => true, 'step' => 'any' ]) }}
        <div class="input-group-prepend">
            <span class="input-group-text item-unit"></span>
        </div>
    </td>

    <td>
        <div class="input-group">
            {{ Form::number('item['.$i.'][rate]', null, ['class' => 'form-control item-rate',  'onkeyup'=>'insertRate(this);','readonly' => true, 'step' => 'any' ]) }}
        
            <div class="input-group-prepend">
                <span class="input-group-text type-rate"></span>
            </div>
        </div>
    </td>
    <td>
        {{ Form::number('item['.$i.'][total]', null, ['class' => 'form-control item-total','readonly' => true ]) }}
    </td>

</tr>