<label class="avswitch avswitch-md">
    @if( $status == 0)
    <input type="checkbox" name="{{ isset($name) ? $name : 'status' }}" value="1">
    <span class="slider round"></span>
    @else
    <input type="checkbox" name="{{ isset($name) ? $name : 'status' }}" checked  value="1">
    <span class="slider round"></span>
    @endif
</label>