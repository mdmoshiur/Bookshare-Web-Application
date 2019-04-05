<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		$white: #FFF;
$primary-blue: #9FB6C3;
$secondary-blue: #E3EBEF;
$primary-turquoise: #21B7B7;
$fg-gray: #747F8B;
$primary-font: 'Lato';

@mixin list-border{
  border: 0px;
  border-left-width: 3px;
  border-style: solid;
  -webkit-border-image: 
      -webkit-gradient(linear, 0 100%, 0 0, from(lighten($secondary-blue, 3%)), to(rgba(0, 0, 0, 0))) 1 20%;
    -webkit-border-image: 
      -webkit-linear-gradient(bottom, lighten($secondary-blue, 3%), rgba(0, 0, 0, 0)) 1 20%;
    -moz-border-image:
      -moz-linear-gradient(bottom, lighten($secondary-blue, 3%), rgba(0, 0, 0, 0)) 1 20%;  
    -o-border-image:
      -o-linear-gradient(bottom, lighten($secondary-blue, 3%), rgba(0, 0, 0, 0)) 1 20%;
    border-image: linear-gradient(to top, lighten($secondary-blue, 3%) 0%, rgba(0, 0, 0, 0)) 1 20%;
}
@mixin notification-border($border-width: 1px){
  border: 0px;
  border-style: solid;
  border-bottom-width: $border-width;
    -moz-border-image:
      -moz-linear-gradient(right, lighten($secondary-blue, 10%), lighten($primary-blue, 15%), lighten($primary-blue, 15%), lighten($secondary-blue, 10%)) 1 20%;  
    -o-border-image:
      -o-linear-gradient(right, lighten($secondary-blue, 10%), lighten($primary-blue, 15%), lighten($primary-blue, 15%), lighten($secondary-blue, 10%)) 1 20%;
  border-image: linear-gradient(to right, lighten($secondary-blue, 10%) 0%, lighten($primary-blue, 15%) 40%, lighten($primary-blue, 15%) 60%,   lighten($secondary-blue, 10%) 100%) 1 20%;
}
@mixin transition($timing: 500ms, $easing: ease){
  -webkit-transition: all $timing $easing; 
  -moz-transition: all $timing $easing; 
  -ms-transition: all $timing $easing; 
  -o-transition: all $timing $easing; 
  transition: all $timing $easing; 
}
.wrapper{
  border: 1px solid lighten($primary-blue, 25%);
  max-width: 458px;
  min-height: 300px;
  font-family: $primary-font;
  overflow: visible;
  .nav-bar{
    height: 60px;
    border-bottom: 1px solid lighten($primary-blue, 25%);
    ul{
      list-style: none;
      padding-left: 10px;
      margin: 0;
      position: relative;
      li{
        vertical-align: middle;
        display: inline-block;
        padding: 13px 20px;
        @include list-border;
      }
    }
    .search-box{
      position: relative;
      display: inline;
      .search-icon{
        position: absolute;
        top: 2px;
        left: 8px;
        font-size: 18px;
        color: $primary-blue;
      }
      input{
        background: $secondary-blue;
        box-shadow: none;
        border: 0;
        width: 130px;
        padding: 8px 10px 8px 30px;
        border-radius: 30px;
        color: $fg-gray;
        font-size: 14px;
        font-weight: bold;
        &:focus{
          outline: 0;
        }
      }
    }
    .dropdowns-wrapper{
      padding: 4px 0px;
    }
    .dropdown-container{
      display: inline-block;
      position: relative;
      .dropdown{
        position: relative;
        cursor: pointer;
        z-index: 2;
      }
      .dropdown-menu{
        position: absolute;
        display: none;
        z-index: 1;
        // left: -110px;
        left: -130px;
        top: 60px;
        min-height: 10px;
        min-width: 10px;
        // width: 230px;
        width: 280px;
        .dropdown-header{
          background: $white;
          padding: 15px;
          position: relative;
          text-align: center;
          color: $fg-gray;
          font-weight: bold;
          border-radius: 10px 10px 0 0;
          @include notification-border(1px);
          box-shadow: 0px 2px 10px -2px lighten($primary-blue, 15%);
          .triangle{
            // position: absolute;
            // top: -10px;
            // left: 112px;
            // height: 0;
            // border-left: 12px solid transparent;
            // border-right: 12px solid transparent;
            // border-bottom: 12px solid $white;
            position: absolute;
            top: -8px;
            left: 134px;
            height: 15px;
            width: 15px;
            border-radius: 6px 0px 0px 0px;
            transform: rotate(45deg);
            background: $white;
          }
          .count{
            position: static;
            height: 25px;
            width: 25px;
            display: inline-block;
            line-height: 24px;
            margin-left: 8px;
            font-size: 12px;
            vertical-align: middle;
          }
        }
        .dropdown-body{
          max-height: 292px;
          background: lighten($secondary-blue, 2%);
          overflow-y: auto;
          overflow-x: hidden;
          .notification{
            background: $white;
            padding: 15px;
            @include notification-border(1px);
            &.new{
              @include transition;
              background: lighten($secondary-blue, 2%);
            // min-width: 227px;
            // max-width: 227px;
          }
            .notification-image-wrapper{
              display: table-cell;
              vertical-align: middle;
            }
            .notification-image{
              display: inline-block;
              height: 32px;
              width: 32px;
              overflow: hidden;
              border-radius: 100%;
            }
            .notification-text{
              display: table-cell;
              padding-left: 15px;
              vertical-align: middle;
              color: $fg-gray;
              cursor: pointer;
              font-size: 14px;
              word-spacing: 2px;
              line-height: 21px;
              .highlight{
                font-weight: bold;
              }
            }
          }
        }
      }
      .fa{
        color: $primary-blue;
        font-size: 22px;
      }
      .count{
        position: absolute;
        top: -6px;
        right: -1px;
        height: 15px;
        width: 15px;
        overflow: hidden;
        background: $primary-turquoise;
        color: $white;
        text-align: center;
        border-radius: 100%;
        font-size: 9px;
        font-weight: bold;
        line-height: 15px;
      }
    }
    .notifications{
      margin-right: 10px;
    }
    .messages{
      margin-left: 10px
    }
    .user{
      background: $primary-blue;
      border-left: 0px;
      position: absolute;
      right: 0;
      top: -1px;
    }
    .user-options-wrapper{
      .user-image{
        background: url('http://www.apnatimepass.com/tom-cruise-ms.jpg');
        background-size: cover;
        background-position: center;
        vertical-align: bottom;
        height: 32px;
        width: 32px;
        display: inline-block;
        border-radius: 100%;
        margin-right: 10px;
      }
      .user-options{
        vertical-align: bottom;
        border: 2px solid $white;
        border-radius: 100%;
        height: 30px;
        width: 30px;
        display: inline-block;
        text-align: center;
        position: relative;
        .fa{
          position: absolute;
          top: 9px;
          left: 0;
          bottom: 0;
          right: 0;
          margin: auto;
          color: $white;
          font-size: 12px;
        }
      }
    }
  }
  .body-image{
    /*background: url('http://stock-wallpapers.com/wp-content/uploads/2014/05/nexus_5_wall_8.jpg');*/
    background: #577597;
    max-width: 100%;
    height: 440px;
    background-size: cover;
    background-position: center;
    margin-top: -2px;
    padding: 30px;
    position: relative;
    border-radius: 2px;
    .instruction{
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin: auto;
      display: none;
      color: $white;
      font-size: 18px;
      width: 100%;
      height: 20px;
      text-align: center;
    }
    .info{
      color: rgba(255, 255, 255, 0.9);
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(0, 0, 0, 0.2);
      padding: 10px;
      ul{
        list-style: square;
        padding-right: 20px;
        li{
          margin-bottom: 13px;
          font-size: 14px;
          word-spacing: 2px;
          line-height: 21px;
          /*border-bottom: 1px solid rgba(255, 255, 255, 0.2);*/
        }
      }
      .ok-btn-wrapper{
        text-align: center;
        position: relative;
        padding: 4px 0px 10px 0px;
        .ok-btn{
          position: relative;
          display: inline-block; 
          padding: 10px 20px;
          cursor: pointer;
          color: rgba(255, 255, 255, 0.9);
          border: 1px solid rgba(255, 255, 255, 0.3);
          border-radius: 2px;
          .text{
            z-index: 1;
            position: relative;
          }
          .hover-overlay{
            @include transition;
            position: absolute;
            height: 100%;
            width: 0;
            left: 0;
            top: 0;
            background: $primary-turquoise;
            opacity: .6;
            z-index: 0;
          }
          &:hover{
            .hover-overlay{
              width: 100%;
            }
          }
        }
      }
    }
  }
}

