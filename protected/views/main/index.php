<?php 
$this->pageTitle = 'Business Name: or something goes here';
$this->description = 'Describe the page shortly here'; 
?>

<?php 
Yii::app()->clientScript->registerScript('homepage','

		$(document).ready(function() {
    $(".slideshow").cycle({
		fx: "fade",
		delay: -8000
	});
});
		

		',CClientScript::POS_READY);
?>



<div class="slideshow">
	<?php echo CHtml::image(Yii::app()->request->baseurl . '/images/banner1.png', '', array('width' => 920, 'height' => 200)); ?>
	<?php echo CHtml::image(Yii::app()->request->baseurl . '/images/banner2.png', '', array('width' => 920, 'height' => 200)); ?>
	<?php echo CHtml::image(Yii::app()->request->baseurl . '/images/banner3.png', '', array('width' => 920, 'height' => 200)); ?>
</div>

<div class="homePageLeft">
	<h1>Funisher - Social Video Gaming</h1>

	<p>Thanks for checking out Funisher.com! blah blah blah</p>

	<h2>What Is it?</h2>

	<p>It's a site that allows you to track important info about your games
		and your gaming.</p>

	<h2>What Can I Do Here?</h2>

	<p>
	<ul>
		<li>
			Maintain your very own collection of games.
			<ul>
				<li>Games you've finished (and when)</li>
				<li>Games you own</li>
				<li>Game you are currently playing</li>
				<li>Games you've loaned out (and to who)</li>
				<li>Notes for each game</li>
			</ul>
		</li>
		
		<li>Your own Wall and Profile</li>
		<li>Friends and Followers</li>
		<li>Forums</li>
		<li>(and more to come!)</li>
	</ul>
	</p>
	
	<h2>OK Let's Go!</h2>

	<p>No problem. Just register, login, and start adding games to your collection. 
	More importantly, play some games! When you finish one, just mark it completed 
	and you will always have a record of which games you've beaten and when. 
	Also, add some personal notes to the game. You could review it, 
	keep track of in-game aspects, or anything else you want to remember about the game.</p>
	
	<p>
	Don't forget to check out the forums. Put in your two cents on gaming topics being discussed there.
	People will see your posts and check out your wall. Your wall shows many things about your gaming life. 
	Things such as; how many games you've beaten, how many games you own, what you are currently playing, 
	your friends and followers, and even your wall posts.
	</p>
	
	<p>So get playing, and get socializing! If you want...</p>

</div>
<div class="homePageRight">
	Column 2
</div>

<div style="clear: both;"></div>
