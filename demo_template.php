<?php defined('FLATBOARD') or die('Flatboard Community.'); ?>
	<template id="b16-pane-demo-html">
		<header>
			<nav class="navbar navbar-expand navbar-dark bg-dark">
				<a class="navbar-brand" href="#">Demo</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDark" aria-controls="navbarNavDark" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDark">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="#">Archive</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- Hero Section -->
		<section class="jumbotron">
			<div class="container">
				<h1 class="display-4">Hello, I'm Jane Doe!</h1>
				<p class="lead">This is a example page</p>
			</div>
		</section>

		<!-- About Section -->
		<section class="section">
			<div class="container">
				<div class="card">
					<div class="card-body">
						<h2 class="mb-4">A Little About Me</h2>
						<p>If you've ever wondered what would happen if a dictionary had a baby with a <mark>stand-up comedian</mark>, wonder no more. That's basically my personality.</p>
						<p>I blog about life's absurdities, tech that makes me scream (in a good way), and coffee - lots and lots of coffee. My mission? To make you snort-laugh while learning something useful. <span class="text-muted">Or at least distract you from your Monday blues.</span></p>
					</div>
				</div>
			</div>
		</section>

		<!-- Blog Section -->
		<section class="section">
			<div class="container">
				<div class="text-center my-3">
					<h2>Latest Posts</h2>
					<p><code>Warning: May contain excessive emojis and questionable life choices</code></p>
				</div>
				<div class="row">
					<div class="col-md-4 mb-4">
						<div class="card h-100 shadow-sm">
							<img src="https://placehold.co/300x200 " class="card-img-top" alt="Blog Post 1" loading="lazy" />
							<div class="card-body">
								<h5 class="card-title">How I Tried to Conquer Mount Laundry</h5>
								<p class="card-text">Spoiler: The laundry won. Again.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-4">
						<div class="card h-100 shadow-sm">
							<img src="https://placehold.co/300x200 " class="card-img-top" alt="Blog Post 2" loading="lazy" />
							<div class="card-body">
								<h5 class="card-title">The Day My WiFi Broke and Humanity Lost Hope</h5>
								<p class="card-text">One woman's journey through digital darkness.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-4">
						<div class="card h-100 shadow-sm">
							<img src="https://placehold.co/300x200 " class="card-img-top" alt="Blog Post 3" loading="lazy" />
							<div class="card-body">
								<h5 class="card-title">Top 10 Cat Memes That Explain HTML Error Codes</h5>
								<p class="card-text">Because apparently cats know us better than we know ourselves.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Contact Section -->
		<section class="section">
			<div class="container-fluid">

				<div class="card">
					<div class="card-header">
						<h2>Let's Get Social</h2>
						<p class="mb-0">I promise not to spam you...</p>
					</div>

					<div class="social-icons card-body text-center">
						<button type="button" class="btn btn-primary">Primary</button>
						<button type="button" class="btn btn-secondary">Secondary</button>
						<button type="button" class="btn btn-success">Success</button>
						<button type="button" class="btn btn-danger">Danger</button>
						<button type="button" class="btn btn-warning">Warning</button>
						<button type="button" class="btn btn-info">Info</button>
						<button type="button" class="btn btn-light">Light</button>
						<button type="button" class="btn btn-dark">Dark</button>
					</div>
					<div class="social-icons card-body text-center">
						<button type="button" class="btn btn-outline-primary">Primary</button>
						<button type="button" class="btn btn-outline-secondary">Secondary</button>
						<button type="button" class="btn btn-outline-success">Success</button>
						<button type="button" class="btn btn-outline-danger">Danger</button>
						<button type="button" class="btn btn-outline-warning">Warning</button>
						<button type="button" class="btn btn-outline-info">Info</button>
						<button type="button" class="btn btn-outline-light">Light</button>
						<button type="button" class="btn btn-outline-dark">Dark</button>
					</div>
					<div class="card-footer">

						<p>Or fill in this form: </p>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<button class="btn btn-primary" type="button">Submit</button>
					</div>

				</div>

			</div>

		</section>

		<!-- Footer -->
		<footer class="footer p-4">
			<p>&copy; 2025 Jane Doe</p>
			</div>
		</footer>

	</template>