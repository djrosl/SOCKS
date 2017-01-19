var app = angular.module('Socks',[]);

app.controller('CatalogController', ['$scope', '$http', function($scope, $http){

    $scope.products = [];
    $http.get('/product?expand=image,colors,sizes').then(function(response){
        $scope.products = response.data;
    });

    $scope.choice = [{},{},{}];

    $scope.index = 0;

    $scope.addChoice = function(gender, color, type, size, img, id){
        if($scope.index > 2){
            return false;
        }
        if(gender && color && type && size && img && id){
            $scope.choice[$scope.index] = {
                'gender':gender,
                'color':color,
                'type':type,
                'size':size,
                'img':img,
                'id':id
            };
            $scope.index+=1;
        } else {
            var error = [];
            if(!gender){
                error.push('пол');
                hasError('.male, .female')
            }
            if(!color){
                error.push('цвет');
                hasError('.color_select')
            }
            if(!type){
                error.push('тип');
                hasError('.center .type')
            }
            if(!size){
                hasError('.center .size')
            }

            alert('Сначала выберите '+error.join(', ')+'!');
        }
    };

    function hasError(selector){
        var el = $('.catalog_slider').find('.owl-item.active');
        el.find(selector).css({
            transform: 'scale(1.07)'
        });

        setTimeout(function(){
            el.find(selector).css({
                transform: 'scale(1.07)'
            });
        }, 500);

        setTimeout(function(){
            el.find(selector).css({
                transform: 'scale(1.07)'
            });
        }, 1000);

        setTimeout(function(){
            el.find(selector).css({
                transform: 'scale(1.07)'
            });
        }, 1500);
    }

    $scope.removeChoice = function(index){
        $scope.choice[index] = {};
        $scope.choice.sort(function(item){
           return !item.hasOwnProperty('img');
        });
        $scope.index-=1
    };

    $scope.send = function(){
        var subId = $('[name="select_subs"]:checked').data('id');
      $http.post('/catalog/save', {
          sub: subId,
          products: $scope.choice
      }).then(function(response){
          console.log(response);

          if(response.data == 'openModal'){
              $('.popup.reg').fadeIn(100);
          } else {
              window.location.href = '/account';
          }
      });
    };

}]);

app.directive("owlCarousel", function() {
    return {
        restrict: 'E',
        transclude: false,
        link: function (scope) {

        }
    };
}).directive('owlCarouselItem', [function() {
    return {
        restrict: 'A',
        transclude: false,
        link: function(scope, element) {
            // wait for the last item in the ng-repeat then call init

            scope.initCarousel = function(element) {
                // provide any default options you want
                var defaultOptions = {
                };
                var customOptions = scope.$eval($(element).attr('data-options'));
                // combine the two options objects
                for(var key in customOptions) {
                    defaultOptions[key] = customOptions[key];
                }
                // init carousel
                $(element).owlCarousel(defaultOptions);
            };

            if(scope.$last) {
                scope.initCarousel(element.parent());
            }
        }
    };
}]);

app.run( function run($http){
    $http.defaults.headers.post['X-CSRF-Token'] = $('meta[name="csrf-token"]').attr("content");
});