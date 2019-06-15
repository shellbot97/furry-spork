<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 stretch-card">
	<div class="mdc-card">
		<section class="mdc-card__primary">
			<h1 class="mdc-card__title mdc-card__title--large">Mode of payment</h1>
		</section>
		<section class="mdc-card__supporting-text">
            <table id="example1" class="display" width="100%"></table>

		</section>
	</div>
</div>

<script type="text/javascript">
    var dataSet = [
	    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" , "print"],
	    [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" , "print"],
	    [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000" , "print"],
	    [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060" , "print"],
	    [ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700" , "print"],
	    [ "Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000" , "print"],
	    [ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500" , "print"],
	    [ "Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010/10/14", "$327,900" , "print"],
	    [ "Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009/09/15", "$205,500" , "print"],
	    [ "Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008/12/13", "$103,600" , "print"],
	    [ "Jena Gaines", "Office Manager", "London", "3814", "2008/12/19", "$90,560" , "print"],
	    [ "Quinn Flynn", "Support Lead", "Edinburgh", "9497", "2013/03/03", "$342,000" , "print"],
	    [ "Charde Marshall", "Regional Director", "San Francisco", "6741", "2008/10/16", "$470,600" , "print"],
	    [ "Haley Kennedy", "Senior Marketing Designer", "London", "3597", "2012/12/18", "$313,500" , "print"],
	    [ "Tatyana Fitzpatrick", "Regional Director", "London", "1965", "2010/03/17", "$385,750" , "print"],
	    [ "Michael Silva", "Marketing Designer", "London", "1581", "2012/11/27", "$198,500" , "print"],
	    [ "Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "2010/06/09", "$725,000" , "print"],
	    [ "Gloria Little", "Systems Administrator", "New York", "1721", "2009/04/10", "$237,500" , "print"],
	    [ "Bradley Greer", "Software Engineer", "London", "2558", "2012/10/13", "$132,000" , "print"],
	    [ "Dai Rios", "Personnel Lead", "Edinburgh", "2290", "2012/09/26", "$217,500" , "print"],
	    [ "Jenette Caldwell", "Development Lead", "New York", "1937", "2011/09/03", "$345,000" , "print"],
	    [ "Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "2009/06/25", "$675,000" , "print"],
	    [ "Caesar Vance", "Pre-Sales Support", "New York", "8330", "2011/12/12", "$106,450" , "print"],
	    [ "Doris Wilder", "Sales Assistant", "Sidney", "3023", "2010/09/20", "$85,600" , "print"],
	    [ "Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "2009/10/09", "$1,200,000" , "print"],
	    [ "Gavin Joyce", "Developer", "Edinburgh", "8822", "2010/12/22", "$92,575" , "print"],
	    [ "Jennifer Chang", "Regional Director", "Singapore", "9239", "2010/11/14", "$357,650" , "print"],
	    [ "Brenden Wagner", "Software Engineer", "San Francisco", "1314", "2011/06/07", "$206,850" , "print"],
	    [ "Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "2010/03/11", "$850,000" , "print"],
	    [ "Shou Itou", "Regional Marketing", "Tokyo", "8899", "2011/08/14", "$163,000" , "print"],
	    [ "Michelle House", "Integration Specialist", "Sidney", "2769", "2011/06/02", "$95,400" , "print"],
	    [ "Suki Burks", "Developer", "London", "6832", "2009/10/22", "$114,500" , "print"],
	    [ "Prescott Bartlett", "Technical Author", "London", "3606", "2011/05/07", "$145,000" , "print"],
	    [ "Gavin Cortez", "Team Leader", "San Francisco", "2860", "2008/10/26", "$235,500" , "print"],
	    [ "Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "2011/03/09", "$324,050" , "print"],
	    [ "Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009/12/09", "$85,675" , "print"]
	];
	 
	$(document).ready(function() {
	    $('#example1').DataTable( {
	        data: dataSet,
	        columns: [
	            { title: "Name" },
	            { title: "Position" }
	        ]
	    } );

	} );
</script>