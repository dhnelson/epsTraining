<script src="{{ url('/js/libs.js') }}"></script>
<script src="{{ url('/js/select2.min.js') }}"></script>
<script src="{{ url('/js/parsley.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){
    $(".Button").click(function(){
        $(this).next("#toggle").toggle(500);
    });
});
</script>