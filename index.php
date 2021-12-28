<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Video slicer</title>
		<link rel="stylesheet" type="text/css" href="include/css/reset.css">
		<link rel="stylesheet" type="text/css" href="include/css/vidcutter2.css">

</head>
<body>


		<div class='vidcontainer'><video id='vid1' src="include/videos/8.mp4"  autoplay></video></div>
	<a id="xpos">X:</a>
	<a id="ypos">Y:</a>
<div class="item1">

		<div class="item2">
			<div class="resizer ne"></div>
			<div class="resizer nw"></div>
			<div class="resizer se"></div>
			<div class="resizer sw"></div>

		</div>
		<div class="item3">
			<div class="resizer ne"></div>
			<div class="resizer nw"></div>
			<div class="resizer se"></div>
			<div class="resizer sw"></div>

		</div>

		</div>
		<div id="pane">
		<div class='item_canv' id='item2'>
		<section id="can">
        <canvas id="canv"></canvas>
        <p id="durn"></p>
    </section>
    <section id="image"></section>
		
	</div></div>

	


			
		
	
</body>
<script type="text/javascript">
	const el= document.querySelector('.item2');
	const el3 =document.querySelector('.item3');

let isResizing= false;
el.addEventListener('mousedown', mousedown);
el3.addEventListener('mousedown', mousedown2);

function mousedown(e){
	window.addEventListener('mousemove', mousemove);
	window.addEventListener('mouseup', mouseup);
	let prevX = e.clientX;
	let prevY =e.clientY;
	function mousemove(e){
		if(!isResizing){	
		// let newX = prevX - e.clientX;
		const el2= document.querySelector('.item1');
		const rect = el2.getBoundingClientRect();
		const rect2= el.getBoundingClientRect();
		let width=Math.ceil(rect.right-rect.left);
		let pt=(prevX-rect.left)*100/width;
		if(pt>100){
			pt=100;
		}
		if(pt<0){
			pt=0;
		}

		paneX=prevX;
		if(paneX>rect2.right){
			paneX=rect2.right;
		}
		if(paneX<rect2.left){
			paneX=rect2.left;
		}

		el.style.left = pt + "%";
		prevX = e.clientX;
		prevY = e.clientY;

		document.getElementById("pane").style.left= paneX + 'px';
		document.getElementById("pane").style.top=rect2.top - 152 +"px";
		document.getElementById("pane").style.display="block";
		let tm=Math.ceil(vidpl.duration*pt/100);
		document.getElementById("durn").innerHTML=String(tm)+"/"+String(Math.ceil(vidpl.duration)) +"seconds";
		document.getElementById("xpos").innerHTML=String(tm)+"/"+String(Math.ceil(vidpl.duration)) +"seconds";


	 	seekToTime(tm);	
	 	// let player = document.getElementById('vid1');
	 	// let canvas = document.getElementById('canv');
	 	// let ctx = canvas.getContext('2d');
	 	// canvas.width = player.videoWidth;
	  // canvas.height = player.videoHeight;
	 	// ctx.drawImage(player, 0, 0);
	  // //convert to grayscale image
	  // //ONLY WORKS IF image is not tainted by CORS
	  // 	let imgdata = ctx.getImageData(0,0, canvas.width, canvas.height);
	  // 	ctx.putImageData(imgdata, 0, 0);
	  // 	let blob = canvas.toBlob((blob) => {
	  // 		let img = document.createElement('img');
   //          let url = URL.createObjectURL(blob);
   //          img.addEventListener('load', (ev)=>{
   //          console.log('image from createObjectURL loaded');
   //          })
   //              img.src = url; //use the canvas binary png blob
   //              // document.getElementById('image').appendChild(img);
            
   //          } , 'image/png');
		// document.getElementById("xpos").innerHTML="Curr X %:"+String(pt);
	 	// document.getElementById("ypos").innerHTML="RECT Height:"+String(Math.ceil(rect.bottom-rect.top));
	}}
	function mouseup(){
		// var vr1=tm;
		document.getElementById("pane").style.display="none";
		window.removeEventListener("mousemove", mousemove);
		window.removeEventListener("mouseup", mouseup);
	}


}

