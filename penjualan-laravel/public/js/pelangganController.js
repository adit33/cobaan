var app = angular.module('http',[],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

 app.controller('pelangganController',function($scope,$http){
    $scope.datas=[{}];
    $http.get('http://localhost/cobaan/public/api/pelanggan').success(function(data){
    $scope.datas=data;
   
    });

   
    $scope.addPelanggan = function(event){
        event.preventDefault();

        $http.post('http://localhost/cobaan/public/pelanggan/store',{idPelanggan:$scope.idPelanggan,nama:$scope.nama,alamat:$scope.alamat,telepon:$scope.telepon,_token:$scope._token})
        .success(function(data, status, headers, config){
            $http.get('http://localhost/cobaan/public/api/getId').success(function(data){
            $scope.datas.push({nama:$scope.nama,idPelanggan:$scope.idPelanggan,alamat:$scope.alamat,telepon:$scope.telepon});
            $scope.idPelanggan=data;
            $scope.nama="";
            $scope.alamat="";
            $scope.telepon="";
            });
        });
    }

    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete("http://localhost/cobaan/public/pelanggan/delete/" + id).success(function(data) {
                if (data.success) {
                  $scope.datas={};
                    $http.get('http://localhost/cobaan/public/api/pelanggan').success(function(data) {
                        $scope.datas = data;
                      })
                }
            });
        }
    }


    });