::-webkit-scrollbar {
    width: 3px;
}

::-webkit-scrollbar-track {
    webkit-box-shadow: inset 0 0 6px $secondary-blue; 
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: $secondary-blue;
}
 
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: $primary-blue; 
    -webkit-box-shadow: none; 
}
::-webkit-scrollbar-thumb:window-inactive {
  background: $primary-blue; 
}

.new.notification.ng-enter {
  @include transition;
  margin-top: -20%;
  background: darken($secondary-blue, 2%) !important;
}

.new.notification.ng-enter-active {
  margin-top: 0;
}

// .ng-move {
//   -webkit-transition: 1s;
//   transition: 1s;
//   border: 1px solid red !important;
// }

// .ng-move-active {
//   background: #fff;
// }


//animations from animate.css
.animated {
  -webkit-animation-duration: 500ms;
  animation-duration: 500ms;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -10%, 0);
    transform: translate3d(0, -10%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -10%, 0);
    transform: translate3d(0, -10%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
}

@-webkit-keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -10%, 0);
    transform: translate3d(0, -10%, 0);
  }
}

@keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -10%, 0);
    transform: translate3d(0, -10%, 0);
  }
}

.fadeOutUp {
  -webkit-animation-name: fadeOutUp;
  animation-name: fadeOutUp;
}

