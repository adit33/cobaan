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

function MyCtrl($scope) {
    $scope.jumlah = ''
}

 app.controller('barangController',function($scope,$http){
    $scope.barang={};
    $scope.datas=[{}];
    $scope.juals=[{}];
    $scope.kode;
  
    $http.get('http://localhost/cobaan/public/api/cart').success(function(data){
    $scope.datas=data;
    });

    $http.get('http://localhost/cobaan/public/api/penjualan').success(function(data){
    $scope.juals=data;
    });

    $scope.getbarang=function(){
        var kode=$scope.kode;

        $http.get('http://localhost/cobaan/public/barang/api?kode='+kode).success(function(data, status, headers, config){
         $.each(data,function(index, barangs){
         $('#harga').empty();
         $('#harga').val(barangs.harga);
         $('#stok').val(barangs.stok);
         $('#nama').val(barangs.nama);
         $scope.nama=barangs.nama;
         $scope.harga=barangs.harga;
         $scope.stok=barangs.stok;
         $scope.jumlah="";
         $scope.total="";
         
             });
        });

    }

    $scope.getpelanggan=function(){
        var idPelanggan=$scope.idPelanggan;

        $http.get('http://localhost/cobaan/public/pelanggan/api?idPelanggan='+idPelanggan).success(function(data, status, headers, config){
         $.each(data,function(index, pelanggans){
       
         $('#alamat').val(pelanggans.alamat);
         $('#telepon').val(pelanggans.telepon);
         $scope.alamat=pelanggans.alamat;
         $scope.telepon=pelanggans.telepon;
       
             });
        });

    }


    $scope.hasil=function(){
    if(Number($scope.jumlah) <= Number($scope.stok)){
    $scope.total=Number($scope.harga)*Number($scope.jumlah);
    }
    else if (Number($scope.jumlah)>Number($scope.stok)){
        alert('stok kurang');
        $scope.jumlah=null;
        $scope.total=null;
    }
    else if ($scope.jumlah==null){
        $scope.total=null;
    }
    }

    $scope.addcart = function(event){
        event.preventDefault();
        $http.post('http://localhost/cobaan/public/cart/jual',{name:$scope.nama,id:$scope.kode,price:$scope.harga,qty:$scope.jumlah,total:$scope.total,_token:$scope._token})
        .success(function(data, status, headers, config){
        window.location.reload();
        });
  
    }

     $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete("http://localhost/cobaan/public/penjualan/delete/" + id).success(function(data) {
                if (data.success) {
                  $scope.juals={}; 
                }
            });
        }
    }

    });
