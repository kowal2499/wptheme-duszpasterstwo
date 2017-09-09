"use strict";

jQuery( document ).ready( function() {

		// create wp.media object
		var frame = wp.media({
		 	title: 		'Select or upload an icon',
			button: 	{ text: 'Use this media' },
			multiple: 	false 
		});

		frame.on('select', function() {
			// add newly selected image to list
			var	attachment = frame.state().get('selection').first().toJSON();
			
			frame.triggeredInstance.push(attachment);
			frame.triggeredInstance.refresh();
		});

		var openMediaUploader = function(event) {
			event.preventDefault();
			frame.open();
		}

		// ########################################33

		var List = function(argID) {
			this.id = argID;
			this.list = [];

			// ****************************
			// ## button events
			//
			// launch on init and on every widget update
			// ****************************
			this.attachEvents = function() {
				var buttonAddNew = document.querySelector('#' + this.id + ' .owl-addnew');

				buttonAddNew.addEventListener(
					"click", function(event) {
						frame.triggeredInstance = this;
						openMediaUploader(event);
					}.bind(this));
			}
			
			// ****************************
			// ## constructor
			//
			// launch on init only
			// ****************************
			this.construct = function() {
				var inputHidden = document.querySelector('#widget-' + this.id + '-image');
				if (inputHidden.value) {
					this.list = JSON.parse(decodeURIComponent(inputHidden.value));
					console.log(this.list)
				}
				this.attachEvents()
			}

			this.push = function(attachment) {
				var record = {
					image: { wpID: "", url: "", alt: "" },
					desc: ""
				}
				record.image.wpID = attachment.id;
				record.image.url = attachment.url;
				record.image.alt = attachment.alt;
				record.desc = "";
				this.list.push(record);
			}

			this.frontendEventsKeyPress = function(element) {
					element.addEventListener("keyup", function(event) {
						var which = event.srcElement.dataset.related;

						this.list[which].desc = event.srcElement.value;
						this.updateBackend();
					}.bind(this))
			}

			this.frontendEventsBtnRemove = function(element) {
					element.addEventListener("click", function(event) {
						var which = event.srcElement.dataset.related;

						this.list.splice(which, 1);
						// this.list[which].desc = event.srcElement.value;
						this.refresh();
					}.bind(this))
			}

			this.updateBackend = function() {
				// update backend connector
				var encoded = encodeURIComponent(JSON.stringify(this.list))
				var inputHidden = document.querySelector('#widget-' + this.id + '-image');
				inputHidden.value = encoded;
			}

			this.refresh = function() {
				
				this.updateBackend();

				// frontend

				

				// remove children
				var node = document.querySelector('#' + this.id + ' .eoc-slides');

				while (node.firstChild) {
					node.removeChild(node.firstChild);
				}

				if (!this.list.length) return;

				// draw children

				for (var i=0; i<this.list.length; i++) {
					// console.log(this.list[i].image.url)

					var div = document.createElement("div");
					div.className = "line";

					var elm = document.createElement("img");
					elm.src = this.list[i].image.url;
					
					var input = document.createElement("input");
					input.className = "widefat";
					input.type = "text";
					input.value = this.list[i].desc;
					input.placeholder = "Tutaj wpisz tekst";
					input.dataset.related = i;
					this.frontendEventsKeyPress(input);

					var btnClose = document.createElement("input");
					btnClose.type = "button";
					btnClose.value = "Usuń";
					btnClose.className = "button button-secondary";
					btnClose.dataset.related = i;
					this.frontendEventsBtnRemove(btnClose);


					div.appendChild(elm);
					div.appendChild(input);
					div.appendChild(btnClose);

					node.appendChild(div);
				}
			}

			this.construct();
			this.refresh();
	}
	
	var instances = [];
	const instancesSelector = document.querySelectorAll(".erla-owlcarousel-form")
	const widgetID = "erla-owlcarousel";

	for (var i=0; i<instancesSelector.length; i++) {
		instances.push(new List(instancesSelector[i].id));
	}


	// ****************************
	// ## widget-added
	//
	// add new widget and attach events
	// ****************************

	jQuery(document).on('widget-added', function(event, widget) {	
		var domID = widget[0].id;
		if (!domID.includes(widgetID)) {
			return; // quit if event is related to other widget
		}
		
		var pos = domID.indexOf(widgetID);
		instances.push(new List(domID.slice(pos)));
	})

	// ****************************
	// ## widget-updated
	//
	// add new widget and attach events
	// ****************************

	jQuery(document).on('widget-updated', function(event) {
		var presentNode = event.delegateTarget.activeElement;  // now points at element which launched an event (save button)

		do {
			presentNode = presentNode.parentNode;
			if (presentNode.id == "widgets-right") return // quit if gone too far
		} while(!presentNode.id.includes(widgetID)) 


		for (var i=0; i<instances.length; i++) {
			if (presentNode.id.includes(instances[i].id)) {
				instances[i].attachEvents();
				instances[i].refresh();
			}
		}

	})




});