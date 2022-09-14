<?php
    require_once 'Connect.php';
?>
<div class="alert"></div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function ()
    {
        function showImages()
        {
            $.ajax
            (
                {
                    type: 'POST',
                    url: 'http://localhost/project/tryto/api.php?mode=show',
                    success: function(e)
                    {
                        $('.alert').html(e)
                    }
                }
            )
        }

        setInterval( showImages, 1000 )
    });
</script>