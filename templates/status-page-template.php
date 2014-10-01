<?php wp_head(); ?>

<body class="wp-status-page customize-support">

<header class="wsp-header">

	<div class="wsp-container">
		<h1><a href=""><img src="http://placekitten.com/100/100" alt=""></a></h1>
	</div>

</header>

<section class="wsp-monitor wsp-monitor-has-img">

	<div class="wsp-container">

		<ul class="wsp-monitoring">
			<li class="event-ok">
				<div class="wsp-monitoring-item"><span>API</span></div>
				<div class="wsp-monitoring-status"><span>OK</span></div>
			</li>
			<li class="event-issues">
				<div class="wsp-monitoring-item"><span>Web</span></div>
				<div class="wsp-monitoring-status"><span>Performance Issues</span></div>
			</li>
			<li class="event-offline">
				<div class="wsp-monitoring-item"><span>Database</span></div>
				<div class="wsp-monitoring-status"><span>Offline</span></div>
			</li>
		</ul>

	</div>

	<div class="wsp-updates-img" style="background-image:url(http://placekitten.com/1200/400);background-repeat:no-repeat;background-size:cover;"></div>

</section>


<!-- WSP Main -->
<main class="wsp-events">

	<div class="wsp-container">

		<article class="wsp-event">
			<header class="wsp-event-header">
				<div class="wsp-event-meta">
					<span class="wsp-event-year">2014</span>
					<span class="wsp-event-day">26</span>
					<span class="wsp-event-month">May</span>
				</div>
			</header>
			<main class="wsp-event-body">
				<h2><span>2:25</span>&nbsp;Scheduled Maintenance</h2>
				<p>This evening we'll be performing scheduled maintenace on our servers.</p>
			</main>
			<footer class="wsp-event-footer">
				<a href="#">Read more</a>
			</footer>
		</article>

	</div>

</main>

<!-- WSP Footer -->
<footer class="wsp-footer">

	<div class="wsp-container">
		- footer area here with byline and social links
	</div>

</footer>

</body>

<?php wp_footer();