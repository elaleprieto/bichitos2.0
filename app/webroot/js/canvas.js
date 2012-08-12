$(function (){
			var lienzo = document.getElementById('lienzo');
			var lienzo1 = lienzo.getContext('2d');
				 lienzo1.fillStyle = "rgba(255,255,255,0.8)";
				 lienzo1.beginPath();
				 lienzo1.moveTo(300,80);
				 lienzo1.lineTo(339,455);
				 lienzo1.lineTo(435,485);
				 lienzo1.lineTo(495,445);
				 lienzo1.lineTo(500, 72)
				 lienzo1.lineTo(405, 65)
				 lienzo1.closePath();
				 lienzo1.fill();
				
			var lienzo3 = document.getElementById('lienzo3');
			var lienzo2 = lienzo3.getContext('2d');
				 lienzo2.fillStyle = "rgba(255,255,255,0.8)";
				 lienzo2.beginPath();
				 lienzo2.moveTo(350,80);
				 lienzo2.lineTo(389,455);
				 lienzo2.lineTo(485,485);
				 lienzo2.lineTo(545,445);
				 lienzo2.lineTo(550, 72)
				 lienzo2.lineTo(455, 65)
				 lienzo2.closePath();
				 lienzo2.fill();		
		});
