$(document).ready(function(){
	'use strict';
	
	function save() {
		$.post("save.php", {list:$( '.listholder' ).html()});
	}
	
 	$( '.listnew' ).on('click', function() {
		$( '.listholder' ).append( '<div class="row"><div class="col-md-12"><button type="button" class="btn btn-main pull-right del" data-toggle="tooltip" title="Deleta esta Lista"><i class="fa fa-minus"></i></button><h3>Nova Lista</h3><div class="row"><div class="col-xs-1 text-center addItem" ><i class="fa fa-plus fa-2x clickable" data-toggle="tooltip" title="Adiciona Item"></i></div><div class="col-xs-5"><input class="form-control nameItem" type="text"></div></div><div class="row"><div class="col-xs-12"><h5>Tarefas Pendentes</h5><ul class="listN"></ul><h5>Tarefas Cumpridas</h5><ul class="listY"></ul></div></div></div></div>' );
		save();
	});
	$(document).on('click', '.del', function() {
			$(this).parent().parent().remove();
			save();
	});
	$(document).on('click', '.addItem', function() {
		var itemName = $(this).parent().parent().find( 'input.nameItem' ).val();
		if ( itemName !== '' ) {
			var parent = $(this).parent().parent().find( 'ul.listN' );
			parent.append( '<li class="complete clickable">' + itemName + '</li>' );
		}
		save();
	});
	$(document).on('click', '.complete', function() {
		var itemDone = $(this).text();
		var parent = $(this).parent().parent().find( 'ul.listY' );
		parent.append( '<li>' + itemDone + '</li>' );
		$(this).remove();
		save();
	});
});