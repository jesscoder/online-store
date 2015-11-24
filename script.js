var showHtmlContent = function( url ) {
	jQuery.ajax({
		url: url,
		dataType: 'html'
	}).done( function( data, textStatus, jqXHR ) { 
		jQuery('#main').empty();
		jQuery('#main').html( data );
	}).fail( function( jqXHR, textStatus, errorThrown ) { 
		jQuery('#main').html( "Sorry! We are having server problem. Please try again later." );
	});
};

/*************************************************************************
 *
 * Catalog
 *
 *************************************************************************/
// Create The Catalog Markups
var catalogMarkup = "<h1>Catalog</h1>" +
	"<div class='content sixteen columns'>" +
		"{{each(i, product) catalog}}" +
			"<div class='item eight columns alpha'>" +
			"<img src='images/${product.thumbnail}' />" +
			"<p>Name:<a href='#product?id=${product.id}'>${product.name}</a> Price:\$${product.price}</p>" +
			"<p>${product.excerpt}</p>" +
			"<p>Reviews:12 rating:5.0</p>" +
			"</div>" +
		"{{/each}}" +
	"</div>";
	
// Register the catalog markups as catalog template in jQuery templating system
$.template( "catalogTemplate", catalogMarkup );

var showCatalog = function() {
	jQuery.ajax({
		url: "api/",
		dataType: 'json'
	}).done( function( data, textStatus, jqXHR ) { 
		jQuery('#main').empty();
		$.tmpl( "catalogTemplate", data ).appendTo('#main');
		
	}).fail( function( jqXHR, textStatus, errorThrown ) { 
		jQuery('#main').html( "Sorry! We are having server problem. Please try again later." );
	});
};

/*************************************************************************
 *
 * Product
 *
 *************************************************************************/
// Create The Catalog Markups
var productMarkup = "<h1>Catalog</h1>" +
	"<div class='content sixteen columns'>" +
		"<div class='item sixteen columns'>" +
			"<img src='images/${product.image}' />" +
			"<p>Name:${product.name} Price:${product.price}</p>" +
			"<p>${product.description}</p>" +
		"</div>" +
	"</div>";
	
// Register the product markups as product template in jQuery templating system
$.template( "productTemplate", productMarkup );

var showProduct = function( params ) {
	jQuery.ajax({
		url: "api/product.php",
		data: params,
		dataType: 'json'
	}).done( function( data, textStatus, jqXHR ) { 
		jQuery('#main').empty();
		$.tmpl( "productTemplate", data ).appendTo('#main');
		
	}).fail( function( jqXHR, textStatus, errorThrown ) { 
		jQuery('#main').html( "Sorry! We are having server problem. Please try again later." );
	});
};



/*************************************************************************
 *
 * HASH ROUTING
 *
 *************************************************************************/
var processHash = function() {
	var hashString = window.location.hash, selector = hashString, param = {} ;
	
	if( hashString.indexOf("?") > -1 )
	{
		// we have parameters after the hash string
		selector = hashString.substring( 0, hashString.indexOf("?") );
	
		// Process parameters
		var paramString = hashString.substring( hashString.indexOf("?") + 1 );
		
		/*
		 * The param string has the format of [name]=[value]&[name]=[value]&...
		 * First split the string using &. We will have an array.
		 *  [name]=[value], [name]=[value]
		 * Then we will split the string with = for each array item.
		 */
		var paramArr = paramString.split('&');
		
		for( var i = 0; i < paramArr.length; i++ )
		{
			var paramItem = paramArr[i].split('=');
			param[paramItem[0]] = paramItem[1];
		}
	}
	
	return { selector: selector, params: param };
};


$(window).on( "hashchange", function() {
	var newLocation = processHash();
	
	if( newLocation.selector == "#catalog" )
	{
		$(document).find('title').html('Catalog');
		
		// Load Catalog Page
		showCatalog();
	}
	else if( newLocation.selector == "#product" )
	{
		$(document).find('title').html('Product');
		
		// Load Product Page
		showProduct( newLocation.params );
	}
	else if( newLocation.selector == "#about" )
	{
		$(document).find('title').html('About');
		
		// Load About Page
		showHtmlContent('about.html');
	}
	else
	{
		$(document).find('title').html('Home');
		
		// Load Home Page
		showHtmlContent('home.html');
	}
});

jQuery('document').ready( function() {
	$(window).trigger('hashchange');
});
