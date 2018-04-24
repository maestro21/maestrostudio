<?php 
 $list = [
        [
            'url' => 'http://webstudio-maestro.ch',
            'img' => 'showcase/showcase1.png',
        ],
        [
            'url' => 'http://strahovanie.ch',
            'img' => 'showcase/showcase2.png'
        ],
        [
           'url' => 'http://svetarobski.com',
            'img' => 'showcase/showcase3.png',
        ],
        [
            'url' => 'http://webstudio-ddesign.com',
           'img' => 'showcase/showcase4.png',
        ],

];?>
<div  data-anchor="showcase" class="section darker showcase" style="<?=img('bg/bg_sc.jpg', 2);?>" >
    <h1><?php echo T('showcase');?></h1>
    <div class="gal">
		<div class="gallery">
			<div class="prev"><img src="<?php echo BASE_PATH;?>img/larr.png"></div>
			<div class="items">
				<?php foreach($list as $i => $item) { ?>
					<div data-i="<?php echo $i;?>">
						<a href="<?php echo $item['url'];?>" target="_blank">
							<img src="<?php echo BASE_PATH;?>img/<?php echo $item['img'];?>?v=<?php echo $v;?>" alt="<?php echo $item['url'];?>">
							<p><span><?php echo str_replace('http://', '', $item['url']);?></span></p>
						</a>
					</div>
				<?php } ?>	
				<div data-i="<?php echo count($list);?>">
					<a href="#">
					<img src="<?php echo BASE_PATH;?>img/showcase/projects_<?php echo lang();?>.png?v=<?php echo $v;?>" alt="<?php echo $item['url'];?>">
					<p><span> &nbsp;</p>
					</a>
				</div>
				<div class="dots">
					<div class="prev"><img src="<?php echo BASE_PATH;?>img/larr.png"></div>
					<?php for($i = 0; $i <= count($list); $i++) { ?>
						<div class="dot" data-i="<?php echo $i;?>"></div>
					<?php } ?>	
					<div class="next"><img src="<?php echo BASE_PATH;?>img/rarr.png"></div>
				</div>
			</div>	
			<div class="next"><img src="<?php echo BASE_PATH;?>img/rarr.png"></div>
		</div>
	</div>
</div>