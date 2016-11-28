@include('head')

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Testing de Facturación</h3>
		    </div>
		    <div class="box-body">

		    	<button class="btn btn-success" onclick="facturacion_test_generateToken()">Generar Token</button>
		    	<button class="btn btn-primary" onclick="facturacion_test_facturaElectronica()">Generar Factura</button>
		    </div>
		</div>
	</div>
</div>
<script>
function facturacion_test_generateToken()
{
	/*
	var grant_type= "password";
	var username="21946504-1";
	var password= "1234";


	$.ajax({
		url: "{{url()}}/facturasonline_token",
		type: "POST",
		 headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
		data: {grant_type:grant_type,username:username,password:password},
		success: function (token) {
			console.log(token);
			alert(token);
		}
	});*/

	var data = {
	grant_type: "password",
	username: "76017396-7",
	password: "723405"
};

$.ajax({
	url: "api.facturasonline.cl/token",
	type: "POST",
	contentType: "x-www-form-urlencoded",
	dataType: "json",
	data: data,
	success: function (token) {
		console.log(token);
		//{
		//	  "access_token": "rCI-W9JBj1sRlveVG60vMsJz1QpUahS7hDBWqT0dXB00-AkFgJuhOCdpzXc6wAhKDn5eMaMFOvUu2DRQHXFDgCbV7BtLQJsik9Rz2nRwAwUI5_Rceoljjm6ku9LPV3Y4dSQMszp9WAVs76HDZQwef_VpD66FObQte1MGxKvYOGkxCDdaoRZK2t9RG6_b8uu5L5VItOc9B6ZB2nSc_jS94iLEn79d7NMYNkDWC-cXPVBhYcSQXll5Hy2tZ_4njcuB8Jy8LYAEPu3RgyzKccnCvQ",
		//	  "token_type": "bearer",
		//	  "expires_in": 86399
		//}
	}
});
}

function facturacion_test_facturaElectronica()
{
	var data = {
	"Receiver":{
		"RUT":"76380741-K", 
		"Name":"TITANDS",
		"Address":"AV. DEL VALLE 961 OF. 4701",
		"MunicipalityName":"Huechuraba",
		"CityName":"Santiago",
		"BusinessActivity":"SERVICIOS"
	},

	"Items":[{
		"Code":"9999",
		"Name":"CONSUMO",
		"Quantity":1,
		"MeasureUnit":"UN",
		"UnitPrice":1000,
		"TotalItemAmount":1000
	}],

	"PaymentType": 1,
	"IssueDate":"2016-03-08T11:49:39.748Z",
	"NetAmount":1000,
	"IVAFee":19,
	"IVAAmount":190,
	"TotalAmount":1190
};

	$.ajax({
		url: "http://demo.facturasonline.cl:450/documents/CreateManualInvoice",
		type: "POST",
		contentType: "application/json",
		dataType: "json",
		data: data,
		authorization: "bearer rCI-W9JBj1sRlveVG60vMsJz1QpUahS7hDBWqT0dXB00-AkFgJuhOCdpzXc6wAhKDn5eMaMFOvUu2DRQHXFDgCbV7BtLQJsik9Rz2nRwAwUI5_Rceoljjm6ku9LPV3Y4dSQMszp9WAVs76HDZQwef_VpD66FObQte1MGxKvYOGkxCDdaoRZK2t9RG6_b8uu5L5VItOc9B6ZB2nSc_jS94iLEn79d7NMYNkDWC-cXPVBhYcSQXll5Hy2tZ_4njcuB8Jy8LYAEPu3RgyzKccnCvQ",
		success: function (token) {
			console.log(token);
		}
	});
}
</script>
@include('footer')