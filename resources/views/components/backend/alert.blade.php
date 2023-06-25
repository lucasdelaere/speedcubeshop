@props(['type' => 'success', 'message', 'model' => 'item'])
@slot('title')
@endslot

<div data-alert {{$attributes->merge(['class' => 'alert alert-' . $type . ' alert-dismissible fade show'])}}> <!-- class alert hier belangrijk -->
    <!-- coalescing operator, return linker operand als deze niet null is, anders de rechter operand -->
    <strong>{{$title ?? ucfirst($model)}}</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        const alerts = document.querySelectorAll('[data-alert]')
        alerts.forEach(function(alert){
            window.setTimeout(function(){
                $(alert).alert('close');
            }, 5000);
        });
    })
</script>
