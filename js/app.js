// Settings
let minConfidence = 0.5


async function onPlay() {
	const videoEl = $('#inputvideo').get(0);

	if(videoEl.paused || videoEl.ended || !isFaceDetectionModelLoaded())
		return setTimeout(() => onPlay())

	const options = getFaceDetectorOptions();

	const result = await faceapi.detectSingleFace(videoEl, options);

	if (result) {
		const canvas = $('#overlay').get(0);
		const dims = faceapi.matchDimensions(canvas, videoEl, true);
		// faceapi.draw.drawDetections(canvas, faceapi.resizeResults(result, dims));

		let box = [
			result["_box"]["_x"],
			result["_box"]["_y"],
			result["_box"]["_width"],
			result["_box"]["_height"]
		];

		let c = document.getElementById("overlay");
		let ctx = c.getContext("2d");
		ctx.rect(...box);
		ctx.stroke();

	} else {
		const canvas = $('#overlay').get(0);
		const dims = faceapi.matchDimensions(canvas, videoEl, true);
	}

	setTimeout(() => onPlay());
}

async function run() {
	await changeFaceDetector();

	const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
	const videoEl = $('#inputvideo').get(0);
	videoEl.srcObject = stream;
}

async function changeFaceDetector() {
	await faceapi.nets.ssdMobilenetv1.loadFromUri('/models');
	if (!isFaceDetectionModelLoaded()) {
		await getCurrentFaceDetectionNet().load('/');
	}
}

function getFaceDetectorOptions() {
	return new faceapi.SsdMobilenetv1Options({ minConfidence });
}

function getCurrentFaceDetectionNet() {
	return faceapi.nets.ssdMobilenetv1;
}

function isFaceDetectionModelLoaded() {
	return !!getCurrentFaceDetectionNet().params
}

function captureImage() {
	let videoEl = document.getElementById("inputvideo");

	videoEl.pause();

	// captureOverlay.getContext('2d')
	// 	.drawImage(videoEl, 0, 0, captureOverlay.width, captureOverlay.height);

	// let img = document.createElement("img");
	// img.src = captureOverlay.toDataURL();
	// captureOverlay.prepend(img);
}

function clearImage() {
	let videoEl = document.getElementById("inputvideo");
	videoEl.play();
}

function uploadImage() {

}

let $buttonCapture = $('#capture');
let $buttonCancel = $('#capture-cancel');
let $buttonUpload = $('#upload');


$(document).foundation();
$(function() {
	run();

	$buttonCapture.click(function(e) {
		e.preventDefault();
		console.log('capture!');
		$buttonCapture.hide();
		$buttonCancel.show();
		$buttonUpload.show();
		captureImage();
	});

	$buttonCancel.click(function(e) {
		e.preventDefault();
		console.log('cancel capture');
		$buttonCapture.show();
		$buttonCancel.hide();
		$buttonUpload.hide();
		clearImage();
	});

	$buttonUpload.click(function(e) {
		e.preventDefault();
		console.log('upload picture');
		uploadImage();
	});

});


// Filter

let currentFilter = $('.filter-element-selected').data('filter');
console.log(currentFilter);

$('.filter-element').click(function(e) {
	e.preventDefault();

	$('.filter-element-selected').removeClass('filter-element-selected');
	$(this).addClass('filter-element-selected');
	currentFilter = $(this).data('filter');
	console.log(currentFilter);

})