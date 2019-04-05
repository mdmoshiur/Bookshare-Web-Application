angular.module('ionicApp', ['ionic'])

.controller('MyCtrl', function($scope) {
  // don't be scared by the image value, its just datauri
  
  $scope.items = [
  { id: 10, album:'book name', artist:'book writer',image:'../img/bookicon.png',link:'www.google.com'},
  { id: 200, album:'book name', artist:'book writer',image:'../img/bookicon.png',link:'www.google.com'}


  ];
  
});

