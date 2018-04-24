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

<script>
 /** Showcase **/

    function Timer(fn, t) {
        var timerObj = setInterval(fn, t);
    
        this.stop = function() {
            if (timerObj) {
                clearInterval(timerObj);
                timerObj = null;
            }
            return this;
        }
    
        // start timer using current settings (if it's not already running)
        this.start = function() {
            if (!timerObj) {
                this.stop();
                timerObj = setInterval(fn, t);
            }
            return this;
        }
    
        // start with new interval, stop current interval
        this.reset = function(newT) {
            t = newT;
            return this.stop().start();
        }
    }
    var timer;

    var gallery = {
        selector: '',
        length: 0,
        counter: 0,
        ini: function(selector,length) {
            this.selector = selector;
            this.length = length - 1;
            timer = new Timer(this.next, 5000);            
            this.select(0);
			
			$(this.selector + ' .prev').click(gallery.prev);
			$(this.selector + ' .next').click(gallery.next);
			$(this.selector + ' .dot').click(function() {
				var i = $(this).data('i');
				gallery.select(i);
			});
        },
        prev: function() {
            gallery.counter--;
            if( gallery.counter < 0 )  {
                gallery.counter = gallery.length;
            }
            gallery.select(gallery.counter);
        }, 
        next: function() {
            gallery.counter++;
            if( gallery.counter > gallery.length )  {
                gallery.counter = 0;
            }
            gallery.select(gallery.counter); 
        },
        select: function(i) {
            timer.stop();
            this.counter = i;
            $(this.selector + ' .gallery .items div').hide();
            $(this.selector + ' .gallery .items div[data-i="' + i + '"]').fadeIn(2000);
            $(this.selector + ' .gallery .dots div').removeClass('active');
            $(this.selector + ' .gallery .dots div[data-i="' + i + '"]').addClass('active');
            timer.start();
        }
    }

    gallery.ini('.gal', 5);

</script>