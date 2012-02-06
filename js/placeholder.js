
	function activatePlaceholders() {

		var detect = navigator.userAgent.toLowerCase(); 

		if (detect.indexOf("safari") > 0) return false;

		var inputs = document.getElementsByTagName("input");

		for (var i=0;i<inputs.length;i++) {

			if (inputs[i].getAttribute("type") == "text") {

				var placeholder = inputs[i].getAttribute("placeholder");

				if (placeholder.length > 0) {

					inputs[i].value = placeholder;

					inputs[i].onclick = function() {

						if (this.value == this.getAttribute("placeholder")) {

							this.value = "";

						}

						return false;

					}

					inputs[i].onblur = function() {

						if (this.value.length < 1) {

							this.value = this.getAttribute("placeholder");

						}

					}

				}

			}

		}

	}

	

	window.onload = function() {

		activatePlaceholders();

	}