@-webkit-keyframes fadeOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}

@keyframes fadeOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}

.fadeOut {
  -webkit-animation-name: fadeOut;
  animation-name: fadeOut;
}

@-webkit-keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
}


@-webkit-keyframes zoomIn {
  from {
    opacity: 0;
    -webkit-transform: scale3d(.3, .3, .3);
    transform: scale3d(.3, .3, .3);
  }

  50% {
    opacity: 1;
  }
}

@keyframes zoomIn {
  from {
    opacity: 0;
    -webkit-transform: scale3d(.3, .3, .3);
    transform: scale3d(.3, .3, .3);
  }

  50% {
    opacity: 1;
  }
}

.zoomIn {
  -webkit-animation-name: zoomIn;
  animation-name: zoomIn;
}

@-webkit-keyframes zoomOut {
  from {
    opacity: 1;
  }

  50% {
    opacity: 0;
    -webkit-transform: scale3d(.3, .3, .3);
    transform: scale3d(.3, .3, .3);
  }

  to {
    opacity: 0;
  }
}

@keyframes zoomOut {
  from {
    opacity: 1;
  }

  50% {
    opacity: 0;
    -webkit-transform: scale3d(.3, .3, .3);
    transform: scale3d(.3, .3, .3);
  }

  to {
    opacity: 0;
  }
}

.zoomOut {
  -webkit-animation-name: zoomOut;
  animation-name: zoomOut;
}


	</style>
