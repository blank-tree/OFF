$(document).foundation();

$(function() {
	async function onPlay() {

		// Settings
		let minConfidence = 0.5


		const videoEl = $('#inputVideo').get(0);

		if(videoEl.paused || videoEl.ended || !isFaceDetectionModelLoaded())
			return setTimeout(() => onPlay())

		const options = getFaceDetectorOptions();

		const ts = Date.now();

		const result = await faceapi.detectSingleFace(videoEl, options);

		if (result) {
			const canvas = $('#overlay').get(0);
			const dims = faceapi.matchDimensions(canvas, videoEl, true);
			faceapi.draw.drawDetections(canvas, faceapi.resizeResults(result, dims));
		}

		setTimeout(() => onPlay());
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
});