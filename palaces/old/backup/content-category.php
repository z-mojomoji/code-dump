<div class="container inner-pages panelslide" id="category">
	<div class="row valign">
		<div class="top-block">
			<div class="inner-title">
				<h2>gallery</h2>
			</div>
			<div class="breadcrumb-top">
				<a href="index.php">
					<span>home</span>
					<img alt="Diamond" src="images/diamond.png">	                    			
				</a>
			</div>
		</div>
		<div class="gallery-slider">
			<ul>
				<?php
					// perform actions for each file found
                	$arrFilesBig = glob("bigimages/".$_GET['category']."/*");
					$arrFiles = glob("images/".$_GET['category']."/*");

					$intFileCnt = count($arrFiles);
					for($intI=0;$intI<$intFileCnt;$intI++) {
						    
					if($intI % 6 == 0 && $intI > 0){
						echo "</ul><ul>";
					}

					$arrFileInfo = pathinfo($arrFiles[$intI]);
					$strFilename = implode(" ",explode("-",$arrFileInfo['filename']));
				?>
		
				<li class="col-sm-4 col-xs-6">
					<a class="fancy" rel="group" href="<?php echo $arrFilesBig[$intI];?>"><img alt="Slide" src="<?php echo $arrFiles[$intI];?>" class="img-responsive"></a>
					<h5><?php echo $strFilename;?></h5>
				</li>
						
				<?php } ?>
			</ul>
		</div>
	</div>
</div>