</head>
<body>
<div ng-app="demoApp" class="ng-app">
		<div class="wrapper" ng-controller="demoController">
		  <div class="nav-bar">
		    <ul>
		      <li class="searchbox-wrapper">
		        <div class="search-box">
		          <span class="fa fa-search search-icon"></span>
		          <input type="text" />
		        </div>
		      </li>
		      <li>
		        <div class="dropdowns-wrapper">
		          <div class="dropdown-container">
		            <div class="notifications dropdown dd-trigger" ng-click="showNotifications($event)">
		              <span class="count animated" id="notifications-count">{{awaitingNotifications}}</span>
		              <span class="fa fa-bell-o"></span>
		            </div>
		            <div class="dropdown-menu animated" id="notification-dropdown">
		              <div class="dropdown-header">
		                <span class="triangle"></span>
		                <span class="heading">Notifications</span>
		                <span class="count" id="dd-notifications-count">{{newNotifications.length}}</span>
		              </div>
		              <div class="dropdown-body">
		                <div class="notification new" ng-repeat="notification in newNotifications.slice().reverse() track by notification.timestamp">
		                  <div class="notification-image-wrapper">
		                  	<div class="notification-image">
			                  	<img src="{{notification.user.imageUrl}}" alt="" width="32">
			                  </div>
		                  </div>
		                  <div class="notification-text">
		                     <span class="highlight">{{notification.user.name}}</span> {{notification.action}} {{notification.target}}
		                  </div>
		                </div>
		                <div class="notification" ng-repeat="notification in readNotifications.slice().reverse() track by $index">
		                  <div class="notification-image-wrapper">
		                  	<div class="notification-image">
			                  	<img src="{{notification.user.imageUrl}}" alt="" width="32">
			                  </div>
		                  </div>
		                  <div class="notification-text">
		                     <span class="highlight">{{notification.user.name}}</span> {{notification.action}} {{notification.target}}
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		          <div class="dropdown-container">
		            <div class="messages dropdown">
		              <span class="fa fa-envelope-o"></span>
		            </div>
		          </div>
		        </div>
		      </li>
		      <li class="user">
		        <div class="user-options-wrapper">
		          <div class="user-image">
		          
		          </div>
		          <div class="user-options">
		            <span class="fa fa-chevron-down"></span>
		          </div>
		        </div>
		      </li>
		    </ul>  
		  </div>
		  <div class="body-image">
		  	<div class="instruction animated">Click on the bell!</div>
		  	<div class="info animated" id="demoInfo">
		  		<ul>
		  			<li>Dummy Polling is called at random intervals ranging from 1s to 5s.</li>
		  			<li>Dropdown shows both read and unread notifications.</li>
		  			<li>Unead notifications have blue background while read notifications have white background.</li>
		  			<li>On closing the dropdown, all notifications are marked as read.</li>
		  			<li>Dropdowns also display new notifications while it is open.</li>
		  			<li>Current status is maintained even on refresh.</li>
  <li>Count on bell is displayed only if it not zero.</li>
		  		</ul>
			  	<div class="ok-btn-wrapper">
			  		<span class="ok-btn" ng-click="hideInfo()">
			  			<span class="text">Okay!</span>
			  			<span class="hover-overlay"></span>
			  		</span>
			  	</div>
		  	</div>
		  </div>
		</div>
	</div>
</body>
</html>

<script>
	var app = angular.module('demoApp', ['ngAnimate']);
