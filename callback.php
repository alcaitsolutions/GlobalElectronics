<?php



$_SERVER['HTTP_REFERER'];

echo$_GET["code"];

?>
<html>

    <head>
        <script>
    function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };

    alert(getUrlParameter('code'));
</script>
    </head>

    <body>

    </body>

</html>