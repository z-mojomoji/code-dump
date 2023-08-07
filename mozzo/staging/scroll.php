<?php
    $id= $_GET['id'];
?>

<script>
    var idVariable = '<?php echo $id ?>';
    $(document).ready(function(){
        smoothScroll.animateScroll( '#'+idVariable );
        $('#'+idVariable).trigger('click');
    });
</script>