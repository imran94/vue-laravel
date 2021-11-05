<template>
  <div class="home">
    <div class="container">
			<div class="info-row-1">
				<div class="col-1">
					<h1>Share your unfiltered thoughts. Get paid</h1>
					<p>Spense is an open platform for individuals to share their unfiltered thoughts.
					Discuss the topics you love, and get paid for doing just that.</p>
					<ul>
						<li>Receive 99% off the earnings.</li>
						<li>Get paid via Debit Card, ACH, or Paypal.</li>
						<li>Withdraw your earnings anytime</li>
					</ul>
					<input type="text" name="" placeholder="john@example.com">
					<button>Get Started</button>
				</div>
				<div class="col-2">
					<img class="img-1" :src="require('@/assets/Hero Image (Desktop).png')">
				</div>
			</div>
			<div class="affiliates">
				<div><img :src="require('@/assets/facebook.png')"></div>
				<div><img :src="require('@/assets/dribbble.png')"></div>
				<div><img :src="require('@/assets/youtube.png')"></div>
				<div><img :src="require('@/assets/pinterest.png')"></div>
				<div><img :src="require('@/assets/twitter.png')"></div>
				<div><img :src="require('@/assets/reddit.png')"></div>
				<div><img :src="require('@/assets/google.png')"></div>
				<div><img :src="require('@/assets/slack.png')"></div>
			</div>
			<div class="info-row-2">
				<img :src="require('@/assets/Phone Mockup (Desktop).png')">
				<div class="left-text">
					<h1>Secure your money with Escrow.</h1>
					<p>Spense uses Escrow to secure all payments. We believe Escrow offers the highest level of security for your payments, so you never need to worry about scams.</p>
					<p><a href="">Learn more about Escrow</a></p>
				</div>
			</div>
			<div class="info-row-3">
				<div>
					<img :src="require('@/assets/Text Editor.png')">
				</div>
				<div>
					<h1>A text editor like no other</h1>
					<p>Our text editor pulls you into focus mode with its simplistic design and usability so you can put out your best writings.</p>
					<p><a href="">Text Editor Live Demo</a></p>
				</div>
			</div>
			<div class="info-row" v-for="(article, i) in articles" :key="i">
				ID: {{ article.id }}
				<br>
				Title: {{ article.title }}
				<br>
				Body: {{ article.body }}
			</div>
			<div class="info-row">
				<label for="title">Title: </label>
				<input id="title" type="text" v-model="newArticle.title" />
				<label for="body">Body: </label>
				<input id="body" type="text" v-model="newArticle.body" />
				<button @click="postNewArticle" :disabled="isPosting">Create New Article</button>
			</div>
		</div>
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import axios from 'axios';

export default {
  name: 'Home',
  data() {
	return {
		isPosting: false,
		articles: [],
		newArticle: {
			title: '',
			body: ''
		}
	}
  },
  methods: {
	getArticles() {
		axios.get('http://localhost:8000/api/articles')
			.then((response) => { this.articles = response.data; })
			.catch(error => { console.log(error.response.data.error); });
	},
	postNewArticle() {
		this.isPosting = true,
		axios.post('http://localhost:8000/api/articles', this.newArticle)
			.then((response) => { 
				console.log(response); 
				this.articles.push(response.data); 
				this.isPosting = false; 
			}).catch(error => { console.log(error.response.data.error); });
	}
  },
  components: {
  },
  mounted() {
	this.getArticles();
  }
}
</script>

<style scoped>

.current-page {
	border-bottom: 1px solid #707070;
}

.current-page:hover {
	color: #707070;
}

.subtitle {
	font-weight: bold;
	font-size: .75rem;
	color: #1792D2;
}

.container {
	width: 90%;
	max-width: 1100px;
	margin: 0 auto;
}

img {
	max-width: 100%;
}

.accent-color {
	color: #B7832F;
}

.main-title {
	font-size: 3rem;
	text-align: center;
}

h2 {
	font-size: 1.5rem;
}

.heading {
	color: #707070;
}

.sidebar {
	background-color: #312614;
	color: #FFF;
	padding: 1em;
}

.info-row-1, .affiliates, .info-row-3, footer {
	display: flex;
	justify-content: space-between;
	margin: 3em 0;
}

footer {
	background-color: ;
	color: #ffffff;
}

.info-row-1 > * {
	margin: auto;
}

.affiliates > *, .info-row-3 > * {
	flex-basis: 100%;
	margin: auto 1em;
}

.info-row-2 {
	position: relative;
}

.info-row-2 img {
	width: 100%;
}

.left-text {
	position: absolute;
	top: 20%;
	width: 40%;
	left: 10%;
}

.info-row-3 {
	margin: 1em 4em;
}

.col-1 {
	width: 60%;
	margin-right: 3em;
}

.col-2 {
	width: 40%;
	margin-left: 3em;
}

.col-3 {
	width: 70%;
}

.col-symmetric {
	width: 50%;
}

@media (max-width: 600px) {
	.container-nav, nav ul {
		flex-direction: column;
		justify-content: space-around;
	}

	.columns {
		flex-direction: column;
	}

	.col-1, .col-2, .col-3 {
		width: 100%;
	}
}
</style>
