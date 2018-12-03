$(document).ready(function(){
	$.ajax({
		url: "http://localhost/blood_donation/data2.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var BloodType = [];
			var Amount = [];

			for(var i in data) {
				BloodType.push("BloodType " + data[i].BloodType);
				Amount.push(data[i].Amount);
			}

			var chartdata = {
				labels: BloodType,
				datasets : [
					{
						label: 'BloodType Amount',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(255, 0, 0, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: Amount
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
