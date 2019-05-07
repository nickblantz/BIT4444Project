$(document).ready(function() {
	var margin = {top: 10, right: 0, bottom: 30, left: 30},
		width = $("#search-svg").width() - margin.left - margin.right,
		height = $("#search-svg").height() - margin.top - margin.bottom,
		svg = d3.select("#search-svg")
			.attr("width", width + margin.left + margin.right)
			.attr("height", height + margin.top + margin.bottom)
			.append("g")
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")"),
		x = d3.scaleBand().rangeRound([0, width], 0).padding(.1),
		y = d3.scaleLinear().range([height, 0]);
		
	x.domain(jsonData.map(function(d) { return d.date; }));
	y.domain([0, d3.max(jsonData, function(d) { return d.searches; })]);
	
	svg.selectAll(".bar")
		.data(jsonData)
		.enter().append("rect")
		.attr("class", "bar")
		.attr("fill", "#00aa00")
		.attr("x", function(d) { return x(d.date); })
		.attr("width", x.bandwidth())
		.attr("y", function(d) { return y(d.searches); })
		.attr("height", function(d) { return height - y(d.searches); });
		
	svg.append("g")
		.attr("transform", "translate(0," + height + ")")
		.call(d3.axisBottom(x));

	svg.append("g")
		.call(d3.axisLeft(y));
		
	var margin = {top: 10, right: 0, bottom: 30, left: 30},
		width = $("#skips-svg").width() - margin.left - margin.right,
		height = $("#skips-svg").height() - margin.top - margin.bottom,
		svg = d3.select("#skips-svg")
			.attr("width", width + margin.left + margin.right)
			.attr("height", height + margin.top + margin.bottom)
			.append("g")
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")"),
		x = d3.scaleBand().rangeRound([0, width], 0).padding(.1),
		y = d3.scaleLinear().range([height, 0]);
		
	x.domain(jsonData.map(function(d) { return d.date; }));
	y.domain([0, d3.max(jsonData, function(d) { return d.skips; })]);
	
	svg.selectAll(".bar")
		.data(jsonData)
		.enter().append("rect")
		.attr("class", "bar")
		.attr("fill", "#aa0000")
		.attr("x", function(d) { return x(d.date); })
		.attr("width", x.bandwidth())
		.attr("y", function(d) { return y(d.skips); })
		.attr("height", function(d) { return height - y(d.skips); });
		
	svg.append("g")
		.attr("transform", "translate(0," + height + ")")
		.call(d3.axisBottom(x));

	svg.append("g")
		.call(d3.axisLeft(y));
	
})
