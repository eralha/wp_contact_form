var app = angular.module('app', ['formVals']);

	app.factory('dataService', function($http, $q) {

		this.getData = function(postData){

			var defer = $q.defer();
				postData.nonce = window.nonces[postData.action];

			jQuery.post(ajaxurl, postData, function(response) {
				defer.resolve(angular.fromJson(response));
			});

			return defer.promise;

		}

		return this;

	});

	app.directive('erListaContacts', ['$rootScope', '$injector', '$filter', '$sce', function($rootScope, $injector, $filter, $sce) {
	  return {
	  	restrict: 'C',
	  	templateUrl: window.pluginsDir+'/templates/backend/main.php',
	  	compile: function(e, a){
		        //console.log($(e).html(), arguments);
		        return function(scope, element, attrs) {

		        }
		    }
	  };
	}]);

    //generic controlers go here
    app.controller('myCtrl', ['$scope', '$rootScope', 'dataService', function($scope, $rootScope, dataService) {

		$scope.getMessages = function(){
			dataService.getData({
				action : 'getContacts'
			}).then(function(data){
				$scope.contacts = data;
			});
		}

		$scope.deleteContact = function(id){
			for(var i = 0; i < $scope.contacts.length; i++){
				if($scope.contacts[i].iIDContacto == id){
					$scope.contacts[i].delleting = true;
				}
			}

			dataService.getData({
				action : 'deleteContact',
				msgId : id
			}).then(function(data){
				if(data == 1){ $scope.getMessages(); }
			});
		}

		$scope.getDate = function(time){
			var date = new Date(time*1000);
			return date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear() +' - '+ date.getHours()+':'+date.getMinutes();
		}

    }]);

angular.bootstrap(document, ['app']);