function mousedown2(e){
	window.addEventListener('mousemove', mousemove);
	window.addEventListener('mouseup', mouseup);
	let prevX = e.clientX;
	let prevY =e.clientY;
	function mousemove(e){
		if(!isResizing){	
		// let newX = prevX - e.clientX;
		const el2= document.querySelector('.item1');
		const rect = el2.getBoundingClientRect();
		const rect2= el3.getBoundingClientRect();
		let width=Math.ceil(rect.right-rect.left);
		let pt=(prevX-rect.left)*100/width;
		if(pt>100){
			pt=100;
		}
		if(pt<0){
			pt=0;
		}

		paneX=prevX;
		if(paneX>rect2.right){
			paneX=rect2.right;
		}
		if(paneX<rect2.left){
			paneX=rect2.left;
		}

		el3.style.left = pt + "%";
		prevX = e.clientX;
		prevY = e.clientY;

		document.getElementById("pane").style.left= paneX + 'px';
		document.getElementById("pane").style.top=rect2.top - 152 +"px";
		document.getElementById("pane").style.display="block";
		let tm=Math.ceil(vidpl.duration*pt/100);
	 	seekToTime(tm);	
	 	// let player = document.getElementById('vid1');
	 	// let canvas = document.getElementById('canv');
	 	// let ctx = canvas.getContext('2d');
	 	// canvas.width = player.videoWidth;
	  // canvas.height = player.videoHeight;
	 	// ctx.drawImage(player, 0, 0);
	  // //convert to grayscale image
	  // //ONLY WORKS IF image is not tainted by CORS
	  // 	let imgdata = ctx.getImageData(0,0, canvas.width, canvas.height);
	  // 	ctx.putImageData(imgdata, 0, 0);
	  // 	let blob = canvas.toBlob((blob) => {
	  // 		let img = document.createElement('img');
   //          let url = URL.createObjectURL(blob);
   //          img.addEventListener('load', (ev)=>{
   //          console.log('image from createObjectURL loaded');
   //          })
   //              img.src = url; //use the canvas binary png blob
   //              // document.getElementById('image').appendChild(img);
            
   //          } , 'image/png');
		
	 	document.getElementById("durn").innerHTML=String(tm)+"/"+String(Math.ceil(vidpl.duration)) +"seconds";
	}}
	function mouseup(){
		
		document.getElementById("pane").style.display="none";
		window.removeEventListener("mousemove", mousemove);
		window.removeEventListener("mouseup", mouseup);
	}


}













var vidpl=document.getElementById("vid1");
	


	vidpl.addEventListener('loadedmetadata', getDurn);
	function getDurn() {
    durn = vidpl.duration;


}

var ln=vidpl.duration;



function getImageCanvas(){
	let player = document.getElementById('vid1');
	let canvas = document.getElementById('canv');
	let ctx = canvas.getContext('2d');
	canvas.width = player.videoWidth;
	canvas.height = player.videoHeight;
	ctx.drawImage(player, 0, 0);
		  //convert to grayscale image
	  //ONLY WORKS IF image is not tainted by CORS
	let imgdata = ctx.getImageData(0,0, canvas.width, canvas.height);
  	ctx.putImageData(imgdata, 0, 0);
  	let blob = canvas.toBlob((blob) => {
  		let img = document.createElement('img');
        let url = URL.createObjectURL(blob);
        img.addEventListener('load', (ev)=>{
        	player.play();

        // console.log('image from createObjectURL loaded');
        })
            img.src = url; //use the canvas binary png blob
            // document.getElementById('image').appendChild(img);

        
        } , 'image/png');
}





function seekToTime(ts) {
   // try and avoid pauses after seeking
   video_element= vidpl;
   video_element.pause();
   video_element.currentTime = ts; // if this is far enough away from current, it implies a "play" call as well...oddly. I mean seriously that is junk.
   // however if it close enough, then we need to call play manually
   // some shenanigans to try and work around this:
   getImageCanvas();
   var timer = setInterval(function() {
      if (video_element.paused && video_element.readyState == 4 || !video_element.paused) {
         video_element.pause();
         clearInterval(timer);
      }
   }, 50);
}









</script>


</html>