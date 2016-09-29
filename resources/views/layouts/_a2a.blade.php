<script>
    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }
    });
</script>

<!-- AddToAny BEGIN -->
<div class="button_demo for_www share-follow-padding">
    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" id="my_centered_buttons">
        <div class="btn btn-sm btn-default"><i class="fa fa-share"></i> Share</div>&nbsp; 
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_sms"></a>
        <a class="a2a_button_google_gmail"></a>
        <a class="a2a_button_linkedin"></a>
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div>
</div>
<!-- AddToAny END -->

<script>
var a2a_config = a2a_config || {};
a2a_config.onclick = 1;
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>

<!--
<div class="btn btn-sm btn-default"><i class="fa fa-user-plus"></i> Follow</div>&nbsp; 
<a class="a2a_button_facebook" data-a2a-follow="Evolution-Performance-Systems"></a>
<a class="a2a_button_instagram" data-a2a-follow="eps_training"></a>
<a class="a2a_button_snapchat" data-a2a-follow="teamsnapchat"></a>
-->