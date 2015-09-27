var app = angular.module('http',[],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.directive('numbersOnly', function(){
   return {
     require: 'ngModel',
     link: function(scope, element, attrs, modelCtrl) {
       modelCtrl.$parsers.push(function (inputValue) {
           // this next if is necessary for when using ng-required on your input. 
           // In such cases, when a letter is typed first, this parser will be called
           // again, and the 2nd time, the value will be undefined
           if (inputValue == undefined) return '' 
           var transformedInput = inputValue.replace(/[^0-9]/g, ''); 
           if (transformedInput!=inputValue) {
              modelCtrl.$setViewValue(transformedInput);
              modelCtrl.$render();
           }         

           return transformedInput;         
       });
     }
   };
});

 app.controller('masterbarangController',function($scope,$http){
    $scope.barang={};
    $scope.datas=[{}];
    $scope.juals=[{}];
    $scope.kode;
  
    $http.get('http://localhost/cobaan/public/api/barang').success(function(data){
    $scope.datas=data;
    });

    $scope.addBarang = function(event){
        event.preventDefault();

        $http.post('http://localhost/cobaan/public/barang/store',{kodeBarang:$scope.kodeBarang,nama:$scope.nama,stok:$scope.stok,harga:$scope.harga,_token:$scope._token})
        .success(function(data, status, headers, config){
            $http.get('http://localhost/cobaan/public/api/getkodeBarang').success(function(data){
            $scope.datas.push({nama:$scope.nama,kodeBarang:$scope.kodeBarang,stok:$scope.stok,harga:$scope.harga});
            $scope.kodeBarang=data;
            $scope.nama="";
            $scope.harga="";
            $scope.stok="";
            });
        });
    }
  
     $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete("http://localhost/cobaan/public/barang/delete/" + id).success(function(data) {
                
                   $http.get('http://localhost/cobaan/public/api/barang').success(function(data){
                      $scope.datas=data;
                  });
                
            });
        }
    }

    });
