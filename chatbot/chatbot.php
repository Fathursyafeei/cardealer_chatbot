<!doctype html>
<html lang="en">
<head>
	<style>
		/*---------------------*/
		/*Posisi tombol chatbot*/
		/*---------------------*/
		.fixed-bawah {
			position: fixed;
			right: 0;
			bottom: 0;
			z-index: 1030;
		}

		/*-----------*/
		/*Box Chatbot*/
		/*-----------*/
		.chatbot {
			display: none;
			position: fixed; 
			z-index: 1030;
			left: 0;
			top: 0;
			width: 100%; 
			height: 100%;
			overflow: auto;
			background-color: transparent; 
			padding-top: 60px;
		}

		.bg_chatbot {
			box-shadow: 3px 5px 10px #E1E1E1;
			border-radius: 20 !important;
			background-color: white;
			position: fixed;
			right: 0;
			bottom: 0;
			margin-right: 15px;
			margin-bottom: 70px;
		}

		/*----------------------*/
		/*Animasi pop-up Chatbot*/
		/*----------------------*/
		.pop-up {
			-webkit-animation: animatezoom 0.6s;
			animation: animatezoom 0.6s;
			animation-delay: -0.5s;
		}

		@-webkit-keyframes animatezoom {
			0%   {bottom:-400px;}
			25%  {bottom:-300px;}
			50%  {bottom:-200px;}
			75%  {bottom:-100px;}
			100% {bottom:0px;}
		}
		  
		@keyframes animatezoom {
			0%   {bottom:-400px;}
			25%  {bottom:-300px;}
			50%  {bottom:-200px;}
			75%  {bottom:-100px;}
			100% {bottom:0px;}
		}

		/*--------------------*/
		/*Kolom header chatbot*/
		/*--------------------*/
		.atas {
			width: 350px;
			height: 50px;
			background-image: linear-gradient(to right bottom, #4d194d, #323165, #00436d, #00506a, #065a60);
			border-radius: 5px 5px 0 0;
		}

		#txthead {
			color: white;
			font-size: 18pt;
			font-weight: bold;
			padding-left: 14px;
			padding-top: 6px;
		}

		.tutup {
			color: white;
			position: absolute;
			right: 14px;
			top: -2px;
			font-size: 35px !important;
		}

		.tutup:hover, .tutup:focus {
			cursor: pointer;
		}

		/*-----------------*/
		/*Kolom isi chatbot*/
		/*-----------------*/
		.isi {
			overflow: hidden;
			width: 350px;
		}

		.kolom-isi {
			overflow-y: auto;
			height: 300px;
		}

		.kolom-chat {
			padding-top: 8px;
			margin: 0 20px 0 20px;
		}
		
		/*Pesan otomatis (Bot)*/
		.chat-bot {
			overflow-wrap: break-word;
			margin: 12px 0;
			display: inline-block;
			padding: 0;
			vertical-align: top;
			width: 92%;
		}

		.pesan-chat-bot {
			width: 65%;
		}

		.pesan-chat-bot p {
			background: #f2f2f2 none repeat scroll 0 0;
			color: #4a4a4a;
			font-size: 10pt;
			margin: 0;
			padding: 5px 10px 5px 12px;
			width: 100%;
			border-radius: 10px;
		}

		/*Pesan dari user*/
		.chat-user {
			overflow-wrap: break-word;
			margin: 12px 0;
			display: inline-block;
			padding: 0;
			vertical-align: top;
			width: 92%;
		}

		.pesan-chat-user {
			float: left;
			width: 65%;
			margin-left: 46%;
		}

		.pesan-chat-user p {
			background-image: linear-gradient(to right bottom, #4d194d, #323165, #00436d, #00506a, #065a60);
			color: white;
			font-size: 14px;
			margin: 0;
			padding: 5px 10px 5px 12px;
			width: 100%;
			border-radius: 10px
		}

		/*Jam dan tanggal*/
		.waktu {
			color: #777;
			display: block;
			font-size: 7.5pt;
			margin: 8px 0 0;
		}

		/*-------------------*/
		/*Kolom input chatbot*/
		/*-------------------*/
	 .typing-field {
			display: flex;
			height: 3.75rem;
			width: 100%;
			align-items: center;
			justify-content: space-evenly;
			background: #efefef;
			border-top: 1px solid #d9d9d9;
			border-radius: 0 0 5px 5px;
		}
		.typing-field .input-data {
			height: 2.5rem;
			width: 20.938rem;
			position: relative;
		}

		.typing-field .input-data input {
			height: 100%;
			width: 100%;
			outline: none;
			border: 1px solid transparent;
			padding: 0 5rem 0 0.938rem;
			border-radius: 3px;
			font-size: 0.938rem;
			background: #fff;
			transition: all 0.3s ease;
		}
		.typing-field .input-data input:focus {
			border-color: rgba(62, 31, 71, 0.8);
		}

		.input-data input::placeholder {
			color: #3E1F47;
			transition: all 0.3s ease;
		}

		.input-data input:focus::placeholder {
			color: #3E1F47;
		}

		.typing-field .input-data button {
			position: absolute;
			right: 0.313rem;
			top: 50%;
			height: 1.875rem;
			width: 4.063rem;
			color: #fff;
			cursor: pointer;
			opacity: 0;
			pointer-events: none;
			font-size: 1rem;
			border-radius: 3px;
			background-image: linear-gradient(to right bottom, #4d194d, #323165, #00436d, #00506a, #065a60);
			border: 1px solid #272640;
			transform: translateY(-50%);
			transition: all 0.3s ease;
		}
		.typing-field .input-data input:valid ~ button {
			opacity: 1;
			pointer-events: auto;
		}

		.typing-field .input-data button:hover {
			background: #4D194D;
		}

		.btn-dark{
			background-image: linear-gradient(to right bottom, #4d194d, #323165, #00436d, #00506a, #065a60);
			box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.5);
		}

		/* scrollbar */

		::-webkit-scrollbar {
			width: 0.188rem;
			border-radius: 25px;
		}

		::-webkit-scrollbar-track {
			background: #f1f1f1;
		}
		::-webkit-scrollbar-thumb {
			background: #ddd;
		}

		::-webkit-scrollbar-thumb:hover {
			background: #ccc;
		}







	</style>
</head>
<body>
	<button type="button" class="btn btn-dark rounded-circle p-0 m-3 fixed-bawah" style="height: 45px; width: 45px; float: right;" onclick="document.getElementById('chatbot').style.display='block'">
		<i class="fas fa-comment" style="font-size: 18pt; padding-top: 3px; padding-left: .5px"></i>
	</button>

	<div class="chatbot" id="chatbot">
		<div class="bg_chatbot pop-up">
			<div class="atas">
				<p id="txthead">Spark Motors</p>
				<span class="tutup" onclick="document.getElementById('chatbot').style.display='none'" title="Close">&times;</span>
			</div>
			<div class="isi">
				<div class="kolom-isi">
					<div class="kolom-chat">
						<div class="chat-bot">
							<div class="pesan-chat-bot">
								<p>Helo! It's bot. Welcome to Spark Motors, is there anything I can help you with?</p>
							</div>
						</div>

							<?php 
								include '../db/connection.php';

								date_default_timezone_set('Asia/Jakarta');

								$chat = mysqli_query($conn, "SELECT * FROM chatbot ORDER by waktu ASC");

								while($data = mysqli_fetch_array($chat)){
								
									$user = $data['user'];
									$bot = $data['bot'];
									$waktu = $data['waktu'];
									$jam_tanggal = date('g:i A | d F Y', strtotime($waktu));
								
								?>
						<div class="chat-user">
							<div class="pesan-chat-user">
								<p><?= $user; ?></p>
								<span class="waktu"><?= $jam_tanggal; ?></span>
							</div>
						</div>

						<div class="chat-bot">
							<div class="pesan-chat-bot">
								<p><?= $bot; ?></p>
								<span class="waktu"><?= $jam_tanggal; ?></span>
							</div>
						</div>
								<?php } ?>
					</div>
				</div>
			</div>
			<div class="bawah typing-field">
				<form class="form-inline chatForm" action="">
					<div class="input-data">
						<input type="text" class="form-control input-pesan p-1 " id="pesan" placeholder="Type your message" autocomplete="off">
							<button type="button" class="btnsend">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready(function() {
			$('.chatbot .btnsend').on('click', function(){
				console.log($(this));
			});
		});

		$('.btnsend').click(function(e){
			e.preventDefault();

			var chatForm = $(this).parents('.chatForm');
			var pesan = chatForm.find('#pesan').val();

			$.ajax({
				type: "POST",
				url: "chatbot/chatbot_check.php",
				data: {text:pesan},
			});
		});

		//ketika chat akan kebawah scroll bar automatis akan kebawah juga
		$(".btnsend").scrollBottom($(".chatbot")[0].scrollHeight);
</script>

</body>
</html>