app.controller('demoController', function($scope){
	var opendd;
	var storedNewNotifications;
	var storedReadNotifications;
	var storedawaitingNotifications;
	var init = function(){
		storedNewNotifications = JSON.parse(localStorage.getItem('newNotifications'));
		storedReadNotifications = JSON.parse(localStorage.getItem('readNotifications'));
		storedawaitingNotifications = JSON.parse(localStorage.getItem('awaitingNotifications'));
		if(storedNewNotifications == null){
			$scope.newNotifications = [
				{
					user: pollingData.users[1],
					action: pollingData.actions[0],
					target: pollingData.actionTargets[2],
					timestamp: new Date()
				}
			];
		}
		else{
			$scope.newNotifications = storedNewNotifications;
		}
		if(storedReadNotifications == null){
			$scope.readNotifications = [
				{
					user: pollingData.users[2],
					action: pollingData.actions[1],
					target: pollingData.actionTargets[0],
					timestamp: new Date()
				}
			];
		}
		else{
			$scope.readNotifications = storedReadNotifications;
		}
		if(storedawaitingNotifications == null)
			$scope.awaitingNotifications = 1;
		else{
			$scope.awaitingNotifications = storedawaitingNotifications;
			if($scope.awaitingNotifications == 0)
				angular.element('#notifications-count').hide();
		}
		$scope.showNotifications = function($event){
			var targetdd = angular.element($event.target).closest('.dropdown-container').find('.dropdown-menu');
			opendd = targetdd;
		    if(targetdd.hasClass('fadeInDown')){
		    	hidedd(targetdd);
		    }
		    else{
		    	targetdd.css('display', 'block').removeClass('fadeOutUp').addClass('fadeInDown')
		    									.on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', function(){
	  												angular.element(this).show();
	  											});
          targetdd.find('.dropdown-body')[0].scrollTop = 0;
		    	$scope.awaitingNotifications = 0;
		      	angular.element('#notifications-count').removeClass('fadeIn').addClass('fadeOut');
		    }
		};
		$scope.hideInfo = function(){
			angular.element('#demoInfo').addClass('zoomOut')
										.on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', function(){
											angular.element(this).hide();
											angular.element('.instruction').addClass('zoomIn').show();
										});
		}
		//show notifications count if new notifications are received
		setInterval(function(){
			if($scope.awaitingNotifications > 0 && opendd == null && (angular.element('#notifications-count').css('opacity') == '0' || angular.element('#notifications-count').is(':hidden')))
    			angular.element('#notifications-count').removeClass('fadeOut').addClass('fadeIn').show();
		}, 400);
		dummyPolling();
	}

	//Hide dropdown function
	var hidedd = function(targetdd){
		targetdd.removeClass('fadeInDown').addClass('fadeOutUp')
										  .on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', function(){
  												angular.element(this).hide();
  											});
    	opendd = null;
    	$scope.awaitingNotifications = 0;
    	angular.forEach($scope.newNotifications, function(notification){
    		$scope.readNotifications.push(notification);
    	});
    	$scope.newNotifications = [];
    	localStorage.setItem('readNotifications', JSON.stringify($scope.readNotifications));
    	localStorage.setItem('newNotifications', JSON.stringify($scope.newNotifications));
		localStorage.setItem('awaitingNotifications', JSON.stringify($scope.awaitingNotifications));
    	if($scope.awaitingNotifications > 0)
    		angular.element('#notifications-count').removeClass('fadeOut').addClass('fadeIn');
	}

	//New notification is created by selecting random user, action and targets from this object
	var pollingData = {
	    users : [
		    {
		        name: "Fauzan Khan",
		        imageUrl: "https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAEAAQAAAAAAAANfAAAAJDE1MzNiYjM1LWVjYzUtNDcwZi1hMmExLTQ5ZDVjYzViMDkzYQ.jpg"
		    },
		    {
		        name: "Keanu Reeves",
		        imageUrl: "http://www.latimes.com/includes/projects/hollywood/portraits/keanu_reeves.jpg"
		    },
		    {
		        name: "Natalie Portman",
		        imageUrl: "https://imagemoved.files.wordpress.com/2011/07/no-strings-attached-natalie-portman-19128381-850-1280.jpg"
		    }
	    ],
	    actions: ["upvoted", "promoted", "shared"],
  	    actionTargets: ["your answer", "your post", "your question"]
	};

	//generates a random number between 0 and 2 to select random polling data
	var getRandomNumber = function(){
	    return Math.floor(Math.random() * 3);
	};

	//creates and returns a new notification
	var getNewNotification = function(){
		var userIndex = getRandomNumber();
		var actionIndex = getRandomNumber();
		var actionTargetIndex = getRandomNumber();
		var newNotification = {
			user: pollingData.users[userIndex],
			action: pollingData.actions[actionIndex],
			target: pollingData.actionTargets[actionTargetIndex],
			timestamp: new Date()
		}
		return newNotification;
	};

	//This function calls itslef after random interval
	var dummyPolling = function(){
		var randomInterval = 2*Math.round(Math.random() * (3000 - 500)) + 1000;
		setTimeout(function() {
			$scope.$apply(function(){
				$scope.newNotifications.push(getNewNotification());
				$scope.awaitingNotifications++;
				localStorage.setItem('newNotifications', JSON.stringify($scope.newNotifications));
				localStorage.setItem('awaitingNotifications', JSON.stringify($scope.awaitingNotifications));
			});
			console.log("dummy poll called after "+randomInterval+"ms");
            dummyPolling();  
    	}, randomInterval);
	}

	window.onclick = function(event){
		var clickedElement = angular.element(event.target);
		var clickedDdTrigger = clickedElement.closest('.dd-trigger').length;
		var clickedDdContainer = clickedElement.closest('.dropdown-menu').length;
		if(opendd != null && clickedDdTrigger == 0 && clickedDdContainer == 0){
			hidedd(opendd);
		}
	}
  
  window.onbeforeunload = function(e) {
	  if(opendd != null){
      console.log('closingdd');
      hidedd(opendd); 
    }
	};

	init();
})
</script>


