var app = angular.module('app', []);

app.controller('main', function(Img){
	var startingImageNumber = 33126;

	this.currentFolder = '';
	this.folders = {
		gallery: [],
		funny: [],
		scary: [],
		sexy: [],
		political: []
	};


	// Methods
	this.changeFolder = function(folder) {
		this.currentFolder = folder;
	};
	this.moveToFolder = function(newFolder) {
		var images = this.folders[this.currentFolder];

		for(var i = images.length - 1; i >= 0; i--){
			if(images[i].checked){
				images[i].checked = false;
				this.folders[newFolder].push(images[i]);
				this.folders[this.currentFolder].splice(this.folders[this.currentFolder].indexOf(images[i]), 1);
			}
		}
		
	};
	this.deleteImage = function(img) {
		this.folders[img.folder].splice(this.folders[img.folder].indexOf(img), 1);	
	};
	this.deleteAll = function() {
		this.folders[this.currentFolder] = [];	
	};
	this.tagImage = function(img, tag) {
		img.tags.push(tag);
	};
	this.addChecked = function(el) {
		if(el.src){
			el.checked = !el.checked;
		}else{
			var images = this.folders[this.currentFolder];
			this.allChecked = !this.allChecked;
			for(var i = 0; i < images.length; i++)
				images[i].checked = this.allChecked;
		}
	};


	for(var i = startingImageNumber; i < 33149; i++){
		var img = new Img(i, 'gallery');
		img.load();
		this.folders.gallery.push(img);
	}


});


app.factory('Img', function() {
	function Img(src, folder){
		this.src = 'img/' + src + '.jpeg';
		this.folder = folder;
		this.tags = [];
	}

	Img.prototype = {
		load: function(cb) {
			this.img = new Image();
			this.img.src = this.src;
			this.img.onload = cb;
		}
	}


	return Img;
})