
       <div id="general">

       <div class="visible-xs mobile-header">
        	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars"></i></a>
        </div>
       
		<a href="#homepage" id="index-btn">
		    HOME
		    <img src="images/diamond.png">
		</a>
		
            <?php
            include('home.php');
            include('aboutus.php');
            include('factory.php');
            include('category.php');
            include('media.php');
            include('event.php');
            include('location.php');
            include('contact.php');
            include('nav.php');
		?>
		
        </div><!--end general-->
<script>
$(document).ready(function(){
        //Responsive Menu
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#staging").toggleClass("toggled");
        });
    
        $(".panel").click(function(e) {
            e.preventDefault();
            $("#staging").removeClass("toggled");
        });
        
});
</script>