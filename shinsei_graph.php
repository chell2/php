<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>確認画面</title>
	<style>
		body {
			font-family: Roboto, "Yu Gothic Medium", "游ゴシック Medium", YuGothic, "游ゴシック体", "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
			padding: auto 0.5rem;
		}

		iframe {
			border: 1px solid #666;
			border-radius: 8px;
			width: 98%;
			height: 200px;
		}

		.output {
			background: #eee;
		}
	</style>
</head>

<body>
	<header>
		<div>
			<a href="shinsei_input.php">入力画面</a> /
			<a href="shinsei_read.php">一覧画面（閲覧用）</a> /
			<a href="shinsei_rewrite.php">一覧画面（編集用）</a> /
			<a href="image_post.php">受取写真</a>
		</div>
	</header>
	<main>
		<div class="wrapIframe">
			<iframe id="inlineFrameExample" title="Inline Frame Example" width="300" height="200" src="shinsei_read.php">
			</iframe>
			<iframe id="inlineFrameExample" title="Inline Frame Example" width="300" height="200" src="image_post.php">
			</iframe>
		</div>
		<div class="wrapChartL">
			<div class="wrapChartM">
				<div>
					<canvas id="myChart1"></canvas>
				</div>
				<div>
					<canvas id="myChart2"></canvas>
				</div>
			</div>
			<div>
				<canvas id="myChart3"></canvas>
			</div>
		</div>
	</main>
	<footer>
	</footer>
	<script>
		const greatArray = <?= json_encode($great_array) ?>; //ポイントはJSON形式でJSにデータを渡すこと！
		console.log(greatArray);
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

	<script type="text/javascript">
		// Chart1：ドーナッツ（被災作物内訳）
		var ctx1 = document.getElementById('myChart1').getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'doughnut',
			data: {
				labels: [
					'いちご',
					'軟弱野菜',
					'その他野菜',
					'花卉・花木',
					'その他'
				],
				datasets: [{
					label: 'My First Dataset',
					data: [300, 50, 100, 20, 10],
					backgroundColor: [
						'rgb(255, 99, 132)',
						'rgb(75, 192, 192)',
						'rgb(255, 205, 86)',
						'rgb(54, 162, 235)',
						'rgb(201, 203, 207)',
					],
					hoverOffset: 4
				}]
			}
		});

		// Chart2：鶏頭図（被災地区内訳）
		var ctx2 = document.getElementById('myChart2').getContext('2d');
		var myChart = new Chart(ctx2, {
			type: 'polarArea',
			data: {
				labels: [
					'東部',
					'西部',
					'南部',
					'北部'
				],
				datasets: [{
					label: 'My First Dataset',
					data: [11, 16, 7, 3],
					backgroundColor: [
						'rgb(255, 99, 132)',
						'rgb(75, 192, 192)',
						'rgb(255, 205, 86)',
						'rgb(54, 162, 235)'
					]
				}]
			}
		});

		// Chart3：複合グラフ（浸水深と被害件数）
		var ctx3 = document.getElementById('myChart3').getContext('2d');
		new Chart(ctx3, {
			type: "bar",
			data: {
				labels: ["〜29cm", "30〜59cm", "60〜99cm", "1m以上"],
				datasets: [{
					label: "申請件数",
					data: [10, 20, 30, 40],
					borderColor: "rgb(255, 99, 132)",
					backgroundColor: "rgba(255, 99, 132, 0.2)"
				}, {
					label: "浸水深度",
					data: [50, 45, 40, 35],
					type: "line",
					fill: false,
					borderColor: "rgb(54, 162, 235)"
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>


</body>

</html>