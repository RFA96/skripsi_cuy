<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/14/18
 * Time: 18:37 PM
 */
?>
<!doctype html>
    <head>
        <?php include 'head_tag.php'?>
    </head>
    <body>
        <p id="ajax_suhu"></p>
        <?php include 'assets_js.php'?>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#ajax_suhu').load('api/nilai_koneksi_arduino.php');
                }, 1000);
            });
        </script>
    </body>
</html>