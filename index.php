<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title>Image Gallery</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body ng-controller="main as main">
	<div class="image-gallery">
		<div class="sidebar">
			<div class="folder" ng-repeat="(folderName, imgs) in main.folders" ng-click="main.changeFolder(folderName)">
				{{folderName.charAt(0).toUpperCase() + folderName.substr(1)}}
			</div>
		</div>
		<div class="image-area">
			<div class="background-image-holder"  ng-hide="main.currentFolder">
				<img class="background-image" src="img/image-area-background.jpg" alt="">
			</div>
			<div class="toolbar" ng-show="main.currentFolder">
				<button>
					<div class="checkbox" ng-click="main.addChecked('all')">
						<i class="fa fa-check" ng-if="main.allChecked"></i>
					</div>
					All
				</button>
				<button ng-click="main.showFolderDropdown = !main.showFolderDropdown">
					Move To
					<i class="fa fa-caret-down"></i>
					<ul class="folder-dropdown" ng-if="main.showFolderDropdown">
						<li ng-repeat="(folderName, imgs) in main.folders" ng-click="main.moveToFolder(folderName)">{{folderName}}</li>
					</ul>
				</button>
			</div>
			<div class="folder-image" ng-repeat="img in main.folders[main.currentFolder]">
				<img ng-src="{{img.src}}"  alt="">
				<div class="image-edit">
					<div class="checkbox" ng-click="main.addChecked(img)">
						<i class="fa fa-check" ng-show="img.checked"></i>
					</div>
				</div>
			</div>

		</div>
	</div>








<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>