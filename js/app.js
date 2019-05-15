$(document).foundation();


	// Settings
	let minConfidence = 0.5


	async function onPlay() {
		const videoEl = $('#inputVideo').get(0);

		if(videoEl.paused || videoEl.ended || !isFaceDetectionModelLoaded())
			return setTimeout(() => onPlay())

		const options = getFaceDetectorOptions();

		const result = await faceapi.detectSingleFace(videoEl, options);

		if (result) {
			const canvas = $('#overlay').get(0);
			const dims = faceapi.matchDimensions(canvas, videoEl, true);
			faceapi.draw.drawDetections(canvas, faceapi.resizeResults(result, dims));
		}

		setTimeout(() => onPlay());
	}

	async function run() {
		await changeFaceDetector();

		const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
		const videoEl = $('#inputVideo').get(0);
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

	$(function() {

		run();
	});